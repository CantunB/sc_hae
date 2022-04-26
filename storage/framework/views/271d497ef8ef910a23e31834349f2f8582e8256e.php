<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('layouts.partials.breadcrumb'); ?>
<?php $__env->slot('title'); ?> <?php echo e(config('app.name', 'H.A.E')); ?> <?php $__env->endSlot(); ?>
<?php $__env->slot('subtitle'); ?> requisicion <?php $__env->endSlot(); ?>
<?php $__env->slot('teme'); ?> solicitar <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
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
                <form id="form" method="POST" action="<?php echo e(route('request.store')); ?>">
                    <?php echo method_field('POST'); ?>
                    <?php echo $__env->make('requisitions.request.partials.form',
                    ['btnText'=>'Guardar',
                    'user']
                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 20; //Limitación de incremento de campos de entrada
            var addButton = $('.add_button'); //Agregar selector de botones
            var wrapper = $('.field_wrapper'); //Contenedor de campo de entrada
            var fieldHTML = '<tr>'+
                '<td><input type="number" min="0" name="departure[]" class="form-control depart" required></td>'+
                '<td><input type="number" min="0" name="quantity[]" class="form-control" required></td>'+
                '<td><input type="text" name="unit[]" class="form-control" required></td>'+
                '<td><textarea type="text" name="concept[]" class="form-control" required></textarea></td>'+
                '<td><button type="button" class="remove_button btn btn-danger btn-sm"><i class="fas fa-minus-circle"></td></tr>';

            var x = 1; //El contador de campo inicial es 1

            document.getElementById("cont").value = x;
            document.getElementById("departure").value = x;
            //Una vez que se hace clic en el botón Agregar

            $(addButton).click(function(){
                //Verifique el número máximo de campos de entrada
                if(x < maxField){
                    x++; //Contador de campo de incremento
                    $(wrapper).append(fieldHTML); //Agregar campo html
                    document.getElementById("cont").value = x;
                    document.getElementsByClassName("depart").value = x++;


                }
            });

            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent().parent().remove();
                x--;
                document.getElementById("cont").value = x;
                document.getElementsByClassName("depart").value = x--;

            });

        });

    </script>
    <script>
        $('#form').parsley();
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#coordinacion').on('change',function(e) {
                var coordinacion = e.target.value;
                $.ajax({
                    url:"<?php echo e(route('coordinaciones.getDepartments')); ?>",
                    type:"POST",
                    data: {
                        '_token': '<?php echo e(csrf_token()); ?>',
                        'coordinacion': coordinacion
                    },
                    success:function (data) {
                        $('#departamento').empty();
                        $.each(data.departments,function(i, val){
                            $('#departamento').append('<option value="'+data.departments[i].departments['id']+'">'+data.departments[i].departments['name']+'</option>');
                        })
                    },
                    error: function( error )
                    {
                        alert( error );
                    }
                })
            });
        });
    </script>
    <script>
        $("#required_on").flatpickr(
            {
                altInput:!0,
                altFormat:"F j, y",
                defaultDate:"today",
                locale: {
                    firstDayOfWeek: 1,
                    weekdays: {
                        shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                        longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    },
                    months: {
                        shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                        longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    },
                }
            });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/bernacantun/Documents/Proyectos/Laravel/sc_hae/resources/views/requisitions/request/create.blade.php ENDPATH**/ ?>