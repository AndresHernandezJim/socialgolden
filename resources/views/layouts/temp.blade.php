<!DOCTYPE html>
<html >                        <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dashboard</title>
    <meta name="description" content="Metis: Bootstrap Responsive Admin Theme">
    <meta name="viewport" content="width=device-width">
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/css/bootstrap-responsive.min.css">
    <link type="text/css" rel="stylesheet" href="/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/css/style.css">
    <link type="text/css" rel="stylesheet" href="/css/calendar.css">
    <link rel="stylesheet" href="/css/theme.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>    
</head>
<body>
     <!-- BEGIN WRAP -->
    <div id="wrap">
        <!-- BEGIN TOP BAR -->
        <div id="top">
            <!-- .navbar -->
            <div class="navbar navbar-inverse navbar-static-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand" href="/usuario/{{Auth::user()->fb_id}}">Golden Widow</a>
                        <!-- .topnav -->
                        <div class="btn-toolbar topnav">
                            <div class="btn-group">
                                <a id="changeSidebarPos" class="btn btn-success" rel="tooltip" data-original-title="Show /  Hide Sidebar" data-placement="bottom">
                                        <i class="icon-resize-horizontal"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a href="#helpModal" class="btn btn-inverse" rel="tooltip" data-placement="bottom" data-original-title="Help" data-toggle="modal"><i class="icon-question-sign"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a href="{{ route('logout') }}" class="btn btn-inverse" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="icon-off"></i>&nbsp;Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                            <!-- /.topnav -->
                        </div>
                    </div>
                </div>
                <!-- /.navbar -->
            </div>
        </div>
            <!-- END TOP BAR -->
            <!-- BEGIN LEFT  -->
        <div id="left">
            <!-- .informacion de usuario -->
            <div class="media user-media hidden-phone">
                <a href="" class="user-link">
                    <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="img-responsive  img-polaroid user-img">
                </a>
                <div class="media-body hidden-tablet">
                    <h5 class="media-heading">{{Auth::user()->name}}</h5>
                    <ul class="unstyled user-info">
                        <li><a href="{{Auth::user()->perfil}}" target="_blank">Perfil</a></li>
                        <li>Id : <br>
                            <small><i class="icon-calendar"></i> &nbsp;{{Auth::user()->fb_id}}</small>
                        </li>
                        <li>Email: <br>
                            <small><i class="icon-envelope"></i>&nbsp;{{Auth::user()->email}}<small></li>
                    </ul>
                </div>
            </div>
            <!-- /.user-media -->
            <!-- BEGIN MAIN NAVIGATION -->
            <ul id="menu" class="unstyled accordion collapse in">
                <li><a href="/usuario/{{Auth::user()->fb_id}}"><i class="icon-angle-right"></i>Dashboard</a></li>
                <li><a href="/usuario/calendario/{{Auth::user()->fb_id}}"><i class="icon-calendar icon-large"></i> Calendarización</a></li>
                <li><a href="/usuario/publicar"><i class="icon-pencil icon-large"></i> Publicar</a></li>
                
            </ul>
            <!-- END MAIN NAVIGATION -->

        </div>
        <!-- END LEFT -->

        <!-- BEGIN CONTENT -->
         <div id="content">
            <!-- .outer -->
            <div class="container-fluid outer">
                <div class="row-fluid">
                    <!-- .inner -->
                    <div class="span12 inner">
                        @yield('contenido')
                    </div>
                    <!-- /.inner -->
                </div>
                <!-- /.row-fluid -->
            </div>
            <!-- /.outer -->
        </div>
        <!-- END CONTENT -->
        <!-- #push do not remove -->
        <div id="push"></div>
            <!-- /#push -->
    </div>
    <!-- END WRAP -->
    <div class="clearfix"></div>
    <!-- BEGIN FOOTER -->
    <div id="footer">
        <p><?php $ano=date('Y'); echo $ano." © Golden Widow"; ?></p>
    </div>
    <!-- END FOOTER -->
    <!-- #helpModal -->
    <div id="helpModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel"
         aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="helpModalLabel"><i class="icon-external-link"></i> Help</h3>
        </div>
        <div class="modal-body">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                anim id est laborum.
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
    <!-- /#helpModal -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>window.jQuery.ui || document.write('<script src="assets/js/vendor/jquery-ui-1.10.0.custom.min.js"><\/script>')</script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/lib/jquery.tablesorter.min.js"></script>
    <script src="/js/lib/jquery.mousewheel.js"></script>
    <script src="/js/lib/jquery.sparkline.min.js"></script>
    <script src="/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/lib/bootstrap-fileupload.js"></script>

    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>

</body>
</html>
