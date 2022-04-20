<?php $__env->startSection('title', 'Editar Coordinaciones'); ?>
<?php $__env->startSection('content'); ?>
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name', 'SMAPAC')); ?></a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">COORDINACIONES</a></li>
                        <li class="breadcrumb-item active">EDITAR</li>
                    </ol>
                </div>
                <h4 class="page-title">Editar Coordinacion</h4>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/urm/resources/views/coordinaciones/edit.blade.php ENDPATH**/ ?>