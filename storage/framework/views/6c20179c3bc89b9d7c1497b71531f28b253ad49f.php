<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">FACTURAS</a></li>
                    <li class="breadcrumb-item active">LISTA</li>
                </ol>
            </div>
            <h4 class="page-title">LISTA DE FACTURAS</h4>
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
                <div class="table-responsive">
                    <table id="facturas-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th style="text-align: center">Folio de orden de compra</th>
                            <th style="text-align: center">Fecha de autorizacion</th>
                            <th style="text-align: center">Tipo</th>
                            <th style="text-align: center">Estado</th>
                            <th style="text-align: center">Opciones</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $purchaseorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $purchaseorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td style="text-align: center"><?php echo e($purchaseorder->purchaseinvoice->purchaseautorize->order->detail->order_folio); ?></td>
                                <td style="text-align: center"><?php echo e(\Carbon\Carbon::parse($purchaseorder->created_at)->format('Y/m/d')); ?></td>
                                <td style="text-align: center"><?php echo e($purchaseorder->purchaseinvoice->type); ?></td>
                                <td style="text-align: center">
                                  <?php if($purchaseorder->purchaseinvoice->status  === 0 ): ?>
                                    <span class="badge badge-primary">Compra finalizada</span>
                                  <?php endif; ?>
                                </td>
                                <td style="text-align: center;width: 10px">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_quotes')): ?>
                                        <a title="Ver Facturas"
                                        href="<?php echo e(route('facturas.show',$purchaseorder->purchaseinvoice->purchaseautorize->id)); ?>"
                                        class="btn btn-ghost-info">
                                            <i class="fas fa-eye fa-md"></i></a>
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
            $('#facturas-table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            });
        } );
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Laravel\urm\resources\views/compras/facturas/list.blade.php ENDPATH**/ ?>