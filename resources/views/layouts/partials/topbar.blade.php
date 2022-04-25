{{--  <div class="navbar-custom" style="background-color: #FF7F50;">  --}}
<div class="navbar-custom" style="background-color: #FF8C00;">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>
            {{--  <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge">{{Auth::user()->count()}}</span>
                </a>
            </li>  --}}

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="pro-user-name ml-1">
                        {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 style="text-transform: uppercase" class="text-overflow m-0">{{Auth::user()->roles[0]->name}}</h6>
                    </div>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="route('logout')" class="dropdown-item notify-item"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span>{{ __('Cerrar Sesion') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="" class="logo logo-dark text-center">
                <span class="logo-sm">
                    {{--  H.Ayuntamiento de Escárcega  --}}
                    {{--  <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="35">  --}}
                    <span class="logo-lg-text-light">H.A.E</span>
                </span>
                <span class="logo-lg">
                    {{--  H.Ayuntamiento de Escárcega  --}}
                    {{--  <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="50">  --}}
                    <span class="logo-lg-text-light">Escárcega</span>
                </span>
            </a>

            <a href="" class="logo logo-light text-center">
                <span class="logo-sm">
                    <span class="logo-lg-text-light">H.A.E</span>
                    {{--  <img src="{{ asset('assets/images/logo_ayuntamiento.png') }}" alt="" height="35">  --}}
                </span>
                <span class="logo-lg">
                    <span class="logo-lg-text-light">Escárcega</span>

                    {{--  <img src="{{ asset('assets/images/logo_ayuntamiento.png') }}" alt="" height="50">  --}}
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
