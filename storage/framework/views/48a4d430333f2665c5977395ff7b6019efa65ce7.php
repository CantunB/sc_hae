<?php $__env->startSection('title', 'Editar Coordinaciones'); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
        <?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('subtitle'); ?> coordinacion <?php $__env->endSlot(); ?>
        <?php $__env->slot('teme'); ?> actualizar <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="<?php echo e(action('CoordinationController@update', $coordination->id)); ?>" method="POST" class="form-group">
                                <?php echo method_field('PUT'); ?>
                                <?php echo $__env->make('coordinaciones.partials.form',
                                ['btnText' => 'Actualizar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

</div> <!-- container -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/coordinaciones/edit.blade.php ENDPATH**/ ?>