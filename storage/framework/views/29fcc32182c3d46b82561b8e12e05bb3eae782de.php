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
                            <th style="text-align: center">Departamento</th>
                            <th style="text-align: center">No.Compras</th>
                            <th style="text-align: center">Opciones</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $purchase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="text-align: start"><strong><?php echo e($pur->department->name); ?></strong></td>
                                <td style="text-align: center"> <button type="button" class="btn btn-pill btn-sm btn-info    "><strong><?php echo e($counts[$key]); ?></strong></button></td>
                                <td style="text-align: center;width: 10px">
                                    <a title="Ver Facturas de compras"
                                    href="<?php echo e(route('facturas.list', $pur->department->id)); ?>"
                                    class="btn btn-outline-info">
                                        <i class="fas fa-list-ul"></i></a>
                                    </a>
                                </td>
                            </tr>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/compras/facturas/index.blade.php ENDPATH**/ ?>