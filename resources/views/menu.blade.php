<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet" type="text/css">
    <title>GOLDEN WIDOW</title>  
    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>       
</head>
<body>
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/usuario/publicar') }}">Panel de adminsitración</a>
            @else
                <a href="{{ url('/login') }}">Ingresar</a>
                <a href="{{ url('/register') }}">Registrar</a>
            @endif
        </div>
    @endif
     <nav class="ser-gris padding-largo text-center">
     	<ul class="no-lista">
     		<li class="col-md-3 inline-block"><a href="/">GOLDEN WIDOW</a></li>
     		<li class="col-md-3 inline-block"><a href="/contacto">Contactanos</a></li>


     	</ul>
     </nav>


        <section>
        	<div class="text-center">
        	<h1 class="SpectralSC mediano azul">Planes en Marketing Digital</h1>
        	<p>Ayudamos a crecer los negocios mediante una estrategia de comunicación y utilizando las mejores herramientas de Internet.</p>
        	<p > Nos especializamos</p>

        	<div class="col-md-3 inline-block">
        		<article>
        			<h2 class="SpectralSC"> Estrategia Digital</h2>
     		<img src="img/estratega digital icono.png " class="col-md-4 quitar-float">
     		<p>
     			<strong>
     				Mercadotecnia especializada en Internet y Redes Sociales.
     			</strong>
     		</p>
        		</article>
        	</div> 

        	<div class="col-md-3 inline-block">
        	<article>
        		<h3 class="SpectralSC"> Desarrollo web</h3>
        			<img src="img/diseno web icono.png " class="col-md-4 quitar-float">
     		<p>
     			<strong>
     				Más que simples sitios web, desarrollamos para obtener clientes reales.
     			</strong>
     		</p>
        	</article> 
            </div> 

            <div class="col-md-3 inline-block mediana">
        	<article>
        		<h4 class="SpectralSC"> SEO y Analytics</h4>
        			<img src="img/icono-cursos-asesoria-marketing-digital.png " class="col-md-4 quitar-float">
     		<p>
     			<strong>
     				Medimos todo nuestro trabajo y utilizamos las mejores herramientas de análisis.
     			</strong>
     		</p>
        	</article> 
            </div>
              </section>

<!-------------------------------------------------------------------------------------------------------->
               
        	<div class="col-md-4 center-block quitar-float text-center espacio-arriba" id="principal">
        	<img src="img/retos-del-marketing.jpg ">
        </div>

<!-------------------------------------------------------------------------------------------------------->
     	<section>
     		<div class="text-center">
     	<h1 class="SpectralSC  azul">Planes</h1>
     	<p>Nuestros mejores planes a los precios más accesibles.</p> 
     	<p>1° a Nivel Mundial</p>
     	<div class="col-md-3 inline-block">
     	<article>
     		<h2 class="SpectralSC"> Black</h2>
     		<img src="img/Estrella.png " class="col-md-4 quitar-float">
     		<p>
     			<strong>
     				Prueba Gratis
     			</strong>
     		</p>
     		<p>Sitio web comercial con 6 secciones y 5 productos</p>
     		<p>1 modificación mensual</p>
     		<p>Anuncios en Google</p>
     	</article>
        </div>
        <div class="col-md-3 inline-block">
     	<article>
     		<h3 class="SpectralSC">Silver</h3>
     		<img src="img/Estrella.png " class="col-md-4 quitar-float">
     		<p>
     			<strong>
     				Prueba 20$ USD
     			</strong>
     		</p>
     		<p>Sitio web comercial hasta 15 secciones y 20 productos</p>
     		<p>10 cambios mensuales</p>
     		<p>Anuncios en Google</p>
     		<p>Anuncios en Facebook</p>
     		<p>Manejo 40 horas en Facebook</p>
     		<p>Estrategia de SEO intermedia</p>

     	</article>
     	</div>


        <div class="col-md-3 inline-block">
     	<article>
     		<h4 class="SpectralSC">Golden </h4>
            <img src="img/Estrella.png " class="col-md-4 quitar-float">
     		<p>
     			<strong>
     				Prueba 60$ USD
     			</strong>
     		</p>
     		<p>Sitio web comercial hasta 15 secciones y 20 productos</p>
     		<p>10 cambios mensuales</p>
     		<p>Anuncios en Google</p>
     		<p>Anuncios en Facebook</p>
     		<p>Manejo dedicado en Facebook</p>
     		<p>Estrategia de SEO intermedia</p>
     		<p>Automatización de Marketing Digital</p>
     		<p>Redes Sociales necesarias</p>
     		<p>Estrategia de SEO completa</p>
     	</article>
        </div>
        </section>
             </div>
     </body>
</html>