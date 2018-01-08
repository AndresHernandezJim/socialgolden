@extends('layouts.temp')

@section('contenido')

<div class="box dark">
	<header>
		<h5>Mensaje a publicar</h5>
		<div class="toolbar">
			<ul class="nav">
				<li>
					<a href="" class="acordion-toggle minimize-box" data-toggle="collapse" href="#div-1"><i class="icon-chevron-up"></i></a>
				</li>
			</ul>
		</div>
	</header>
	<div id="div-1" class="acordion-body collapse in body">
		<br>
		@if(Session::has('exito1'))
       <p style="color:green;">Mensaje publicado correctamente, revisa tu perfil para ver el resultado </p>
    	@endif
    	@if(Session::has('exito2'))
       <p style="color:green;">Enlace publicado correctamente, revisa tu perfil para ver el resultado </p>
    	@endif
    	@if(Session::has('exito3'))
       <p style="color:green;">Mensaje publicado correctamente, revisa el perfil de la página para ver el resultado </p>
    	@endif
    	@if(Session::has('exito4'))
       <p style="color:green;">Enlace publicado correctamente, revisa el peril de la página para ver el resultado </p>
    	@endif
    	@if(Session::has('exito5'))
       <p style="color:green;">Fotografía subida correctamente, revisa tu peril para ver el resultado </p>
    	@endif
    	@if(Session::has('exito6'))
       <p style="color:green;">Fotografía subida correctamente, revisa el peril de la página para ver el resultado </p>
    	@endif
		<div class="span12">
			<form class="form-horizontal" action="/usuario/publicar1" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="usuario" id="idusuario" value="{{Auth::user()->fb_id}}">
				<div class="row">
					<div class="span6">
						<div class="control-group"><!-- donde-->
							<label class="control-label">Donde va a publicar</label>
							<div class="controls">
								<select name="donde" id="donde" class="span6">
									<option value="1">Perfil Personal</option>
									<option value="2">Página de Facebook</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="selectpaginas">
					<div class="span6">
						<div class="control-group" >
							<label  class="control-label">Seleccione la página</label>
							<div class="controls">
								<select name="idpag" id="idpag" class="span6">
									
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="sapn6">
						<div class="control-group"><!-- que-->
						<label class="control-label">Qué va a publicar</label>
						<div class="controls">
							<select name="tipo" id="tipo" class="span3">
								<option value="1" selected>Mensaje</option>
								<option value="2">enlace/video</option>
								<option value="3">Fotografía</option>
							</select>
						</div>
					</div>
					</div>
				</div>
				<div>
					<div class="row" id="pmensaje">
						<div class="span1"></div>
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
						<div class="span1"></div>
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
					<div class="row" id="foto">
						<div class="span1"></div>
						<div class="span8">
							<div class="box">
								<header>&nbsp;Fotografía</header>
								<div class="body">
									<div class="cotrol-group">
										<label  class="control-label">Mensaje</label>
										<div class="controls">
											<input type="text" name="Mensaje3">
										</div>
									</div>
									<br>
									<div class="control-group">
										<label class="control-label">Imagen a publicar</label>
						                <div class="controls">
						                    <div class="fileupload fileupload-new" data-provides="fileupload">
						                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px; line-height: 20px;"></div>
						                        <div>
						                            <span class="btn btn-file"><span class="fileupload-new">Seleccione la imagen</span><input type="file"  name="file[]" /><span class="btn fileupload-exists">cancelar</span></span>
						                            
						                        </div>
						                    </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="control-group">
					<button type="submit"> <i class="fa fa-facebook-official" aria-hidden="true">&nbsp;</i>publicar</button>
				</div>
			</form>
		</div>
	</div>
</div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#selectpaginas').prop('hidden',true);
		$('#pvideo').prop('hidden',true);
		$('#foto').prop('hidden',true);
		$('#tipo').on('change',function(){
			console.log('se cambio el valor del select');
			var val=$('#tipo').val();
			console.log(val);
			if(val==1){
				$('#pmensaje').prop('hidden',false);
				$('#pvideo').prop('hidden',true);
				$('#foto').prop('hidden',true);
				
			}else if(val==2){
				$('#pmensaje').prop('hidden',true);
				$('#pvideo').prop('hidden',false);
				$('#foto').prop('hidden',true);
			}else{
				$('#foto').prop('hidden',false);
				$('#pmensaje').prop('hidden',true);
				$('#pvideo').prop('hidden',true);
			}
		});
		function mensajereq(){

		}
		function enlacereq(){

		}
		function fotoreq(){

		}
		$('#donde').on('change',function(){
			var val=$('#donde').val();
			if(val==1){
				console.log('publicar en perfil personal');
				$('#selectpaginas').prop('hidden',true);
				$( '#idpag option  ' ).remove();
			}
			else{
				console.log('publicar en pagina, mostar paginas');
				$('#selectpaginas').prop('hidden',false);
				var cantidad= $('#idpag option').length;
				var usuario=$('#idusuario').val();
				if(cantidad==0){
					$.ajax({
						type:'get',
						url:'/usuario/publicar3',
						data:{
							usuario:usuario
						},
						success:function(data){	
							data = JSON.parse(data);
							$.each(data, function(index,val){
									$('#idpag').append('<option value="'+val.id+'">'+val.nombre+'</option>');
							});
						}
					});
				}
			}
		});
	});
</script>
@stop