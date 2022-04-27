<?php $__env->startSection('content'); ?>
<!-- start page title -->
    <?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
    <?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('subtitle'); ?> <?php echo e(Request::path()); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('teme'); ?> Lista <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_departamentos')): ?>
                            <button type="button" class="btn btn-sm btn-success waves-effect waves-light mb-2 float-left" data-toggle="modal" data-target="#newModal">
                                Nuevo departamento
                            </button>
                            
                            <?php endif; ?></h6>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="departments-table" class="ui celled table data-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Slug</th>
                                <th>Accciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<?php echo $__env->make('departamentos.partials.new_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready( function () {
    $('#departments-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '<?php echo route('departamentos.index'); ?>',
        columns:[
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'slug', name: 'slug'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    } );
    } );
    </script>
    <script>
        $("#form_departamentos").submit(function(stay) {
            stay.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "<?php echo route('departamentos.store'); ?>",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    Swal.fire({
                        title: "Registro creado!",
                        text: response.data,
                        icon: "success",
                        timer: 5000
                    });
                    $('#form_departamentos')[0].reset();
                    $('#form_departamentos').parsley().destroy();
                    $('#departments-table').DataTable().ajax.reload();
                    $("#newModal").modal('hide');
                },
                error: function(response){
                    //console.log(response);
                    var errors = response.responseJSON;
                    errorsHtml = '<div id="errors-alert" class="container"><div class="alert alert-danger" role="alert"> ';
                    $.each(errors.errors,function (k,v) {
                    errorsHtml +='<ul> <li>'+ v + '</li></ul>';
                    });
                    errorsHtml += '</div></div>';
                    $('#errors').html(errorsHtml);
                }
            });
            stay.preventDefault();
        });
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
                        url: "/departamentos/" + id,
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
                                $('#departments-table').DataTable().ajax.reload();
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/departamentos/index.blade.php ENDPATH**/ ?>