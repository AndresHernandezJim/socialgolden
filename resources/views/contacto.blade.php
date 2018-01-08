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
     		<li class="col-md-3 inline-block"><a href="/menu">Inicio</li>

     	</ul>
     </nav>
<section>
    <div class="text-center">
        <h1 class="SpectralSC azul">Contactos</h1>
        <p>
            Avenida Tecnológico 1 A.P. 10 y 128, Villa de Álvarez, 28976 Villa de Álvarez, Col.
        </p>
        <p>
            Correo <a href="mailto:12460332@itcolima.edu.mx">12460332@itcolima.edu.mx </a>
        </p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1331.641640989809!2d-103.7242535970053!3d19.262729190890276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84255ac989b702cf%3A0xd6b8fbaecb0c480f!2sInstituto+Tecnol%C3%B3gico+de+Colima!5e0!3m2!1ses!2smx!4v1513504779366" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</section>
     </body>
</html>