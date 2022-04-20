<?php $__env->startSection('title', 'Lista de compras'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Usuarios</h1> -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="h3 m-0 font-weight-bold text-primary"> <?php echo $__env->yieldContent('title', 'Lista'); ?>
                        <?php echo $__env->yieldContent('button'); ?>
                    
                </div>
                <div class="card-body">
                    <?php echo $__env->yieldContent('contenido'); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Laravel\urm\resources\views/layouts/index.blade.php ENDPATH**/ ?>