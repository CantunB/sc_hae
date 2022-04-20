<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">REQUISICIONES</a></li>
                    <li class="breadcrumb-item active">AUTORIZADAS</li>
                </ol>
            </div>
            <h4 class="page-title"></h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-primary">Archivos de Requisición Autorizada No.<label style="color: #0b2e13">
                    <strong>
                        <?php echo e($requisitions->requisition->folio); ?>

                    </strong>
                </label> <a href="<?php echo e(url()->previous()); ?>"
                    class="btn btn-sm btn-danger waves-effect waves-light mb-2 float-right"><i class="fas fa-times"></i> Regresar</a></h4>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                        </div>
                    </div><!-- end col-->
                </div>
             <!--   <p class="sub-header">
                    Override your input files with style. Your so fresh input file — Default version.
                </p> -->

                <input type="file" class="dropify" data-default-file="<?php echo e(asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  )); ?>"
                    disabled="disabled"/>
                <p class="text-muted text-center mt-2 mb-0"><?php echo e($requisitions->requisition->file_req); ?></p>
                <br>
                <br>
                <div class="col-md-6 offset-md-4">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_requisicion')): ?>
                    <a  href="<?php echo e(asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  )); ?>"
                        type="submit" class="btn btn-soft-primary waves-effect waves-light btn-descargar"  download>
                        Descargar<span class="btn-label-right"><i class="mdi mdi-download"></i></span>
                    </a>&nbsp;
                    <a  href="<?php echo e(asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  )); ?>" target="__blank"
                        class="btn btn-soft-primary waves-effect waves-light">
                        Ver<span class="btn-label-right"><i class="mdi mdi-file"></i></span>
                    </a>&nbsp;
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_quotes')): ?>

                    <a  href="<?php echo e(route('cotizaciones.edit',$requisitions->requisition->id)); ?>"
                        type="submit" class="btn btn-primary waves-effect waves-light">
                        Cotizar<span class="btn-label-right"><i class="mdi mdi-truck-outline"></i></span>
                    </a>
                    <?php endif; ?>
                </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div><!-- end col -->
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $('.dropify').dropify();
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Laravel\urm\resources\views/requisitions/authorized.blade.php ENDPATH**/ ?>