<?php $__env->startSection('title', 'Editar Proveedor'); ?>
<?php $__env->startSection('content'); ?>
<!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name', 'SMAPAC')); ?></a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">PROVEEDOR</a></li>
                                            <li class="breadcrumb-item active">EDITAR</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">INFORMACION DEL PROVEEDOR
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card-box text-center">
                                    <img src="<?php echo e(asset('assets/images/companies/'.$provider->provider_file)); ?>" class="rounded-circle avatar-xl img-thumbnail"
                                        alt="profile-image">

                                    <h4 class="mb-0"><?php echo e($provider->name); ?></h4>
                                    <?php if($provider->status <=0): ?>
                                    <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">ACTIVO</button>
                                    <?php else: ?>
                                    <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">INACTIVO</button>
                                    <?php endif; ?>
                                    <a href="<?php echo e(url()->previous()); ?>" type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light"><i class="mdi mdi-menu-left-outline"></i> REGRESAR</a>

                                    <div class="text-left mt-3">
                                        <h4 class="font-13 text-uppercase">Descripcion :</h4>
                                        <p class="text-muted font-13 mb-3"><?php echo e($provider->description); ?>.
                                        </p>
                                        <p class="text-muted mb-2 font-13"><strong>RFC :</strong> <span class="ml-2"><?php echo e($provider->rfc); ?></span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Telefono :</strong><span class="ml-2"><?php echo e($provider->phone); ?></span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Correo :</strong> <span class="ml-2 "><?php echo e($provider->email); ?></span></p>

                                        <p class="text-muted mb-1 font-13"><strong>Direccion :</strong> <span class="ml-2"><?php echo e($provider->address); ?></span></p>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->

                            <div class="col-lg-8 col-xl-8">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                            <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                                Cotizaciones
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                                Compras
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Actualizar
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane " id="aboutme">
                                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                                                Historial de cotizaciones</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th># No.Requisicion</th>
                                                            <th>Departamento</th>
                                                            <th>Fecha</th>
                                                            <th>Archivo</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $__currentLoopData = $cotizaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $cotizacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo e($cotizacion->requisition->folio); ?></td>
                                                                <td><?php echo e($cotizacion->department->name); ?></td>
                                                                <td><?php echo e($cotizacion->created_at->toFormattedDateString()); ?></td>
                                                            <!--    <td><span class="badge badge-info">Work in Progress</span></td> -->
                                                                <td><a href="<?php echo e(asset('requisitions/cotizadas/'.$cotizacion->quote_file  )); ?>" download class="action-icon"> <i class="mdi mdi-package-down"></i></a></td>
                                                            </tr>
                                                        </tbody>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </table>
                                            </div>

                                        </div> <!-- end tab-pane -->
                                        <!-- end about me section content -->

                                        <div class="tab-pane " id="timeline">
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-finance mr-1"></i>Historial de compras</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <thead id="compras" class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>No.Orden</th>
                                                            <th>No.Requisicion</th>
                                                            <th>Departamento</th>
                                                            <th>Status</th>
                                                            <th>Fecha de compra</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>App design and development</td>
                                                            <td>01/01/2015</td>
                                                            <td>10/15/2018</td>
                                                            <td><span class="badge badge-info">Work in Progress</span></td>
                                                            <td>Halette Boivin</td>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- end timeline content-->

                                        <div class="tab-pane show active" id="settings">
                                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i>Informacion</h5>
                                            <form action="<?php echo e(action('ProvidersController@update', $provider->id)); ?>" method="POST" class="form-group" enctype="multipart/form-data">
                                                <?php echo method_field('PUT'); ?>
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Nombre o razon social</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e(old('name') ?? $provider->name); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="rfc">RFC</label>
                                                            <input type="text" class="form-control" name="rfc" id="rfc"  value="<?php echo e(old('rfc') ?? $provider->rfc); ?>">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">Correo electronico</label>
                                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo e(old('email') ?? $provider->email); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phone">Telefono</label>
                                                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo e(old('phone') ?? $provider->phone); ?>">
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="description">Descripcion</label>
                                                            <textarea class="form-control" name="description" id="description" rows="3" > <?php echo e($provider->description); ?></textarea>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="address">Direccion</label>
                                                            <input type="text" class="form-control" name="address" id="address" value="<?php echo e(old('address') ?? $provider->address); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="website">Sitio Web</label>
                                                            <input type="text" class="form-control" name="website" id="website" value="<?php echo e(old('website') ?? $provider->website); ?>">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="address">Logotipo</label>
                                                            <input type="file" name="provider_file" data-plugins="dropify" data-default-file="<?php echo e(asset('assets/images/companies/'.$provider->provider_file)); ?>"  />
                                                            <p class="text-muted text-center mt-2 mb-0"><?php echo e(old('providers.png') ?? $provider->provider_file); ?></p>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->

                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                                        Actualizar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                                                    </button>
                                                    <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
                                                        Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end settings content-->

                                    </div> <!-- end tab-content -->
                                </div> <!-- end card-box-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/urm/resources/views/proveedores/edit.blade.php ENDPATH**/ ?>