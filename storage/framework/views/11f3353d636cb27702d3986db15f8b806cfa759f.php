<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
<?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
<?php $__env->slot('subtitle'); ?> requisicion <?php $__env->endSlot(); ?>
<?php $__env->slot('teme'); ?> autorizada <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
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
                <br>
                <iframe src="<?php echo e(asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  )); ?>" width="100%" height="500px">
                
                </iframe>
                
                <p class="text-muted text-center mt-2 mb-0"><?php echo e($requisitions->requisition->file_req); ?></p>
                <br>
                <br>
                <div class="col-md-6 offset-md-4">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_requisicion')): ?>
                    <a  href="<?php echo e(asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  )); ?>"
                        type="submit" class="btn btn-soft-primary waves-effect waves-light btn-descargar"  download>
                        Descargar<span class="btn-label-right"><i class="mdi mdi-download"></i></span>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/requisitions/authorized.blade.php ENDPATH**/ ?>