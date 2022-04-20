<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">REQUISICIONES</a></li>
                    <li class="breadcrumb-item active">LISTA</li>
                </ol>
            </div>
            <h4 class="page-title"></h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-box"
                <h2 style="text-transform:uppercase;" class="header-title"><strong>Requisiciones Autorizadas</strong></h2>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="requi-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;">Folio</th>
                                <th scope="col" style="text-align: center;">Departamentos</th>
                                <th scope="col" style="text-align: center; width: 15px">Fecha de para requerir</th>
                                <th scope="col" style="text-align: center; width: 15px">Fecha de autorizacion</th>
                                <th scope="col" style="text-align: center; width: 10px">Opciones</th>
                            </tr>
                            </thead>
                        <tbody>
                        <?php $__currentLoopData = $requisitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="text-align: center"><strong><?php echo e($r->requisition->folio); ?></strong></td>
                                <td style="text-align: center"><strong><?php echo e($r->requisition->departments->name); ?></strong></td>
                                <td style="text-align: center"><strong><?php echo e($r->requisition->required_on); ?></strong></td>
                                <td style="text-align: center"><strong><?php echo e($r->requisition->updated_at); ?></strong></td>
                                <td style="text-align: center">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_requisicion')): ?>
                                        <?php if( $r->status <= 1): ?>
                                            <a href="<?php echo e(route('cotizaciones.edit',$r->id)); ?>"
                                               title="Cotizar Requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-archive-arrow-up"></i></a>
                                            </a>
                                        <!--  <?php elseif($r->status === 2): ?>
                                        <a href="<?php echo e(route('requisiciones.edit',$r->id)); ?>"
                                                           title="Editar Requisicion"
                                                           class="action-icon">
                                                            <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <?php endif; ?> -->
                                    <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_requisicion')): ?>
                                            <?php if( $r->status <= 1): ?>
                                                <a href="<?php echo e(route('requisiciones.authorized',$r->id)); ?>"
                                                   title="Ver requisicion"
                                                   class="action-icon">
                                                    <i class="mdi mdi-clipboard-file-outline"></i></a>
                                                </a>
                                            <?php elseif($r->status <= 2): ?>
                                                <a href="<?php echo e(route('requisiciones.show',$r->id)); ?>"
                                                   class="action-icon">
                                                    <i class="mdi mdi-monitor-eye"></i></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_requisicion')): ?>
                                        <a href="<?php echo e(route('requisiciones.deleteautorizacion',$r->requisition->id)); ?>" class="action-icon">
                                            <i class="mdi mdi-trash-can"></i> </a>
                                    <?php endif; ?>
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
            $('#requi-table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                columnDefs: [
                    { className: "folio", "targets": [ 0 ] },
                ]
            });
        } );
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/urm/resources/views/requisitions/autorizadas.blade.php ENDPATH**/ ?>