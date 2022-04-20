<?php $__env->startSection('title', 'Crear Departamento'); ?>
<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">DEPARTAMENTOS</a></li>
                    <li class="breadcrumb-item active">CREAR </li>
                </ol>
            </div>
            <h4 class="page-title"> NUEVO DEPARTAMENTO</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <form action="<?php echo e(action('DepartmentController@store')); ?>" method="POST" class="form-group">
                        <?php echo method_field('POST'); ?>
                        <?php echo $__env->make('departamentos.partials.form',
                        ['department' => new Smapac\Department,
                        'btnText' => 'Guardar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
    <!-- end row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Laravel\urm\resources\views/departamentos/create.blade.php ENDPATH**/ ?>