<?php $__env->startSection('title', 'Actualizar Departamento'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
        <?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('subtitle'); ?> dependencia <?php $__env->endSlot(); ?>
        <?php $__env->slot('teme'); ?> actualizar <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Crear Permisos</h1>  -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?php echo e(route('dependencias.update',$dependency->id )); ?>" method="POST" class="form-group">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="container">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="">Nombre</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name') ?: $dependency->name); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <p style="color:red">  <?php echo e($errors->first('name')); ?> </p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" class="form-control" value="<?php echo e(old('slug') ?: $dependency->slug); ?>">
                                    <?php if($errors->has('slug')): ?>
                                        <p style="color:red">  <?php echo e($errors->first('slug')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="">Direccion</label>
                                    <input type="text" name="address_dependency" class="form-control" value="<?php echo e(old('address_dependency') ?: $dependency->address_dependency); ?>">
                                    <?php if($errors->has('address_dependency')): ?>
                                        <p style="color:red">  <?php echo e($errors->first('address_dependency')); ?> </p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Colonia</label>
                                    <input type="text" name="colony_dependency" class="form-control" value="<?php echo e(old('colony_dependency') ?: $dependency->colony_dependency); ?>">
                                    <?php if($errors->has('colony_dependency')): ?>
                                        <p style="color:red">  <?php echo e($errors->first('colony_dependency')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="">Telefono</label>
                                    <input type="text" name="telephone_dependency" class="form-control" value="<?php echo e(old('telephone_dependency') ?: $dependency->telephone_dependency); ?>">
                                    <?php if($errors->has('telephone_dependency')): ?>
                                        <p style="color:red">  <?php echo e($errors->first('telephone_dependency')); ?> </p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Correo</label>
                                    <input type="text" name="email_dependency" class="form-control" value="<?php echo e(old('email_dependency') ?: $dependency->email_dependency); ?>">
                                    <?php if($errors->has('email_dependency')): ?>
                                        <p style="color:red">  <?php echo e($errors->first('email_dependency')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <h5>Lista de coordinaciones</h5>
                            <div class="form-group">
                                <ul class="list-unstyled">
                                    <?php $__empty_1 = true; $__currentLoopData = $coordinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li>
                                            <label>
                                                <input type="checkbox"
                                                    name="coordinations[]"
                                                    value="<?php echo e($val->id); ?>" <?php echo e($dependency->coordinations->pluck('id')->contains($val->id) ? 'checked' : 'disabled'); ?>

                                                > <?php echo e($val->name); ?>

                                                <em><strong>( <?php echo e($val->slug ?: 'N/A'); ?> )</strong></em>
                                            </label>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <h4><span class="badge badge-warning">No se han registrado coordinaciones</span></h4>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    Actualizar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                                </button>
                                <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
                                    Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                                </a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/areas/dependencias/edit.blade.php ENDPATH**/ ?>