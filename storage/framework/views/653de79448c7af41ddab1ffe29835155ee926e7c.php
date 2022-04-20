<?php $__env->startSection('content'); ?>
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name', 'SMAPAC')); ?></a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">PERMISOS</a></li>
                        <li class="breadcrumb-item active">LISTA</li>
                    </ol>
                </div>
                <h4 class="page-title">Lista de permisos</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="text-sm-right">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_permisos')): ?>
                                <a href="<?php echo e(route('permisos.create')); ?>"
                                    class="btn btn-sm btn-success disabled waves-effect waves-light mb-2 float-right">Crear permisos</a>
                                <?php endif; ?>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <table id="permisos-table" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Nombre</th>
                                    <th style="text-align: center">Correo</th>
                                    <th style="text-align: center">&nbsp;</th>
                                </tr>
                            </thead>
                        </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end page title -->

</div> <!-- container -->
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready( function () {
      $('#permisos-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '<?php echo route('permisos.index'); ?>',
        columns:[
            {data: 'NoEmpleado', name: 'NoEmpleado'},
            {data: 'name', name : 'name'},
           // {data: 'email', name : 'email'},
           // {data: 'created_at', name : 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false , width : "5%"}
        ]
      } );
    } );
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/urm/resources/views/permisos/index.blade.php ENDPATH**/ ?>