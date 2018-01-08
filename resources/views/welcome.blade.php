
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
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
    <div class="col-md-4 center-block quitar-float text-center espacio-arriba" id="principal">
    <img src="img/logo goldenmm.png" class="animated pulse">
    <h1 class="SpectralSC azul  animated flip"> GOLDEN WIDOW</h1>
    <h2>Trasamos tu mejor marka</h2>
<nav>
    <a href="/menu" class="espacio-derecha">Menú</a>
    <a href="/contacto" class="espacio-derecha">Contacanos</a>   
    <a href="https://www.facebook.com/franck1259" class="espacio-derecha"> Facebook</a>
    <a href="https://twitter.com/chopan0002" class="espacio-derecha"> Twiter</a>
    
      
</nav>
    </div>
</body>
    

</html>

