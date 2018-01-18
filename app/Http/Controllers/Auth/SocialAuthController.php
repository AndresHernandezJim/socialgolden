<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use App\tokens;
use App\paginas;
use App\publicacionesprogramadas;
use App\Helper\filehelper;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facebook\Facebook;

class SocialAuthController extends Controller
{
  // Metodo encargado de la redireccion a Facebook
  public function redirectToProvider($provider)
  {
      return Socialite::driver($provider)->redirect();
  }
  public function handleProviderCallback($provider){
    // Obtenemos los datos del usuario
    $social_user = Socialite::driver('Facebook')->user(); 
    //dd($social_user);
    $accesst=$social_user->token;
    //$fb=Socialite::driver('Facebook');
    $fb= new Facebook([
      'app_id' => env('FACEBOOK_APP_ID', null),
      'app_secret' => env('FACEBOOK_APP_SECRET', null),
      'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION', 'v2.10'),
    ]);
    $oAuth2Client=$fb->getOAuth2Client();
    $long_access_token = $oAuth2Client->getLongLivedAccessToken($accesst)->getValue();
    $fb->setDefaultAccessToken( $long_access_token );
    //dd($long_access_token);
    // dd($id,$url);
    // Comprobamos si el usuario ya existe
    if ($user = User::where('email', $social_user->email)->first()) { 
      $user1=json_decode($user);
      $token=\DB::table('claves')->where('user_id','=',$user1->id)->update(['token'=>$long_access_token]);
      $response = $fb->get('/me/accounts');
      //dd($response);
      foreach ($response->getDecodedBody() as $allAccounts) {
        foreach ($allAccounts as $account ) { 
          if(isset($account['id'])){
            $pagina=\DB::table('paginas')->where('user_id','=',$user->id)->update(['token'=>$account['access_token']]);
          }
        }
      }
      return $this->authAndRedirect($user); // Login y redirección
    }
    else {  
      // En caso de que no exista creamos un nuevo usuario con sus datos.
      $clave=$social_user->id;
    	$url2=$social_user->profileUrl;
      $user = new User;
      $user->name = $social_user->name;
      $user->email = $social_user->email;
      $user->avatar = $social_user->avatar;
      $user->fb_id= $clave;
      $user->perfil=$url2;
      $user->save();
      $token=new tokens;
      $token->user_id=$user->id;
      $token->token=$long_access_token;
      $token->save();
      //invocar las paginas y volcarlas en la bd
      $response = $fb->get('/me/accounts');
      //dd($response);
      foreach ($response->getDecodedBody() as $allAccounts) {
        foreach ($allAccounts as $account ) { 
          if(isset($account['id'])){
            $pagina= new paginas;
            $pagina->user_id=$user->id;
            $pagina->nombre=$account['name'];
            $pagina->p_id=$account['id'];
            $pagina->token=$account['access_token'];
            $pagina->save();
            }
          }
        }
        return $this->authAndRedirect($user); // Login y redirección
    }
  }

  // Login y redirección
  public function authAndRedirect($user)
  {
      Auth::login($user);
      //dd($user);
      return redirect()->to('/usuario/publicar');
  }
  public function vercalendario($id){
    $idusuario=\DB::table('users')->select('id')->where('fb_id',$id)->first();
    $idusuario=$idusuario->id;
    $data=array(
      'paginas'=>\DB::table('paginas')->select('id','nombre')->where('user_id',$idusuario)->get(),
    );
    //dd($data);
   	return view('usuario.calendario',$data);
  }
  public function gestionaru(){
 	  return view('usuario.gestionar');
  }
  public function publicar(){
    return view('usuario.publicar');
  }
  public function publicar3(Request $request){
    //dd($request->all());
    $idusuario=\DB::table('users')->select('id')->where('fb_id',$request->usuario)->first();
    $idusuario=$idusuario->id;
    //dd($idusuario);
    $data=\DB::table('paginas')->select('id','nombre')->where('user_id',$idusuario)->get();
    return json_encode($data);
  }
  public function index($id){
    $idusuario=\DB::table('users')->select('id')->where('fb_id',$id)->first();
    $idusuario=$idusuario->id;
    $accestoken=\DB::table('claves')->select('token')->where('user_id',$idusuario)->first();
    $accestoken=$accestoken->token;
    $data=array(
        'info'=> json_decode(file_get_contents("https://graph.facebook.com/325847697823714?fields=id,name,likes,fan_count&access_token=".$accestoken))
      );
    //dd($data);
    return view('usuario/index',$data);
  }
  //funcion para publicar en facebook 
  public function publicar1(Request $request){
    //dd($request->all());
    //crear objeto de facebook para permitir publicaciones
    $usuario=\DB::table('users')->select('id')->where('fb_id',$request->usuario)->first();
    $usuario=$usuario->id;
    //dd($usuario);
    $fb= new Facebook([
     'app_id' => env('FACEBOOK_APP_ID', null),
      'app_secret' => env('FACEBOOK_APP_SECRET', null),
      'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION', 'v2.10'),
    ]);
    if($request->donde==1){
      //perfil personal
      $appAccessToken=\DB::table('claves')->select('token')->where('user_id',$usuario)->first();
      $appAccessToken=$appAccessToken->token;
      if($request->tipo==1){
        try {
          $response = $fb->post(
            '/me/feed',
            array("message" => $request->Mensaje),
            $appAccessToken
          );
          $postId = $response->getGraphNode();
          return back()->with('exito1',true);
        } 
        catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            exit;
        }
        catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
            exit;
        }
      }else 
      if($request->tipo==2){
            //dd('enlace o video');
          try {
              $response = $fb->post(
                  '/me/feed',
                  array(
                      "message" => $request->Mensaje2,
                      "link" => $request->link,
                      "picture" => $request->imagen,
                      "name" => $request->Nombre,
                      "description" =>$request->descripcion
                  ),
                  $appAccessToken
              );
             
              $postId = $response->getGraphNode();
              return back()->with('exito2',true);
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            exit;
          }
        }else{
          //fotografia
          //dd('envia fotografía');
          $logo=$request->file('file');
          $logo=$logo[0];
          if($request->hasFile('file')){
            $foto=filehelper::uploadlogo($logo,$request->usuario);
          }
          //dd($logotipo);
          $data = [
            'message' => $request->Mensaje3,
            'source' => $fb->fileToUpload(public_path().$foto),
          ];

          try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->post('/me/photos', $data, $appAccessToken);
            return back()->with('exito5',true);
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
          }
          $graphNode = $response->getGraphNode();
        }
      }else{
        //obtener credenciales de la página
        $idpag=\DB::table('paginas')->select('p_id')->where('id',$request->idpag)->first();
        $idpag=$idpag->p_id;
        //dd($idpag);
        $appAccessToken=\DB::table('paginas')->select('token')->where('id',$request->idpag)->first();
        $appAccessToken=$appAccessToken->token;
        if($request->tipo==1){
          //mensaje simple
           try {
              $response = $fb->post(
                  '/'.$idpag.'/feed',
                  array("message" => $request->Mensaje),
                  $appAccessToken
              );
             
              $postId = $response->getGraphNode();
              return back()->with('exito3',true);
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            exit;
          }
        }else if($request->tipo==2){
          //enlace
           try {
              $response = $fb->post(
                  '/'.$idpag.'/feed',
                  array(
                      "message" => $request->Mensaje2,
                      "link" => $request->link,
                      "picture" => $request->imagen,
                      "name" => $request->Nombre,
                      "description" =>$request->descripcion
                  ),
                  $appAccessToken
              );
             
              $postId = $response->getGraphNode();
              return back()->with('exito4',true);
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            exit;
          }
        }else{
          //fotografia en pagina
          
          $logo=$request->file('file');
          $logo=$logo[0];
          if($request->hasFile('file')){
            $foto=filehelper::uploadlogo($logo,$idpag);
          }
          //dd($logotipo);
          $data = [
            'message' => $request->Mensaje3,
            'source' => $fb->fileToUpload(public_path().$foto),
          ];

          try {
            // Returns a `Facebook\FacebookResponse` object
            
            $response = $fb->post('/'.$idpag.'/photos', $data, $appAccessToken);
            return back()->with('exito6',true);
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
          }
          $graphNode = $response->getGraphNode();
        }
      }
   }

  public function programarp(Request $request){
    //dd($request->all());
    $fb= new Facebook([
      'app_id' => env('FACEBOOK_APP_ID', null),
      'app_secret' => env('FACEBOOK_APP_SECRET', null),
      'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION', 'v2.10'),
    ]);
    $idpag=\DB::table('paginas')->select('p_id')->where('id',$request->pagina)->first();
    $idpag=$idpag->p_id;
    //dd($idpag);
    $appAccessToken=\DB::table('paginas')->select('token')->where('id',$request->pagina)->first();
    $appAccessToken=$appAccessToken->token;
   // $fecha=date('m-d-Y',strtotime($request->fecha));
    $fecha=$request->fecha;
    $time=$fecha.' '.$request->hora;
    //dd($time);
    $tiempo=date('m-d-Y H:i:s',strtotime($time));
    $time=strtotime($tiempo);
   //dd($time);
    if($request->tipo==1){
      //mensaje simple
      try {
        $response = $fb->post(
          '/'.$idpag.'/feed',
          array("message" => $request->Mensaje,
                "scheduled_publish_time"=>$time,
                "published"=>'false',
            ),
            $appAccessToken
        );    
        $postId = $response->getGraphNode();
          return back()->with('exito',true);
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            exit;
      }
    }else{
      //enlace
      try {
        $response = $fb->post('/'.$idpag.'/feed',
            array(
              "message" => $request->Mensaje2,
              "link" => $request->link,
              "picture" => $request->imagen,
              "name" => $request->Nombre,
              "description" =>$request->descripcion,
              "scheduled_publish_time"=>$time,
              "published"=>'false',
            ),$appAccessToken);
        $postId = $response->getGraphNode();
        return back()->with('exito4',true);
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
         exit;
      }
    }
  }
}


