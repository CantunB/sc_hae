<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','SMAPAC') }} - {{ config('app.subtitle','Inicio') }}</title>
    <!-- Scripts -->
    <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>
<!--  <script src="/js/261eef97ab.js"></script> -->
    <script src="{{asset('js/alerts.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8fb0aaa203.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/dataTables.bootstrap4.min.css')}}"  rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'SMAPAC') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth

                            {{--Inicia el dropdown de CONFIGURACIONES--}}
                            @can('configurations.index')
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-cog unset" style="color: #339af0;"></i>
                                Configuracion
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               @can('users.index')
                                <a class="nav-link" href="{{ route('usuarios.index') }}">
                                    <i class="fas fa-users unset" style="color: #339af0;"></i>
                                    Usuarios
                                </a>
                               @endcan
                               @can('roles.index')
                                <a class="nav-link" href="{{route('roles.index')}}">
                                    <i class="fas fa-address-card unset" style="color: #339af0;"></i>
                                    Roles
                                </a>
                                @endcan
                               @can('permission.index')
                                <a class="nav-link" href="{{route('permisos.index')}}">
                                    <i class="fas fa-chalkboard-teacher unset" style="color: #339af0;"></i>
                                    Permisos
                                </a>
                               @endcan
                            </div>
                            @endcan
                            {{--Termina el dropdown de CONFIGURACIONES--}}

                            {{--Inicia el dropdown de AREAS--}}
                        @can('areas.index')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{route('areas.index')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-building unset" style="color: #339af0;"></i>
                                    Areas
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="{{route('areas.index')}}">
                                        <i class="fas fa-building unset" style="color: #339af0;"></i>
                                        Areas
                                    </a>
                                @can('departments.index')
                                        <a class="nav-link" href="{{ route('departamentos.index') }}">
                                            <i class="far fa-building" style="color: #339af0;"></i>
                                            Departamentos
                                        </a>
                                @endcan
                                @can('coordinations.index')
                                        <a class="nav-link" href="{{ route('coordinaciones.index') }}">
                                            <i class="far fa-building" style="color: #339af0;"></i>
                                            Coordinaciones
                                        </a>
                                @endcan
                                </div>
                            @endcan

                            {{--Termina el dropdown de Areas--}}

                            {{--Inicia el dropdown de REQUISICIONES--}}

                            @can('requisitions.index')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{route('requisiciones.index')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-folder unset" style="color: #339af0;"></i>
                                        Requisiciones
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="nav-link" href="{{route('requisiciones.index')}}">
                                            <i class="fas fa-clipboard-list unset" style="color: #339af0;"></i>
                                            Requisiciones
                                        </a>
                                        @can('quotes.index')
                                            <a class="nav-link" href="{{ route('cotizaciones.index') }}">
                                                <i class="fas fa-clipboard unset" style="color: #339af0;"></i>
                                                Cotizadas
                                            </a>
                                        @endcan
                                        @can('purchase.index')
                                        <a class="nav-link" href="{{ route('compras.index') }}">
                                            <i class="fas fa-clipboard-check " style="color: #339af0;"></i>
                                            Compradas
                                        </a>
                                        @endcan
                                    </div>
                            @endcan

                            {{--TERMINA el dropdown de REQUISICIONES--}}


                            @can('storehouse.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('almacen.index')}}">
                                            <i class="fas fa-warehouse unset" style="color: #339af0;"></i>
                                            Almacen
                                        </a>
                                    </li>
                                @endcan
                            @can('providers.index')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('proveedores.index')}}">
                                            <i class="fas fa-shipping-fast unset" style="color: #339af0;"></i>
                                            Proovedores
                                        </a>
                                    </li>
                                @endcan

                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             {{Auth::user()->NoEmpleado}}       {{ Auth::user()->name }} {{ Auth::user()->roles[0]->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"

                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt unset" style="color: #339af0;"></i>
                                        {{ __('Cerrar Sesion') }}

                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>
</body>

<footer>
    <p>&copy;{{date('Y') }} {{ config('app.name') }}.Sistema Municipal de Agua Potable y Alcantarillado de Carmen (SMAPAC). H. Ayuntamiento de Carmen. All rights reserved.</p>
</footer>
</html>
