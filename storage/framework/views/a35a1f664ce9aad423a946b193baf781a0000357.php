<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name', 'SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">ORDENES</a></li>
                    <li class="breadcrumb-item active">AUTORIZADAS</li>
                </ol>
            </div>
            <h4 class="page-title">Archivos de Ordenes Autorizadas   <a class="btn btn-sm btn-danger waves-effect waves-light mb-2" href="<?php echo e(url()->previous()); ?>"><i class="mdi mdi-menu-left-outline" ></i> Regresar</a></h4>
        </div>
    </div>
</div>
<div class="row">
    <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4">
        <div class="card">
            <input type="file" class="dropify"  data-default-file="<?php echo e(asset('/ordenes/autorizadas/'. $purchase->order_file)); ?>" disabled="disabled" />
            <div class="card-body">
                <h5 class="card-title"><?php echo e($purchase->order->detail->order_folio); ?></h5>
                <p class="card-text">This is a wider card with supporting text below as a
                    natural lead-in to additional content. This content is a little bit
                    longer.</p>
                <p class="card-text">
                    <small class="text-muted"><?php echo e($purchase->created_at->diffForHumans()); ?></small> <a style="text-align: center"
                    href="<?php echo e(asset('ordenes/autorizadas/'.$purchase->order_file)); ?>" class="btn btn-ghost-success"  title="" target="_blank">
                    <i class="fas fa-download"></i> Descargar
                </a>
                </p>
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $('.dropify').dropify();
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/urm/resources/views/compras/autorizadas/show.blade.php ENDPATH**/ ?>