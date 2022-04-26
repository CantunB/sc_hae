<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">REQUISICIONES</a></li>
                    <li class="breadcrumb-item active">DETALLES</li>
                </ol>
            </div>
            <h4 class="page-title">REQUISICIÓN No.<?php echo e($requisition[0]->requisition->folio); ?></h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="text-sm-left">
                                <?php if( $requisition[0]->requisition->status <= 0): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_requisicion')): ?>
                                    <a class="btn btn-sm btn-soft-danger waves-effect waves-light mb-2"
                                       href="<?php echo e(route('requisiciones.reqpdf',$requisition[0]->id)); ?>"
                                       target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
                                        <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_requisicion')): ?>
                                        <a  class="btn btn-sm btn-info waves-effect waves-light mb-2"
                                            href="<?php echo e(route('requisiciones.upload',$requisition[0]->requisition_id)); ?>">
                                            <i class="fas fa-file-upload">
                                            </i> Subir Autorizacion</a>
                                    <?php endif; ?>
                                        
                                <?php elseif($requisition[0]->requisition->status >= 2): ?>
                                        <a class="btn btn-sm btn-danger waves-effect waves-light mb-2"
                                            href="<?php echo e(url()->previous()); ?>">
                                            Requisicion No Autorizada</a>
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right">
                            <a class="btn btn-sm btn-danger waves-effect waves-light mb-2" href="<?php echo e(url()->previous()); ?>">
                                                        <i class="fas fa-times-circle" ></i> Regresar</a>
                        </div>
                    </div>
                                    <div class="container">
                                        <?php $__currentLoopData = $requisition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="container"  style="margin-top:20px">
                                            <div class="row justify-content-end">
                                                <div class="col-sm-4">
                                                    <p class=""><strong>REQ. NO. <?php echo e($r->requisition->folio); ?></strong></p>
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-4">
                                                    <strong> <?php echo e(Carbon\Carbon::parse($r->requisition->added_on)->format('d/m/Y')); ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-8">
                                                <label>
                                                    <strong>DIRECCIÓN:  </strong><?php echo e($r->requisition->management); ?>


                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-8">
                                                <label>
                                                    <strong>COORDINACIÓN:  </strong><?php echo e($r->requisition->coordinations->name); ?>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-8">
                                                <label>
                                                    <strong>DEPARTAMENTO:  </strong><?php echo e($r->requisition->departments->name); ?>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-8">
                                                <label>
                                                    <strong>UNIDAD ADMINISTRATIVA:  </strong><?php echo e($r->requisition->administrative_unit); ?>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-12">
                                                <label>
                                                    <strong>
                                                        FECHA PARA REQUERIR MATERIAL:
                                                        <?php echo e(Carbon\Carbon::parse($r->requisition->required_on)->format('d/m/Y')); ?>

                                                    </strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-12">
                                                <label>
                                                    <strong>ASUNTO:  </strong><?php echo e($r->requisition->issue); ?>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-12">
                                                <strong>PROGRAMA:  </strong>
                                            </div>
                                        <div class="container col-sm-12 table-responsive table-sm">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th style="text-align: center "WIDTH="10"> <i>PARTIDA</i></th>
                                                    <th style="text-align: center "WIDTH="1"><i>CANTIDAD</i></th>
                                                    <th style="text-align: center "WIDTH="10"><i>UNIDAD</i></th>
                                                    <th style="text-align: center"><i>CONCEPTO</i></th>
                                                </tr>
                                                </thead>
                                                <?php $__currentLoopData = $requesteds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tbody>
                                                    <tr>
                                                        <td><?php echo e($req->requested->departure); ?></td>
                                                        <td><?php echo e($req->requested->quantity); ?></td>
                                                        <td><?php echo e($req->requested->unit); ?></td>
                                                        <td><?php echo e($req->requested->concept); ?></td>
                                                    </tr>
                                                    </tbody>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <thead>
                                                <th colspan="4">
                                                    <label> <strong>  Observaciones: </strong>
                                                        <?php echo e($r->requisition->remark); ?>

                                                    </label>
                                                </th>
                                                </thead>
                                            </table>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                    </div><!-- end col-->
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
    <!-- end row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/requisitions/show.blade.php ENDPATH**/ ?>