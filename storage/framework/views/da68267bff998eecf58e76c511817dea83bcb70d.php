<?php $__env->startSection('content'); ?>
<!-- start page title -->
<?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
<?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
<?php $__env->slot('subtitle'); ?> dependencias <?php $__env->endSlot(); ?>
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
                            
                            <button type="button" class="btn btn-sm btn-success waves-effect waves-light mb-2 float-left" data-toggle="modal" data-target="#newModal">
                                Nueva dependencia
                            </button>
                            
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="dependency-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th>Accciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
    <!-- end row -->
<?php echo $__env->make('areas.dependencias.partials.new_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready( function () {
            $('#dependency-table').DataTable( {
                processing: true,
                serverSide : true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '<?php echo route('dependencias.index'); ?>',
                columns:[
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'fullname', name: 'fullname'},
                    {data: 'options', name: 'options', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    <script>
        $("#form_dependency").submit(function(stay) {
            stay.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "<?php echo route('dependencias.store'); ?>",
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
                    $('#form_dependency')[0].reset();
                    $('#form_dependency').parsley().destroy();
                    $('#dependency-table').DataTable().ajax.reload();
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
    
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/areas/dependencias/index.blade.php ENDPATH**/ ?>