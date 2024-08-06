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

  <title>NobleUI - Laravel Admin Dashboard Template</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->
  
  <!-- CSRF Token -->
  <meta name="_token" content="OjbRWW0MIVXz85uUdZMVphEqxPIhsDUVvn68VXjZ">
  
  <link rel="shortcut icon" href="https://www.nobleui.com/laravel/template/demo1/favicon.ico">

  <!-- plugin css -->
  <link href="https://www.nobleui.com/laravel/template/demo1/assets/fonts/feather-font/css/iconfont.css" rel="stylesheet" />
  <link href="https://www.nobleui.com/laravel/template/demo1/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" />
  <!-- end plugin css -->

    <link href="https://www.nobleui.com/laravel/template/demo1/assets/plugins/flatpickr/flatpickr.min.css" rel="stylesheet" />

  <!-- common css -->
  <link href="https://www.nobleui.com/laravel/template/demo1/css/app.css" rel="stylesheet" />
  <!-- end common css -->

  </head>
<body data-base-url="https://www.nobleui.com/laravel/template/demo1">

  <script src="https://www.nobleui.com/laravel/template/demo1/assets/js/spinner.js"></script>

  <div class="main-wrapper" id="app">
    <nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Noble<span>UI</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item active">
        <a href="https://www.nobleui.com/laravel/template/demo1" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Principal</span>
        </a>
      </li>
      <li class="nav-item nav-category">web apps</li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#email" role="button" aria-expanded="false" aria-controls="email">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">mantenedor</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="email">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{route('alumno.index')}}" class="nav-link ">Alumnos</a>
            <a href="{{ route('alumno.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
            </li>
            <li class="nav-item">
              <a href="{{route('catedra')}}" class="nav-link ">Catedras</a>
            </li>
            <li class="nav-item">
              <a href="{{route('listadonotas')}}" class="nav-link ">Lista de notas</a>
            </li>
            <li class="nav-item">
              <a href="{{route('registronotas')}}" class="nav-link ">Registro de notas</a>
            </li>
            <li class="nav-item">
              <a href="{{route('personal.index')}}" class="nav-link ">Personal</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a href="https://www.nobleui.com/laravel/template/demo1/apps/chat" class="nav-link">
          <i class="link-icon" data-feather="message-square"></i>
          <span class="link-title">Chat</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="https://www.nobleui.com/laravel/template/demo1/apps/calendar" class="nav-link">
          <i class="link-icon" data-feather="calendar"></i>
          <span class="link-title">Calendar</span>
        </a>
      </li>
      <li class="nav-item nav-category">Components</li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
          <i class="link-icon" data-feather="feather"></i>
          <span class="link-title">UI Kit</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="uiComponents">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/accordion" class="nav-link ">Accordion</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/alerts" class="nav-link ">Alerts</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/badges" class="nav-link ">Badges</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/breadcrumbs" class="nav-link ">Breadcrumbs</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/buttons" class="nav-link ">Buttons</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/button-group" class="nav-link ">Button group</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/cards" class="nav-link ">Cards</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/carousel" class="nav-link ">Carousel</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/collapse" class="nav-link ">Collapse</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/dropdowns" class="nav-link ">Dropdowns</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/list-group" class="nav-link ">List group</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/media-object" class="nav-link ">Media object</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/modal" class="nav-link ">Modal</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/navs" class="nav-link ">Navs</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/navbar" class="nav-link ">Navbar</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/pagination" class="nav-link ">Pagination</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/popovers" class="nav-link ">Popvers</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/progress" class="nav-link ">Progress</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/scrollbar" class="nav-link ">Scrollbar</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/scrollspy" class="nav-link ">Scrollspy</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/spinners" class="nav-link ">Spinners</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/tabs" class="nav-link ">Tabs</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/ui-components/tooltips" class="nav-link ">Tooltips</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#forms" role="button" aria-expanded="false" aria-controls="forms">
          <i class="link-icon" data-feather="inbox"></i>
          <span class="link-title">Forms</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="forms">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/forms/basic-elements" class="nav-link ">Basic Elements</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/forms/advanced-elements" class="nav-link ">Advanced Elements</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/forms/editors" class="nav-link ">Editors</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/forms/wizard" class="nav-link ">Wizard</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#charts" role="button" aria-expanded="false" aria-controls="charts">
          <i class="link-icon" data-feather="pie-chart"></i>
          <span class="link-title">Charts</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="charts">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/charts/apex" class="nav-link ">Apex</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/charts/chartjs" class="nav-link ">ChartJs</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/charts/flot" class="nav-link ">Flot</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/charts/peity" class="nav-link ">Peity</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/charts/sparkline" class="nav-link ">Sparkline</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" role="button" aria-expanded="false" aria-controls="tables">
          <i class="link-icon" data-feather="layout"></i>
          <span class="link-title">Tables</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="tables">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/tables/basic-tables" class="nav-link ">Basic Tables</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/tables/data-table" class="nav-link ">Data Table</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#icons" role="button" aria-expanded="false" aria-controls="icons">
          <i class="link-icon" data-feather="smile"></i>
          <span class="link-title">Icons</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="icons">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/icons/feather-icons" class="nav-link ">Feather Icons</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/icons/mdi-icons" class="nav-link ">Mdi Icons</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">Pages</li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#general" role="button" aria-expanded="false" aria-controls="general">
          <i class="link-icon" data-feather="book"></i>
          <span class="link-title">Special Pages</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="general">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/general/blank-page" class="nav-link ">Blank page</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/general/faq" class="nav-link ">Faq</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/general/invoice" class="nav-link ">Invoice</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/general/profile" class="nav-link ">Profile</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/general/pricing" class="nav-link ">Pricing</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/general/timeline" class="nav-link ">Timeline</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" role="button" aria-expanded="false" aria-controls="auth">
          <i class="link-icon" data-feather="unlock"></i>
          <span class="link-title">Authentication</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="auth">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/auth/login" class="nav-link ">Login</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/auth/register" class="nav-link ">Register</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="#error" role="button" aria-expanded="false" aria-controls="error">
          <i class="link-icon" data-feather="cloud-off"></i>
          <span class="link-title">Error</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse " id="error">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/error/404" class="nav-link ">404</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/laravel/template/demo1/error/500" class="nav-link ">500</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">Docs</li>
      <li class="nav-item">
        <a href="https://www.nobleui.com/laravel/documentation/docs.html" target="_blank" class="nav-link">
          <i class="link-icon" data-feather="hash"></i>
          <span class="link-title">Documentation</span>
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
    <h6 class="text-muted mb-2">Sidebar:</h6>
    <div class="mb-3 pb-3 border-bottom">
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
          Light
        </label>
      </div>
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
          Dark
        </label>
      </div>
    </div>
    <div class="theme-wrapper">
      <h6 class="text-muted mb-2">Light Version:</h6>
      <a class="theme-item active" href="https://www.nobleui.com/laravel/template/demo1/">
        <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/screenshots/light.jpg" alt="light version">
      </a>
      <h6 class="text-muted mb-2">Dark Version:</h6>
      <a class="theme-item" href="https://www.nobleui.com/laravel/template/demo2/">
        <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/screenshots/dark.jpg" alt="light version">
      </a>
    </div>
  </div>
</nav>    <div class="page-wrapper">
      <nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <form class="search-form">
      <div class="input-group">
        <div class="input-group-text">
          <i data-feather="search"></i>
        </div>
        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
      </div>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/us.svg" class="wd-20 me-1" title="us" alt="us"> <span class="ms-1 me-1 d-none d-md-inline-block">English</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="languageDropdown">
          <a href="javascript:;" class="dropdown-item py-2"> <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/us.svg" class="wd-20 me-1" title="us" alt="us"> <span class="ms-1"> English </span></a>
          <a href="javascript:;" class="dropdown-item py-2"> <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/fr.svg" class="wd-20 me-1" title="fr" alt="fr"> <span class="ms-1"> French </span></a>
          <a href="javascript:;" class="dropdown-item py-2"> <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/de.svg" class="wd-20 me-1" title="de" alt="de"> <span class="ms-1"> German </span></a>
          <a href="javascript:;" class="dropdown-item py-2"> <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/pt.svg" class="wd-20 me-1" title="pt" alt="pt"> <span class="ms-1"> Portuguese </span></a>
          <a href="javascript:;" class="dropdown-item py-2"> <img src="https://www.nobleui.com/laravel/template/demo1/assets/images/flags/es.svg" class="wd-20 me-1" title="es" alt="es"> <span class="ms-1"> Spanish </span></a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i data-feather="grid"></i>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
          <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
            <p class="mb-0 fw-bold">Web Apps</p>
            <a href="javascript:;" class="text-muted">Edit</a>
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
            <a href="javascript:;">View all</a>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i data-feather="mail"></i>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
          <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
            <p>9 New Messages</p>
            <a href="javascript:;" class="text-muted">Clear all</a>
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
            <a href="javascript:;">View all</a>
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
            <p>6 New Notifications</p>
            <a href="javascript:;" class="text-muted">Clear all</a>
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
                <p>New customer registered</p>
                <p class="tx-12 text-muted">2 sec ago</p>
              </div>	
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="layers"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>Apps are ready for update</p>
                <p class="tx-12 text-muted">5 hrs ago</p>
              </div>	
            </a>
            <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
              <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                <i class="icon-sm text-white" data-feather="download"></i>
              </div>
              <div class="flex-grow-1 me-2">
                <p>Download completed</p>
                <p class="tx-12 text-muted">6 hrs ago</p>
              </div>	
            </a>
          </div>
          <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
            <a href="javascript:;">View all</a>
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
                <span>Profile</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="javascript:;" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="edit"></i>
                <span>Edit Profile</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="javascript:;" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="repeat"></i>
                <span>Switch User</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="javascript:;" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="log-out"></i>
                <span>Log Out</span>
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
    <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
      <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
      <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
    </div>
    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="printer"></i>
      Print
    </button>
    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="download-cloud"></i>
      Download Report
    </button>
  </div>
</div>

    <div class="row">
      @yield('contenido')
    </div> <!-- row -->

      </div>
      <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
  <p class="text-muted mb-1 mb-md-0">Copyright © 2023 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
  <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
</footer>    </div>
  </div>
  @yield('scripts')
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
