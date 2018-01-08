@extends('layouts.temp')

@section('contenido')
<div class="span12">
  <div class="span7">
    <div class="span1"></div>
    <div class="span11">
      <br>
        <div class="box ">
          <header><center><h4>Loco Monkey</h4></center></header>
          <div class="body">
              <div id="fb-root"></div>
              <div class="fb-post" data-href="https://www.facebook.com/permalink.php?story_fbid=325848331156984&amp;id=325847697823714&amp;substory_index=0" data-width="auto" data-show-text="true"></div>
          </div>
            
     
        </div>
    </div>
    
  </div>
  <div class="span5">
    <br>

       <div class="box">
         <header><center><h4>Información de la página</h4></center></header>
         <div class="body">
           <div id="infopag">
             <div class="control-group">
               <label  class="control-label">Nombre de la pagina</label>
               <div class="controls">
                 <input type="text" name="nombre"  value="{{$info->name}}" readonly>
               </div>
             </div>
            <div class="control-group">
              <label  class="contol-label">total de likes <i class='fa fa-thumbs-o-up fa-2x' aria-hidden='true'></i></label>
              <div class="controls">
                <input type="text" name="likes" value="{{$info->fan_count}}" readonly>
              </div>
            </div>
           </div>
         </div>
       </div>

  </div>
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
 <script type="text/javascript">
   $(document).ready(function(){
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11&appId=1772744769686729';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
      $('#btninfo').on('click',function(){
          $.ajax({
            type: 'GET',
            dataType:'json',
            url: 'https://graph.facebook.com/325847697823714/?fields=id,name,likes,about&access_token=EAACEdEose0cBABQdMhNObmXtTPS0u62M0vEFnxLugevGaJJWKlMsV3VReS2nRWoCX2jpO0b3J91ipenvRNDn8TZAAZBZAbXu2pBqGMqDDsCx33TswdZCRSGzaO7ZBKa7gcZA03mBySX4XAgQ8ohq52oe6AiR45H8TN6vXIxxpz5AbpFE8WZCYn8fXJTWAFIwDgZD',
            success:function(data){
              console.log(data);
              var nombre= data.name;
              nombre.replace(/[^a-zA-Z 0-9.]+/g,'$1');
              nombre.replace(/["]+/g, '');
              nombre=nombre.replace(/"([^"]+(?="))"/g, '$1');
              console.log(nombre);
              $('#infopag').append("<div><div class='control-group'><label class='control-label'> Nombre</label><div class='controls'><input type='text' value="+data.name+" readonly></div></div><div class='control-group'><label class='control-label'></label><div class='controls'>&nbsp;&nbsp;<i class='fa fa-thumbs-o-up fa-4x' aria-hidden='true'></i>&nbsp;&nbsp;"+data.likes+"</div></div></div>");
            },
            error:function(){
              console.log('error');
            }
            });
      });
   });

 </script>
@stop