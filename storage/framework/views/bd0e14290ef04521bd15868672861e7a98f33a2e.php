<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
        <?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('subtitle'); ?> COTIZACIONES <?php $__env->endSlot(); ?>
        <?php $__env->slot('teme'); ?> Lista  <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <a href="<?php echo e(url()->previous()); ?>"
                                class="btn btn-sm btn-danger waves-effect waves-light mb-2">
                                <i class="mdi mdi-menu-left-outline"></i> Regresar</a>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="quotes-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th style="text-align: center">Folio de requisicion</th>
                            <th style="text-align: center">Fecha de cotizacion</th>
                            <th style="text-align: center">No.Cotizaciones</th>
                            <th style="text-align: center">Opciones</th>
                        </thead>
                        <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                            <td style="text-align: center"><?php echo e($q->requisition->folio); ?></td>
                            <td style="text-align: center"><?php echo e(\Carbon\Carbon::parse($q->requisition->created_at)->format('Y/m/d')); ?></td>
                            <td style="text-align: center">
                                <a href="#" class="badge badge-dark"><?php echo e($count[$key]); ?></a></td>
                            <td style="text-align: center">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_quotes')): ?>
                                    <a title="Ver cotizaciones" href="<?php echo e(route('cotizaciones.show',$q->requisition->id)); ?>"
                                    class="action-icon">
                                        <i style="center" class="mdi mdi-archive"></i></a>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_compras')): ?>
                                    <a title="Generar orden de compra" href="<?php echo e(route('ordenes.show', $q->requisition->id)); ?>"
                                    class="action-icon">
                                        <i  class="mdi mdi-clipboard-text-outline"></i></a>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#quotes-table').DataTable({
            });
        } );
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/cotizaciones/list.blade.php ENDPATH**/ ?>