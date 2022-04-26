<?php $__env->startSection('title','Subir Autorizacion'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">REQUISICIONES</a></li>
                    <li class="breadcrumb-item active">AUTORIZACIÓN</li>
                </ol>
            </div>
            <h4 class="page-title">AUTORIZACIÓN DE LA REQUISICIÓN</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style="text-transform:uppercase;" class="header-title"><strong> REQUISICIÓN No. <?php echo e($requisition->folio); ?></strong></h1>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">

                        </div>
                    </div><!-- end col-->
                </div>
                <div class="container">

                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger text-center">
                        <strong>
                            Adventencia:
                        </strong>
                        Debe completar los siguientes campos
                    </div>
                <?php endif; ?>
                <form id="form" action="<?php echo e(route('requisiciones.file_upload',$requisition->id)); ?>" class="form-group" method="POST" enctype="multipart/form-data" >
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                <!--  <p class="sub-header">
                        Override your input files with style. Your so fresh input file — Default version.
                    </p>
                -->
                    <input  name="file_req" class="dropify <?php $__errorArgs = ['file_req'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="file_req" type="file"  required data-plugins="dropify" data-height="300" data-max-file-size="5M" />
                    <p class="text-muted text-center mt-2 mb-0">*El tamaño maximo de archivo son 5MB</p>
                    <?php $__errorArgs = ['file_req'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <br>
                    <br>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success waves-effect waves-light">
                            Subir Autorizacion<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                        </button>
                        <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
                            Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                        </a>
                    </div>
                </form>

                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Arrastre y suelte un archivo aquí o haga clic para elegir un archivo',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Eliminar',
                'error':   'Ooops, sucedió algo malo.'
            }
        });
    </script>
    <script>
        $('#form').parsley();
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/requisitions/upload.blade.php ENDPATH**/ ?>