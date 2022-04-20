<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">ORDENES DE COMPRAS</a></li>
                    <li class="breadcrumb-item active">LISTA</li>
                </ol>
            </div>
            <h4 class="page-title">Ordenes de Compras del Departamento</h4>
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
                            <a href="<?php echo e(url()->previous()); ?>"
                               class="btn btn-sm btn-danger waves-effect waves-light mb-2">
                                <i class="mdi mdi-menu-left-outline"></i> Regresar</a>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="compras-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th style="text-align: center">Orden de compra</th>
                            <th style="text-align: center">Fecha</th>
                            <th style="text-align: center">Estado</th>
                            <th>Observación</th>
                            <th style="text-align: center">Opciones</th>
                        </thead>
                        <?php $__currentLoopData = $purchaseorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $purchaseorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <td style="text-align: center"><?php echo e($purchaseorder->detail->order_folio); ?></td>
                                <td style="text-align: center"><?php echo e(\Carbon\Carbon::parse($purchaseorder->detail->created_at)->format('Y/m/d')); ?></td>
                                <td style="text-align: center">
                                <?php if($purchaseorder->purchaseorderid->status === 0): ?>
                                    <span class="badge badge-secondary">Por autorizar ...</span>
                                <?php elseif($purchaseorder->purchaseorderid->status <= 2): ?>
                                <span class="badge badge-info">Autorizada</span>
                                <?php elseif($purchaseorder->purchaseorderid->status === 3): ?>
                                <span class="badge badge-info">Autorizada</span>
                                   <!-- <button type="button" class="btn btn-pill btn-sm btn-success">Completo</button> -->
                                <?php endif; ?>
                                </td>
                                <td><?php echo e($purchaseorder->purchaseorderid->observation); ?></td>
                                <td style="text-align: center">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_compras')): ?>
                                                    <a title="Orden de Compra"
                                                        href="<?php echo e(route('ordenes.ordencompra',$purchaseorder->purchaseorderid->id)); ?>"
                                                        class="action-icon">
                                                        <i class="mdi mdi-monitor-eye"></i></a>
                                    <!---
                                                    <a title="Orden Autorizada"
                                                        href="<?php echo e(route('autorizadas.show',$purchaseorder->purchaseorderid->id)); ?>"
                                                        class="btn btn-ghost-info">
                                                        <i class="fas fa-eye fa-md"></i></a>
                                                    </a>
                                          -->
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_compras')): ?>
                                            <a class="action-icon"
                                               title="Eliminar Orden"
                                               onclick="event.preventDefault();
                                               document.getElementById('delete-form').submit();">
                                                <i class="mdi mdi-trash-can"></i></a>

                                            <form id="delete-form"
                                                  action="<?php echo e(route('ordenes.destroy',$purchaseorder->purchaseorderid->id)); ?>"
                                                  method="POST" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
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
            $('#compras-table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            });
        } );
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Laravel\urm\resources\views/compras/ordenes/list.blade.php ENDPATH**/ ?>