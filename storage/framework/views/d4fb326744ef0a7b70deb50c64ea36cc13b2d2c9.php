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
                    <table id="requi_table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center; width: 15px">#</th>
                                <th scope="col" style="text-align: center; width: 15px"> Folio de requisiciones </th>
                                <th scope="col" style="text-align: center;">Fecha de registro</th>
                                <th scope="col" style="text-align: center;">Departamento</th>
                                <th scope="col" style="text-align: center;">Fecha para requerir</th>
                                <th scope="col" style="text-align: center;">Status</th>
                                <th scope="col" style="text-align: center; width: 10px">Opciones</th>
                            </tr>
                            </thead>
                            
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
            $('#requi_table').DataTable({
                processing: true,
                serverSide : true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '<?php echo route('request.index'); ?>',
            columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'requisition.folio', name: 'requisition.folio'},
                {data: 'added_on', name: 'added_on'},
                {data: 'department_id', name: 'department_id'},
                {data: 'required_on', name: 'required_on'},
                {data: 'status', name: 'status'},
                {data: 'options', name: 'options', orderable: false, searchable: false}
            ]
            });
        } );
    </script>
    <script>
        /** DESTROY UNIT*/
        function btnDelete(id) {
            Swal.fire({
                title: "Desea eliminar?",
                text: "Por favor asegúrese y luego confirme!",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "¡Sí, borrar!",
                cancelButtonText: "¡No, cancelar!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'DELETE',
                        url: "/requisiciones/request/" + id,
                        data: {
                            id: id,
                            _token: '<?php echo csrf_token(); ?>'
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            console.log(response);
                            if (response.success === true) {
                                Swal.fire({
                                    title: "Hecho!",
                                    text: response.message,
                                    icon: "success",
                                    confirmButtonText: "Hecho!",
                                });
                                $('#requi_table').DataTable().ajax.reload();
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: response.message,
                                    icon: "error",
                                    confirmButtonText: "Cancelar!",
                                });
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }
        /** DESTROY UNIT*/
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/requisitions/request/index.blade.php ENDPATH**/ ?>