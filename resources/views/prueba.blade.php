<!DOCTYPE html>
<!--
Template Name: NobleUI - Laravel Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_laravel
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">
    @yield('metas')
    

    <title>I.E Mariano Melgar</title>

<<<<<<< HEAD
  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- CSRF Token -->
  <meta name="_token" content="OjbRWW0MIVXz85uUdZMVphEqxPIhsDUVvn68VXjZ">
  
  <link rel="shortcut icon" href="https://www.nobleui.com/laravel/template/demo1/favicon.ico">
=======
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- CSRF Token -->
    <meta name="_token" content="OjbRWW0MIVXz85uUdZMVphEqxPIhsDUVvn68VXjZ">
    
    <link rel="shortcut icon" href="https://www.nobleui.com/laravel/template/demo1/favicon.ico">
>>>>>>> c807898 (El usuario ya puede cerrar sesion)

    <!-- plugin css -->
    <link href="https://www.nobleui.com/laravel/template/demo1/assets/fonts/feather-font/css/iconfont.css" rel="stylesheet" />
    <link href="https://www.nobleui.com/laravel/template/demo1/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" />
    <!-- end plugin css -->

      <link href="https://www.nobleui.com/laravel/template/demo1/assets/plugins/flatpickr/flatpickr.min.css" rel="stylesheet" />

    <!-- common css -->
    <link href="https://www.nobleui.com/laravel/template/demo1/css/app.css" rel="stylesheet" />
    <!-- end common css -->
    <style>
      .buy-now-wrapper{
        display: none;
      }
      .darkThemeAll{
        background-color: #0c1427 !important;
        color: white;
      }
      .darkThemeAll input{
        background-color: #0c1427 !important;
        color: white;
        border-color: #6571ff;
      }
    </style>
    @yield('styles')
</head>
<body data-base-url="https://www.nobleui.com/laravel/template/demo1">

  <script src="https://www.nobleui.com/laravel/template/demo1/assets/js/spinner.js"></script>

  <div class="main-wrapper" id="app">


  <nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        SISTEMA<span>ESCUELA</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">MAIN</li>
        <li class="nav-item active">
          <a href="https://www.nobleui.com/laravel/template/demo1" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">PRINCIPAL</span>
          </a>
        </li>
        <li class="nav-item nav-category">SISTEMAS</li>
        <li class="nav-item ">
          <a class="nav-link" data-bs-toggle="collapse" href="#email" role="button" aria-expanded="false" aria-controls="email">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">MANTENEDOR</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse " id="email">
            <ul class="nav sub-menu">
                @if(Auth::check() && Auth::user()->personal && Auth::user()->personal->tipoPersonal->tipoPersonal == 'Secretaria')
                  <li class="nav-item">
                    <a href="{{route('alumno.index')}}" class="nav-link ">ALUMNOS</a>
                  </li>
                @endif
                @if(Auth::check() && Auth::user()->personal && Auth::user()->personal->tipoPersonal->tipoPersonal == 'Secretaria')
                <li class="nav-item">
                  <a href="{{route('grado.index')}}" class="nav-link ">GRADO</a>
                </li>
                @endif
                @if(Auth::check() && Auth::user()->personal && Auth::user()->personal->tipoPersonal->tipoPersonal == 'Secretaria')
                  <li class="nav-item">
                    <a href="{{route('curso.index')}}" class="nav-link ">CURSO</a>
                  </li>
                @endif
                @if(Auth::check() && Auth::user()->personal && Auth::user()->personal->tipoPersonal->tipoPersonal == 'Secretaria')
                <li class="nav-item">
                  <a href="{{route('capacidad.index')}}" class="nav-link ">CAPACIDAD</a>
                </li>
                @endif
                @if(Auth::check() && Auth::user()->personal && Auth::user()->personal->tipoPersonal->tipoPersonal == 'Secretaria')
                <li class="nav-item">
                  <a href="{{route('personal.index')}}" class="nav-link ">PERSONAL</a>
                </li>
                @endif
                @if(Auth::check() && Auth::user()->personal && Auth::user()->personal->tipoPersonal->tipoPersonal == 'Secretaria')
                  <li class="nav-item">
                    <a href="{{route('catedra.index')}}" class="nav-link ">CATÉDRAS</a>
                  </li>
                @endif
                @if(Auth::check() && Auth::user()->personal && Auth::user()->personal->tipoPersonal->tipoPersonal == 'Secretaria')
                  <li class="nav-item">
                    <a href="{{route('listadonotas')}}" class="nav-link ">LISTADO DE NOTAS</a>
                  </li>
                @endif
                @if(Auth::check() && Auth::user()->personal && Auth::user()->personal->tipoPersonal->tipoPersonal == 'Secretaria')
                  <li class="nav-item">
                    <a href="{{route('registronotas')}}" class="nav-link ">REGISTRO DE NOTAS</a>
                  </li>
                @endif
                @if(Auth::check() && Auth::user()->personal && Auth::user()->personal->tipoPersonal->tipoPersonal == 'Secretaria')
                  <li class="nav-item">
                    <a href="{{route('curso_grado.index')}}" class="nav-link ">CURSO POR GRADO</a>
                  </li>
                @endif

                @if(Auth::guard('students')->check())
                  <li class="nav-item">
                    <a href="{{route('myCourses.index')}}" class="nav-link ">CURSOS</a>
                  </li>
                @endif

                @if(Auth::guard('students')->check())
                  <li class="nav-item">
                    <a href="#" class="nav-link ">CALENDARIO</a>
                  </li>
                @endif

                @if(Auth::guard('apoderados')->check())
                    @isset($codigoEstudiante)
                        <li class="nav-item">
                            <a href="{{ route('matriculaRenovacionHijo', ['codigoEstudiante' => $codigoEstudiante]) }}" class="nav-link">MATRICULA</a>
                        </li>
                    @endisset
                @endif


            </ul>
          </div>
        </li>
        @if( Auth::check() && Auth::user()->personal && Auth::user()->personal->tipoPersonal->tipoPersonal == 'Secretaria')
          <li class="nav-item ">
            <a href="{{route('matricula.index')}}" class="nav-link">
              <i class="link-icon" data-feather="message-square"></i>
              <span class="link-title">MATRICULAS</span>
            </a>
          </li>
        @endif
        <li class="nav-item ">
          <a class="nav-link" data-bs-toggle="collapse" href="#email" role="button" aria-expanded="false" aria-controls="email">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">NOTAS</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse " id="email">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('registronotas.index')}}" class="nav-link ">Ver</a>
              </li>
            </ul>
          </div>
        </li>
        @if(Auth::check() && Auth::user()->personal && Auth::user()->personal->tipoPersonal->tipoPersonal == 'Director')
          <li class="nav-item ">
            <a class="nav-link" data-bs-toggle="collapse" href="#email" role="button" aria-expanded="false" aria-controls="email">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">PERIODO</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse " id="email">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('myPeriodo.index')}}" class="nav-link ">Nuevo Periodo</a>
                </li>
              </ul>
            </div>
          </li>
        @endif

        <li class="nav-item ">
          <a href="https://www.nobleui.com/laravel/template/demo1/apps/calendar" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">CALENDARIO</span>
          </a>
        </li>
      
      </ul>
    </div>
  </nav>

<nav class="settings-sidebar">
  <div class="sidebar-body">
    <a href="#" class="settings-sidebar-toggler">
      <i data-feather="settings"></i>
    </a>
    <h6 class="text-muted mb-2">Temas:</h6>
    <div class="mb-3 pb-3 border-bottom">
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
          Claro
        </label>
      </div>
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
          Oscuro
        </label>
      </div>
    </div>
  </div>
</nav>    <div class="page-wrapper">
      <nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/es.svg" class="wd-20 me-1" title="us" alt="us"> <span class="ms-1 me-1 d-none d-md-inline-block">ESPAÑOL</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="languageDropdown">
          <a href="javascript:;" class="dropdown-item py-2"> <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/es.svg" class="wd-20 me-1" title="es" alt="es"> <span class="ms-1"> ESPAÑOL </span></a>
          <a href="javascript:;" class="dropdown-item py-2"> <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/us.svg" class="wd-20 me-1" title="us" alt="us"> <span class="ms-1"> INGLÉS </span></a>
          <a href="javascript:;" class="dropdown-item py-2"> <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/fr.svg" class="wd-20 me-1" title="fr" alt="fr"> <span class="ms-1"> FRANCÉS </span></a>
          <a href="javascript:;" class="dropdown-item py-2"> <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/de.svg" class="wd-20 me-1" title="de" alt="de"> <span class="ms-1"> ALEMÁN </span></a>
          <a href="javascript:;" class="dropdown-item py-2"> <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/pt.svg" class="wd-20 me-1" title="pt" alt="pt"> <span class="ms-1"> PORTUGUEZ </span></a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i data-feather="grid"></i>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
          <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
            <p class="mb-0 fw-bold">Web Apps</p>
            <a href="javascript:;" class="text-muted">Editar</a>
          </div>
          <div class="row g-0 p-1">
            <div class="col-3 text-center">
              <a href="https://www.nobleui.com/laravel/template/demo1/apps/chat" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i><p class="tx-12">Chat</p></a>
            </div>
            <div class="col-3 text-center">
              <a href="https://www.nobleui.com/laravel/template/demo1/apps/calendar" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i><p class="tx-12">Calendar</p></a>
            </div>
            <div class="col-3 text-center">
              <a href="https://www.nobleui.com/laravel/template/demo1/email/inbox" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i><p class="tx-12">Email</p></a>
            </div>
            <div class="col-3 text-center">
              <a href="https://www.nobleui.com/laravel/template/demo1/general/profile" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i><p class="tx-12">Profile</p></a>
            </div>
          </div>
          <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
            <a href="javascript:;">Vir Todo</a>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i data-feather="mail"></i>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
          <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
            <p>10 Nuevos Mensajes</p>
            <a href="javascript:;" class="text-muted">Limpiar</a>
          </div>
          <div class="p-1">
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://www.nobleui.com/laravel/template/demo1/assets/images/faces/face2.jpg" alt="userr">
              </div>
              <div class="d-flex justify-content-between flex-grow-1">
                <div class="me-4">
                  <p>Leonardo Payne</p>
                  <p class="tx-12 text-muted">Project status</p>
                </div>
                <p class="tx-12 text-muted">2 min ago</p>
              </div>	
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://www.nobleui.com/laravel/template/demo1/assets/images/faces/face3.jpg" alt="userr">
              </div>
              <div class="d-flex justify-content-between flex-grow-1">
                <div class="me-4">
                  <p>Carl Henson</p>
                  <p class="tx-12 text-muted">Client meeting</p>
                </div>
                <p class="tx-12 text-muted">30 min ago</p>
              </div>	
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://www.nobleui.com/laravel/template/demo1/assets/images/faces/face4.jpg" alt="userr">
              </div>
              <div class="d-flex justify-content-between flex-grow-1">
                <div class="me-4">
                  <p>Jensen Combs</p>
                  <p class="tx-12 text-muted">Project updates</p>
                </div>
                <p class="tx-12 text-muted">1 hrs ago</p>
              </div>	
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://www.nobleui.com/laravel/template/demo1/assets/images/faces/face5.jpg" alt="userr">
              </div>
              <div class="d-flex justify-content-between flex-grow-1">
                <div class="me-4">
                  <p>Amiah Burton</p>
                  <p class="tx-12 text-muted">Project deatline</p>
                </div>
                <p class="tx-12 text-muted">2 hrs ago</p>
              </div>	
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://www.nobleui.com/laravel/template/demo1/assets/images/faces/face6.jpg" alt="userr">
              </div>
              <div class="d-flex justify-content-between flex-grow-1">
                <div class="me-4">
                  <p>Yaretzi Mayo</p>
                  <p class="tx-12 text-muted">New record</p>
                </div>
                <p class="tx-12 text-muted">5 hrs ago</p>
              </div>	
            </a>
          </div>
          <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
            <a href="javascript:;">Ver Todo</a>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i data-feather="bell"></i>
          <div class="indicator">
            <div class="circle"></div>
          </div>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
          <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
            <p>Nuevas Notificaciones</p>
            <a href="javascript:;" class="text-muted">Clear Limpiar</a>
          </div>
          <div class="p-1">
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="gift"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>New Order Recieved</p>
                <p class="tx-12 text-muted">30 min ago</p>
              </div>	
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="alert-circle"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>Server Limit Reached!</p>
                <p class="tx-12 text-muted">1 hrs ago</p>
              </div>	
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <img class="wd-30 ht-30 rounded-circle" src="https://www.nobleui.com/laravel/template/demo1/assets/images/faces/face6.jpg" alt="userr">
              </div>
              <div class="flex-grow-1 me-2">
                <p>Nuevo Registro</p>
                <p class="tx-12 text-muted">2 sec ago</p>
              </div>	
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="layers"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>Apps Update</p>
                <p class="tx-12 text-muted">5 hrs ago</p>
              </div>	
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="download"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>Descarga Completa</p>
                <p class="tx-12 text-muted">6 hrs ago</p>
              </div>	
            </a>
          </div>
          <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
            <a href="javascript:;">Ver Todo</a>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="wd-30 ht-30 rounded-circle" src="https://www.nobleui.com/laravel/template/demo1/assets/images/faces/face1.jpg" alt="profile">
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
              <img class="wd-80 ht-80 rounded-circle" src="https://www.nobleui.com/laravel/template/demo1/assets/images/faces/face1.jpg" alt="">
            </div>
            <div class="text-center">
              <p class="tx-16 fw-bolder">Amiah Burton</p>
              <p class="tx-12 text-muted">amiahburton@gmail.com</p>
            </div>
          </div>
          <ul class="list-unstyled p-1">
            <li class="dropdown-item py-2">
              <a href="https://www.nobleui.com/laravel/template/demo1/general/profile" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="user"></i>
                <span>Perfil</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="javascript:;" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="edit"></i>
                <span>Editar Perfil</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="javascript:;" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="repeat"></i>
                <span>Cambiar Usuario</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              <a href="javascript:;" class="text-body ms-0" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="me-2 icon-md" data-feather="log-out"></i>
                <span>Salir</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>      
<div class="page-content">
  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">BIENVENIDOS AL SISTEMA DE LA ESCUELA EDUCATIVA MARIANO MELGAR</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
        <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
        <input type="text" class="form-control bg-transparent border-primary" id="CalendarioTheme" placeholder="Select date" data-input>
      </div>
      <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
        <i class="btn-icon-prepend" data-feather="printer"></i>
        IMPRIMIR
      </button>
    </div>
  </div>
      
  <div class="row" id="contenidoMain">
    @yield('contenido')
  </div> <!-- row -->

  </div>
    <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
    <p class="text-muted mb-1 mb-md-0">I.E MARIANO MELGAR © 2024 TRUJILLO-PERÚ<a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
    <p class="text-muted"><i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
   </div>
</div>
</footer> 
  @yield('scripts')
    <script>
      const darkThemeAll = document.querySelector('.darkThemeAll')
      const contenidoMain = document.querySelector('#contenidoMain')
      const navbar = document.querySelector('.navbar')
      const footer = document.querySelector('.footer')
      const pageContent = document.querySelector('.page-content')
      const textCalendar = document.getElementById('CalendarioTheme')
      const idBlack = document.getElementById('themePossibility')

      const buttonDarkThemeAll = document.getElementById('sidebarDark')
      const butttonLightThemeAll = document.getElementById('sidebarLight')

      buttonDarkThemeAll.addEventListener('click',()=>{
        idBlack.classList.add('darkThemeAll')
        contenidoMain.classList.add('darkThemeAll')
        pageContent.classList.add('darkThemeAll')
        textCalendar.classList.add('darkThemeAll')
        navbar.classList.add('darkThemeAll')
        footer.classList.add('darkThemeAll')
        document.querySelectorAll('svg[stroke]').forEach(icon => {
            icon.setAttribute('stroke', 'white');
        });
        feather.replace();
      })

      butttonLightThemeAll.addEventListener('click',()=>{
        idBlack.classList.remove('darkThemeAll')
        contenidoMain.classList.remove('darkThemeAll')
        pageContent.classList.remove('darkThemeAll')
        textCalendar.classList.remove('darkThemeAll')
        navbar.classList.remove('darkThemeAll')
        footer.classList.remove('darkThemeAll')
        document.querySelectorAll('svg[stroke]').forEach(icon => {
          icon.setAttribute('stroke', 'currentColor');
        });
        feather.replace();
      })
      
      
    </script>
    <!-- base js -->
    <script src="https://www.nobleui.com/laravel/template/demo1/js/app.js"></script>
    <script src="https://www.nobleui.com/laravel/template/demo1/assets/plugins/feather-icons/feather.min.js"></script>
    <script src="https://www.nobleui.com/laravel/template/demo1/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- end base js -->

    <!-- plugin js -->
    <script src="https://www.nobleui.com/laravel/template/demo1/assets/plugins/flatpickr/flatpickr.min.js"></script>
    <script src="https://www.nobleui.com/laravel/template/demo1/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <!-- end plugin js -->

    <!-- common js -->
    <script src="https://www.nobleui.com/laravel/template/demo1/assets/js/template.js"></script>
    <!-- end common js -->

      <script src="https://www.nobleui.com/laravel/template/demo1/assets/js/dashboard.js"></script>
</body>
</html>
