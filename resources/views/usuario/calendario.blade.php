@extends('layouts.temp')
@section('contenido')
<div class="span12">
    <div class="box">
        <div class="header"><center><h4>Calendarización de publicaciones</h4></center></div>
        <div class="body">
            <div class="span6">
                <div class="box">
                    <header><center><h5>Programar Publicación</h5></center></header>
                </div>
                <div class="body">
                    @if(Session::has('exito'))
                        <p style="color:green;">Publicación de mensaje programada correctamente, revisa el perfil de la página para ver el resultado </p>
                    @endif
                    @if(Session::has('exito2'))
                        <p style="color:green;">Publicación de enlace programada correctamente, revisa el perfil de la página para ver el resultado </p>
                    @endif
                    <form method="POST" action="/usuario/calendario/programar">
                        {{ csrf_field() }}
                        <div>
                            <div class="span1"></div>
                            <div class="span5">
                                <div class="control-group"><!-- que-->
                                    <label class="control-label">Qué va a publicar</label>
                                    <div class="controls">
                                        <select name="tipo" id="tipo" class="span12">
                                            <option value="1" selected>Mensaje</option>
                                            <option value="2">enlace/video</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span5">
                                <div class="control-group">
                                    <label  class="control-label">Página</label>
                                    <div class="controls">
                                        <select name="pagina"  class="span12">
                                            @foreach($paginas as $item)
                                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row" id="pmensaje">
                                <div class="span2"></div>
                                <div class="span8">
                                    <div class="box">
                                        <header> &nbsp;Mensaje</header>
                                        <div class="body">
                                            <div class="control-group">
                                                <label class="control-label">Mensaje</label>
                                                <div class="controls with-tooltip">
                                                    <input type="text" name="Mensaje" data-original-title="Mensaje a publicar" data-placement="top">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="pvideo">
                                <div class="span2"></div>
                                <div class="span8">
                                    <div class="box">
                                        <header> &nbsp;Enlace o video</header>
                                        <div class="body">
                                            <div class="control-group">
                                                <label class="control-label">Texto</label>
                                                <div class="controls ">
                                                    <input type="text" name="Mensaje2">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Titulo del enlace</label>
                                                <div class="controls">
                                                    <input type="text" name="Nombre">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Enlace</label>
                                                <div class="controls with-tooltip">
                                                    <input type="text" name="link" data-original-title="Titulo de la publicación" data-placement="top">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Comentario</label>
                                                <div class="controls with-tooltip">
                                                    <input type="text" name="descripcion" data-original-title="Enlace de referencia" data-placement="top">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Imágen</label>
                                                <div class="controls with-tooltip">
                                                    <input type="text" name="imagen">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="span1"></div>
                            <div class="span11">
                                <div class="span4">
                                    <div class="control-group">
                                        <label  class="control-label">Fecha</label>
                                        <div class="controls">
                                            <input type="date" name="fecha" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="span2"></div>
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label">Hora</label>
                                        <div class="controls">
                                            <input type="time" name="hora" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="control-group">
                                <center>
                                    <button type="submit"> <i class="fa fa-facebook-official" aria-hidden="true">&nbsp;</i>Programar</button>
                                </center>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="span6">
                <div class="box">
                    <header><center><h5>Publicaciones programadas</h5></center></header>
                    <body>
                        <div class="span12">
                             <p>No hay publicaciones aún</p>
                        </div>
                      
                    </body>
                </div>
            </div>   
        </div>
    </div>
</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        //alert('si funciona el javascript');
        $('#pvideo').prop('hidden',true);
        $('#tipo').on('change',function(){
            var val=$('#tipo').val();
            //alert(val);
            if(val==1){
                $('#pvideo').prop('hidden',true);
                $('#pmensaje').prop('hidden',false);
            }else{
                $('#pvideo').prop('hidden',false);
                $('#pmensaje').prop('hidden',true);
            }

        });
    }); 

 </script>

@stop