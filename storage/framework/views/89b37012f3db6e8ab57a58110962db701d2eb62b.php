<?php $__env->startSection('title','Requisicones'); ?>
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
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_requisicion')): ?>
                            <a href="<?php echo e(route('requisiciones.create')); ?>"
                                class="btn btn-sm btn-info waves-effect waves-light mb-2 float-right"><i class="fas fa-plus-square" ></i> Nueva requisición</a>
                            <?php endif; ?>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="requi-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center; width: 15px"> Folio de requisiciones </th>
                                <th scope="col" style="text-align: center;">Fecha de registro</th>
                                <th scope="col" style="text-align: center;">Departamento</th>
                                <th scope="col" style="text-align: center;">Fecha para requerir</th>
                                <th scope="col" style="text-align: center;">Status</th>
                                <th scope="col" style="text-align: center; width: 10px">Opciones</th>
                            </tr>
                            </thead>
                            <?php $__currentLoopData = $requisitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                <td style="text-align: center"><strong><?php echo e($r->requisition->folio); ?></strong></td>
                                <td style="text-align: center"><strong><?php echo e($r->requisition->added_on); ?></strong></td>
                                <td style="text-align: center"><strong><?php echo e($r->requisition->departments->name); ?></strong></td>
                                <td style="text-align: center"><strong><?php echo e($r->requisition->required_on); ?></strong></td>
                                <td style="text-align: center">
                                    <?php if( $r->requisition->status === 0): ?>
                                        <span class="badge badge-secondary">Por autorizar</span>
                                    <?php elseif($r->requisition->status <= 1): ?>
                                        <span class="badge badge-info">Autorizada</span>
                                    <?php elseif($r->requisition->status <= 2): ?>
                                        <span class="badge badge-danger">No autorizada</span>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_requisicion')): ?>
                                        <?php if( $r->requisition->status <= 0): ?>
                                            <a href="<?php echo e(route('requisiciones.edit',$r->id)); ?>"
                                               title="Editar Requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="<?php echo e(route('requisiciones.upload',$r->requisition->id)); ?>"
                                               title="Subir Firmada"
                                               class="action-icon">
                                                <i class="mdi mdi-file-upload"></i></a>
                                            </a>
                                        <?php elseif($r->requisition->status === 2): ?>
                                            <a href="<?php echo e(route('requisiciones.edit',$r->id)); ?>"
                                               title="Editar Requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_requisicion')): ?>
                                        <?php if( $r->requisition->status <= 0): ?>
                                            <a href="<?php echo e(route('requisiciones.show',$r->id)); ?>"
                                               title="Ver requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-monitor-eye"></i></a>
                                            </a>
                                        <?php elseif($r->requisition->status <= 1): ?>
                                            <a href="<?php echo e(route('requisiciones.authorized',$r->id)); ?>"
                                               class="action-icon">
                                                <i  class="mdi mdi-monitor-eye"></i></a>
                                        <?php elseif($r->requisition->status <= 2): ?>
                                            <a href="<?php echo e(route('requisiciones.show',$r->id)); ?>"
                                               class="action-icon">
                                                <i class="mdi mdi-monitor-eye"></i></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_requisicion')): ?>
                                        <a href="<?php echo e(route('requisiciones.destroy',$r->requisition->id)); ?>" class="action-icon" onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();">
                                            <i class="mdi mdi-trash-can"></i>
                                        </a>
                                        <form id="delete-form" action="<?php echo e(route('requisiciones.destroy', $r->requisition->id)); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>
                                    <?php endif; ?>
                                </td>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            });
        } );
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/urm/resources/views/requisitions/index.blade.php ENDPATH**/ ?>