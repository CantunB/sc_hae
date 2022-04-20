<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">AREAS</a></li>
                    <li class="breadcrumb-item active">EDITAR</li>
                </ol>
            </div>
            <h4 class="page-title"></h4>
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
                <form action="<?php echo e(action('CoordinationController@updateareas',$area->id )); ?>" method="POST" class="form-group">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="container">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="">Coordinacion</label>
                                <input type="text" class="form-control" readonly value="<?php echo e($area->coordinations->name); ?>">
                                <?php if($errors->has('name')): ?>
                                    <p style="color:red">  <?php echo e($errors->first('name')); ?> </p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Departamento</label>
                                <input type="text" class="form-control" readonly value="<?php echo e($area->departments->name); ?>">
                                <?php if($errors->has('name')): ?>
                                    <p style="color:red">  <?php echo e($errors->first('name')); ?> </p>
                                <?php endif; ?>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Slug</label>
                                <input type="text" name="slug" class="form-control" value="<?php echo e($area->slug); ?>">
                                <?php if($errors->has('slug')): ?>
                                    <p style="color:red">  <?php echo e($errors->first('slug')); ?> </p>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                Actualizar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                            </button>
                            <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
                                Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                            </a>
                        </div>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
    <!-- end row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/urm/resources/views/coordinaciones/areasedit.blade.php ENDPATH**/ ?>