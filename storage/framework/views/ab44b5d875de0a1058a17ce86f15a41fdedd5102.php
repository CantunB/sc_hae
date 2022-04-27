<?php $__env->startSection('title', 'Actualizar Departamento'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
        <?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('subtitle'); ?> departamentos <?php $__env->endSlot(); ?>
        <?php $__env->slot('teme'); ?> Lista <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Crear Permisos</h1>  -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?php echo e(route('departamentos.update',$department->id )); ?>" method="POST" class="form-group">
                        <?php echo method_field('PUT'); ?>
                        <?php echo $__env->make('departamentos.partials.form',
                        ['department',
                        'btnText' => 'Guardar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/departamentos/edit.blade.php ENDPATH**/ ?>