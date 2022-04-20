<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>SMAPAC - @yield('title','Compras')</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('admin/assets/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('admin/assets/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('admin/assets/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('admin/assets/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('admin/assets/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('admin/assets/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('admin/assets/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('admin/assets/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('admin/assets/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('admin/assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/assets/favicon/favicon-16x16.png')}}">
    <link href="{{ asset('css/all.css')}}" rel="stylesheet">
        <link rel="manifest" href="{{asset('admin/assets/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('admin/assets/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui@3.0.0-rc.0/dist/css/coreui.min.css">
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
--}}


    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
{{--    <link href="{{ asset('admin/node_modules/@coreui/chartjs/dist/css/coreui-chartjs.css') }}" rel="stylesheet">--}}
</head>
<body class="c-app">
@if(auth()->check())

<div class="c-sidebar c-sidebar-blank c-sidebar-fixed c-sidebar-lg-show" id="sidebar" >
        <div class="c-sidebar-brand d-lg-down-none">
            <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{asset('admin/assets/brand/coreui.svg#full')}}"></use>
            </svg>
            <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="{{asset('admin/assets/brand/coreui.svg#signet')}}"></use>
            </svg>
        </div>
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('home')}}">
              <svg class="c-sidebar-nav-icon">
                  <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-drop1')}}"></use>
              </svg> INICIO</a>
{{--                    <span class="badge badge-info">NEW</span>--}}
                </a></li>
            @can('admin.index')
                <li class="c-sidebar-nav-title">Administrador</li>

                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-contact')}}"></use>
                        </svg> Administrador</a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        @can('users.index')
                            <li class="c-sidebar-nav-item">
                                <a class="c-sidebar-nav-link active" href="{{route('usuarios.index')}}">
                                <span class="c-sidebar-nav-icon">
                                </span>Usuarios
                                </a>
                            </li>
                        @endcan
                        @can('permission.index')
                            <li class="c-sidebar-nav-item">
                                <a class="c-sidebar-nav-link active" href="{{route('permisos.index')}}">
                                <span class="c-sidebar-nav-icon">
                                </span>Permisos
                                </a>
                            </li>
                        @endcan
                        @can('roles.index')
                            <li class="c-sidebar-nav-item">
                                <a class="c-sidebar-nav-link active" href="{{route('roles.index')}}">
                                <span class="c-sidebar-nav-icon">
                                </span>Roles
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>

            @endcan
            @can('areas.index')
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-bank')}}"></use>
                        </svg> Areas</a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        @can('departments.index')
                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link" href="{{route('departamentos.index')}}">
                                <span class="c-sidebar-nav-icon">
                                </span>Departamentos
                            </a>
                        </li>
                        @endcan
                        @can('coordinations.index')
                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link" href="{{route('coordinaciones.index')}}">
                                <span class="c-sidebar-nav-icon">
                                </span>Coordinaciones
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
            @endcan
            <li class="c-sidebar-nav-title">Departamento</li>
            @can('requisitions.index')
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link active" href="{{route('requisiciones.index')}}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-description')}}"></use>
                    </svg> Requisiciones</a>
            </li>
            @endcan
            @can('quotes.index')
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link active" href="{{route('cotizaciones.index')}}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-storage')}}"></use>
                        </svg> Cotizaciones</a>
                </li>
            @endcan
            @can('purchase.index')
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-sidebar-show"><a class="c-sidebar-nav-link c-sidebar-show c-sidebar-nav-dropdown-toggle">
                        <svg class="c-sidebar-nav-icon">
                            {{-- <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-puzzle')}}"></use> --}}
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-puzzle')}}"></use>
                        </svg> Compras</a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                          <a class="c-sidebar-nav-link" href="{{route('ordenes.index')}}">
                          <span class="c-sidebar-nav-icon"></span>
                          Ordenes de Compras
                          </a>
                        </li>
                        <li class="c-sidebar-nav-item">
                          <a class="c-sidebar-nav-link" href="{{route('autorizadas.index')}}">
                            <span class="c-sidebar-nav-icon"></span>
                            Ordenes Autorizadas
                          </a>
                        </li>
                        <li class="c-sidebar-nav-item">
                          <a class="c-sidebar-nav-link" href="{{route('facturas.index')}}">
                            <span class="c-sidebar-nav-icon"></span>
                            Facturas de Compras
                          </a>
                        </li>
                    </ul>
                </li>
            @endcan


            <li class="c-sidebar-nav-divider"></li>
            <li class="c-sidebar-nav-title">Extras</li>

            <li class="c-sidebar-nav-item mt-auto"><a class="c-sidebar-nav-link c-sidebar-nav-link-danger"
                                                      href="{{route('logout')}}"
                                                      onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();
                                                       "target="_top">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-layers')}}"></use>
                    </svg> Cerrar Sesión &nbsp;<strong></strong></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>

<div class="c-wrapper c-fixed-components">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
            <svg class="c-icon c-icon-lg">
                <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-menu')}}"></use>
            </svg>
        </button><a class="c-header-brand d-lg-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{asset('admin/assets/brand/smapac.svg#full')}}"></use>
            </svg></a>
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
            <svg class="c-icon c-icon-lg">
                <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-menu')}}"></use>
            </svg>
        </button>
        <ul class="c-header-nav d-md-down-none">
            <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">
                @if(auth()->check())
                  {{  Auth::user()->NoEmpleado ." ". Auth::user()->name ."  ". Auth::user()->roles[0]->name}}
                    @endif
                </a>
            </li>
        </ul>
         @auth
        <ul class="c-header-nav ml-auto mr-4">
            {{-- <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                    <svg class="c-icon">
                        <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-bell')}}"></use>
                    </svg></a></li> --}}
            {{-- <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                    <svg class="c-icon">
                        <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-list-rich')}}"></use>
                    </svg></a></li>
            <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                    <svg class="c-icon">
                        <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open')}}"></use>
                    </svg></a></li> --}}


            <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="c-avatar"><img class="c-avatar-img" src="{{asset('admin/assets/img/avatars/user.png')}}" alt="user@email.com"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
                    <a class="dropdown-item" href="#">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-user')}}"></use>
                        </svg> Cuenta</a>
                        {{-- <svg class="c-icon mr-2">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-bell')}}"></use>
                        </svg> Updates<span class="badge badge-info ml-auto">42</span></a><a class="dropdown-item" href="#"> --}}
                        {{-- <svg class="c-icon mr-2">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open')}}"></use>
                        </svg> Messages<span class="badge badge-success ml-auto">42</span></a><a class="dropdown-item" href="#"> --}}
                        {{-- <svg class="c-icon mr-2">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-task')}}"></use>
                        </svg> Tasks<span class="badge badge-danger ml-auto">42</span></a><a class="dropdown-item" href="#"> --}}
                    {{--     <svg class="c-icon mr-2">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-comment-square')}}"></use>--}}
                     {{--   </svg> Comments<span class="badge badge-warning ml-auto">42</span>--}}

                    <div class="dropdown-header bg-light py-2"><strong>Configuraciones</strong></div>

                        {{--<svg class="c-icon mr-2">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-settings')}}"></use>
                        </svg> Settings</a><a class="dropdown-item" href="#">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-credit-card')}}"></use>
                        </svg> Payments<span class="badge badge-secondary ml-auto">42</span></a><a class="dropdown-item" href="#">--}}
                        @can('requisitions.index')
                        <a class="dropdown-item" href="{{ route('requisiciones.list',Auth::user()->id) }}">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-file')}}"></use>
                        </svg> Requisiciones<span class="badge badge-primary ml-auto">{{auth()->user()->count()}}</span></a>
                        @endcan

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-account-logout')}}"></use>
                        </svg>                             {{ __('Cerrar Sesion') }}
                        </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

        @endauth
            <div class="c-subheader px-3">
                <ol class="breadcrumb border-0 m-0">
                @if(auth()->check())
                   <li class="breadcrumb-item"> {{  Auth::user()->asignado->areas->departments->name ?? 'Administrador General'}}</li>
                @endif
                </ol>
            </div>
    </header>
    @endif

    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                @include('common.alerts')
                <div class="fade-in">
                    <div class="row">
                    @yield('content')
            </div>
        </main>
    </div>
    <footer class="c-footer">
        <div>&copy;{{date('Y')}}.Sistema Municipal de Agua Potable y Alcantarillado de Carmen (SMAPAC). H. Ayuntamiento de Carmen. All rights reserved.</div>
    </footer>
</div>
</div>

<!-- CoreUI and necessary plugins-->
<script src="{{asset('admin/node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js')}}"></script>
<!--[if IE]><!-->
<script src="{{asset('admin/node_modules/@coreui/icons/js/svgxuse.min.js')}}"></script>
<!--<![endif]-->
<script   src="{{asset('/js/alerts.js')}}" defer></script>
<!-- Plugins and scripts required by this view-->
{{--<script src="{{asset('admin/js/main.js')}}"></script>--}}
 {{--<script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>{{--
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script> --}}
</body>
</html>
