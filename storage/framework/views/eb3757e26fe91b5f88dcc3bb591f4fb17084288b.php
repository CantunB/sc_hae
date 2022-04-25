<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- UserSeeder box -->
        <div class="user-box text-center">
            <img src="<?php echo e(asset('assets/images/users/user-1.jpg')); ?>" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <?php if(Auth::user()->hasRole(['super-admin','admin'])): ?>
                <li class="menu-title">Menu</li>
                 <li>
                    <a href="<?php echo e(route('home')); ?>">
                        <i data-feather="droplet" class="icon-dual-info"></i>
                        <span> Inicio </span>
                    </a>
                </li>

                <?php endif; ?>


                <li class="menu-title mt-2">Acceso</li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_users','read_roles','read_permisos'])): ?>
                <li>
                    <a href="#sidebarCrm" data-toggle="collapse">
                        <i data-feather="shield" class="icon-dual-dark"></i>
                        <span> Administrador </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?php echo e(route('usuarios.index')); ?>">Empleados</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('roles.index')); ?>">Roles</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('permisos.index')); ?>">Permisos individuales</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_coordinaciones','read_departamentos'])): ?>
                <li>
                    <a href="#sidebarAreas" data-toggle="collapse">
                        <i data-feather="home" class="icon-dual-blue"></i>
                        <span> Areas </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAreas">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?php echo e(route('areas.index')); ?>">Areas</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('coordinaciones.index')); ?>">Coordinaciones</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('departamentos.index')); ?>">Departamentos</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_proveedores')): ?>
                <li>
                    <a href="<?php echo e(route('proveedores.index')); ?>">
                        <i data-feather="truck" class="icon-dual-warning"></i>
                        <span> Proveedores </span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_requisicion','update_requisicion'])): ?>
                <li>
                    <a href="#sidebarRequisicion" data-toggle="collapse">
                        <i data-feather="file-text" class="icon-dual-success"></i>
                        <span> Requisiciones </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarRequisicion">
                        <ul class="nav-second-level">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_requisicion')): ?>
                                <li>
                                    <a href="<?php echo e(route('requisiciones.index')); ?>">Requisiciones</a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_requisicion')): ?>
                                <li>
                                    <a href="<?php echo e(route('requisiciones.autorizadas')); ?>">Requisiciones Autorizadads</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_quotes')): ?>
                <li>
                    <a href="<?php echo e(route('cotizaciones.index')); ?>">
                        <i data-feather="archive" class="icon-dual-danger"></i>
                        <span> Cotizaciones </span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['read_compras'])): ?>
                <li>
                    <a href="#sidebarCompras" data-toggle="collapse">
                        <i data-feather="shopping-cart" class="icon-dual-pink"></i>
                        <span> Compras </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCompras">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?php echo e(route('ordenes.index')); ?>">Ordenes de Compras</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('autorizadas.index')); ?>">Ordenes Autorizadas</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('facturas.index')); ?>">Facturas de compras</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <?php endif; ?>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/layouts/partials/left_sidebar.blade.php ENDPATH**/ ?>