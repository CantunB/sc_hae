<?php $__env->startSection('title','Requisicones'); ?>
<?php $__env->startSection('content'); ?>
<!-- start page title -->
    <?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
    <?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('subtitle'); ?> requisiciones <?php $__env->endSlot(); ?>
    <?php $__env->slot('teme'); ?> Lista <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_requisicion')): ?>
                            <a href="<?php echo e(route('request.create')); ?>"
                                class="btn btn-sm btn-success waves-effect waves-light mb-2 float-left"><i class="fas fa-plus-square" ></i> Nueva requisición</a>
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
                                            <a href="<?php echo e(route('request.edit',$r->id)); ?>"
                                               title="Editar Requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="<?php echo e(route('requisiciones.upload',$r->requisition->id)); ?>"
                                               title="Subir Firmada"
                                               class="action-icon">
                                                <i class="mdi mdi-file-upload"></i></a>
                                            </a>
                                        <?php elseif($r->requisition->status === 2): ?>
                                            <a href="<?php echo e(route('request.edit',$r->id)); ?>"
                                               title="Editar Requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read_requisicion')): ?>
                                        <?php if( $r->requisition->status <= 0): ?>
                                            <a href="<?php echo e(route('request.show',$r->id)); ?>"
                                               title="Ver requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-monitor-eye"></i></a>
                                            </a>
                                        <?php elseif($r->requisition->status <= 1): ?>
                                            <a href="<?php echo e(route('authorized.show',$r->id)); ?>"
                                               class="action-icon">
                                                <i  class="mdi mdi-monitor-eye"></i></a>
                                        <?php elseif($r->requisition->status <= 2): ?>
                                            <a href="<?php echo e(route('request.show',$r->id)); ?>"
                                               class="action-icon">
                                                <i class="mdi mdi-monitor-eye"></i></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_requisicion')): ?>
                                        <a href="<?php echo e(route('request.destroy',$r->requisition->id)); ?>" class="action-icon" onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();">
                                            <i class="mdi mdi-trash-can"></i>
                                        </a>
                                        <form id="delete-form" action="<?php echo e(route('request.destroy', $r->requisition->id)); ?>" method="POST" style="display: none;">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/requisitions/request/index.blade.php ENDPATH**/ ?>