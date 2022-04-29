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
    <?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
        <?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('subtitle'); ?> cotizaciones <?php $__env->endSlot(); ?>
        <?php $__env->slot('teme'); ?> nueva <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Crear Permisos</h1>  -->
            <div class="card shadow md-12">
                <div class="card-body justify-content-center align-items-center ">
                    <form action="<?php echo e(action('QuotesrequisitionsController@new')); ?>" method="POST" class="form-group" enctype="multipart/form-data">
                        <?php echo method_field('POST'); ?>
                        <?php echo $__env->make('cotizaciones.partials.form',
                        ['cotizacion' => new HAE\Quotesrequisitions ,
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

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/cotizaciones/new.blade.php ENDPATH**/ ?>