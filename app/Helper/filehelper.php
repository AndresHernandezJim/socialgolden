<?php 
namespace App\Helper;
class filehelper
{
	static function uploadkey($file,$id)
	{
		// subir el key al servidor
		 	$path ='/docs/'.$id.'/'; // ruta destino
            $nombre = $file->getClientOriginalName();
            //dd($nombre);
            if( $file->move(public_path().$path, $nombre)){
                return $path.=$nombre;
            }
            return $path=false;
	}
	static function uploadcer($file,$id)
	{
		// subir el certificado al servidor
		 	$path ='/docs/'.$id.'/'; // ruta destino
            $nombre =$file->getClientOriginalName();
            //dd($nombre);
            if( $file->move(public_path().$path, $nombre)){
                return $path.=$nombre;
            }
            return $path=false;
	}
	static function uploadlogo($file,$id)
	{
		// subir la imagen del logo al servidor
		 	$path ='/docs/'.$id.'/'; // ruta destino
            $nombre = $file->getClientOriginalName();
            //dd($nombre);
            if( $file->move(public_path().$path, $nombre)){
                return $path.=$nombre;
            }
            return $path=false;
	}
}


 ?>