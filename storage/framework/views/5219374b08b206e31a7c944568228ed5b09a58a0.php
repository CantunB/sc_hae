<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
        <?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('subtitle'); ?> <?php echo e(Request::path()); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('teme'); ?> Lista <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h2 style="text-transform:uppercase;" class="header-title"><strong>Relacion de coordinacion, departamentos</strong></h2>
                <p class="sub-header">
                <div class="form-group">
                    </p>
                </div>
                <div class="table-responsive">
                    <table id="coordinations-table"class="table dt-responsive table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Coordinacion</th>
                                <th scope="col">Departamento</th>
                                <th>Accciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
</div>

<?php $__env->startPush('scripts'); ?>
   <script>
        $(document).ready( function () {
      $('#coordinations-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '<?php echo route('areas.index'); ?>',
        columns:[
            {data: 'id', name: 'id'},
            {data: 'coordination_id', name: 'coordination_id'},
            {data: 'department_id', name: 'department_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
      } );
    } );
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/coordinaciones/areas.blade.php ENDPATH**/ ?>