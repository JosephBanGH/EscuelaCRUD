<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<html>
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="/plantilla/assets/icons/book.ico" />
    <script src="/plantilla/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="/plantilla/css/sweet-alert.css">
    <link rel="stylesheet" href="/plantilla/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/plantilla/css/normalize.css">
    <link rel="stylesheet" href="/plantilla/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plantilla/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="/plantilla/css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/plantilla/js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="/plantilla/js/modernizr.js"></script>
    <script src="/plantilla/js/bootstrap.min.js"></script>
    <script src="/plantilla/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/plantilla/js/main.js"></script>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                SISTEMA EDUCATIVO
            </div>
            <div class="full-reset" style="background-color:#2B3D51; padding: 10px 0; color:#fff;">
                <figure>
                    <img src="/plantilla/assets/img/logo.png" alt="Biblioteca" class="img-responsive center-box" style="width:55%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;">SISTEMA ESCOLAR</p>
            </div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="#"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; MANTENEDOR <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="{{route('alumno.index')}}"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; ALUMNOS</a></li>
                            <li><a href="{{route('grado.index')}}"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; GRADO</a></li>
                            <li><a href="{{route('curso.index')}}"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; CURSO</a></li>
                            <li><a href="{{route('personal.index')}}"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp;PERSONAL</a></li>
                            <li><a href="{{route('catedra')}}" ><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp;CÁTEDRAS</a></li>
                            <li><a href="{{route('listadonotas')}}"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp;LISTADO DE NOTAS</a></li>
                            <li><a href="{{route('registronotas')}}"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp;REGISTRO DE NOTAS</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <figure>
                    <img src="/plantilla/assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles">ADMIN </span>
                </li>
                <li  class="tooltips-general exit-system-button" data-href="prueba1.blade.php" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li  class="tooltips-general search-book-button" data-href="searchbook.html" data-placement="bottom" title="Buscar libro">
                    <i class="zmdi zmdi-search"></i>
                </li>
                <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
            </ul>
        </nav>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">ESCUELA MARIANO MELGAR <small> SISTEMA</small></h1>
            </div>
        </div>
        </section>
       
       
    </div>
</body>
</html>