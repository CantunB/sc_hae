<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{asset('admin/assets/brand/coreui.svg#full')}}"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{asset('admin/assets/brand/coreui.svg#signet')}}"></use>
        </svg>
    </div>
    @auth
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('home')}}">
                    <svg class="c-sidebar-nav-icon">
                    </svg> Inicio</a>
            </li>
            {{--                <span class="badge badge-info">NEW</span></a></li>
--}}
            @can('users.index')
                <li class="c-sidebar-nav-title">Administrador</li>
                <li class="c-sidebar-nav-item {{ activeMenu('usuarios') }}"><a class="c-sidebar-nav-link {{ activeMenu('usuarios') }}" href="{{route('usuarios.index')}}">
                        <svg class="c-sidebar-nav-icon {{ activeMenu('coordinations') }}">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-user')}}"></use>
                        </svg> Usuarios</a></li>
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-settings')}}"></use>
                        </svg>Configuraciones</a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        @can('roles.index')
                            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('roles.index')}}"><span class="c-sidebar-nav-icon"></span> <i class="fas fa-address-card unset" ></i>&nbsp;Roles</a></li>
                        @endcan
                        @can('permission.index')
                            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('permisos.index')}}"><span class="c-sidebar-nav-icon"></span><i class="fas fa-chalkboard-teacher unset"></i>&nbsp;Permisos</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan

            <li class="c-sidebar-nav-title">Componentes</li>
                     @can('coordinations.index')
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-institution')}}"></use>
                        </svg>Areas</a>
                    @endcan
                    <ul class="c-sidebar-nav-dropdown-items">
                        @can('coordinations.index')
                            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('areas.index')}}"><span class="c-sidebar-nav-icon"></span>  <i class="fas fa-building unset"></i>&nbsp;Areas</a></li>
                            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('coordinaciones.index')}}"><span class="c-sidebar-nav-icon"></span><i class="far fa-building"></i>&nbsp;Coordinaciones</a></li>
                        @endcan
                        @can('departments.index')
                            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('departamentos.index')}}"><span class="c-sidebar-nav-icon"></span><i class="far fa-building"></i>&nbsp;Departamentos</a></li>
                        @endcan

                    </ul>
                </li>
                @can('requisitions.index')
                    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="">
                            <svg class="c-sidebar-nav-icon">
                                <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-folder')}}"></use>
                            </svg> Requisiciones</a>
                        <ul class="c-sidebar-nav-dropdown-items">
                            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('requisiciones.index')}}"><span class="c-sidebar-nav-icon"></span><i class="fas fa-folder unset">&nbsp;</i>Requisiciones</a></li>
                        </ul>
                    </li>
                @endcan

                @can('quotes.index')
                    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="">
                            <svg class="c-sidebar-nav-icon">
                                <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-storage')}}"></use>
                            </svg> Cotizaciones</a>
                        <ul class="c-sidebar-nav-dropdown-items">
                            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('cotizaciones.index')}}"><span class="c-sidebar-nav-icon"></span><i class="fas fa-clipboard unset">&nbsp;</i>Cotizaciones</a></li>
                        </ul>
                    </li>
                @endcan
                @can('purchase.index')
                    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="">
                            <svg class="c-sidebar-nav-icon">
                                <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-dollar')}}"></use>
                            </svg> Compras</a>
                        <ul class="c-sidebar-nav-dropdown-items">
                            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('ordenes.index')}}"><span class="c-sidebar-nav-icon"></span> <i class="fas fa-clipboard-check ">&nbsp;</i>Ordenes de Compras</a></li>
                        </ul>
                        <ul class="c-sidebar-nav-dropdown-items">
                            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('compras.index')}}"><span class="c-sidebar-nav-icon"></span> <i class="fas fa-clipboard-check ">&nbsp;</i>Compras</a></li>
                        </ul>
                    </li>
                @endcan
                @can('providers.index')
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('proveedores.index')}}">
                            <svg class="c-sidebar-nav-icon">
                                <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-truck')}}"></use>
                            </svg> Proveedores</a>
                    </li>
                @endcan
                @can('storehouse.index')
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('almacen.index')}}">
                            <svg class="c-sidebar-nav-icon">
                                <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-storage')}}"></use>
                            </svg> Almacen</a></li>
                @endcan

                <li class="c-sidebar-nav-item mt-auto"><a class="c-sidebar-nav-link c-sidebar-nav-link-danger" href="{{route('logout')}}"
                                                          onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" target="_top">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{asset('admin/node_modules/@coreui/icons/sprites/free.svg#cil-account-logout')}}"></use>
                        </svg> Salir para fuera </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    @endauth
</div>
