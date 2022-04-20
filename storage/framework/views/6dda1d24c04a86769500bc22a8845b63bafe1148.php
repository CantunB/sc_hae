<?php $__env->startSection('title', 'Nueva Cotizacion'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        select{
            background:#fff0ff ;
            color:#4c110f;
            text-shadow:0 1px 0 rgba(0,0,0,0.5);
        }
        option:checked {
            
background-color: #00b0e8;
            color: #113049;
        }
    </style>
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Crear Permisos</h1>  -->
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="h3 m-0 font-weight-bold text-primary">Nueva Cotizacion
                </div>
                <div class="card-body">
                    <form action="<?php echo e(action('QuotesrequisitionsController@new')); ?>" method="POST" class="form-group">
                        <?php echo method_field('POST'); ?>
                        <?php echo $__env->make('cotizaciones.partials.form',
                        ['cotizacion' => new Smapac\Quotesrequisitions ,
                         'providers',
                        'requisition',
                        'btnText' => 'Guardar',
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Laravel\urm\resources\views/cotizaciones/new.blade.php ENDPATH**/ ?>