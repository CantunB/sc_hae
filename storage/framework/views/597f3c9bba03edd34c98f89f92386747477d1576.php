<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name', 'SMAPAC')); ?></a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">COMPRAS</a></li>
                    <li class="breadcrumb-item active">FACTURAS</li>
                </ol>
            </div>
            <h4 class="page-title"></h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12 order-lg-1 order-2">
        <div class="card mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h2 style="text-transform:uppercase;" class="header-title"><strong>SUBIR FACTURAS DE LA ORDEN DE COMPRA <?php echo e($purchaseorder->order->detail->order_folio); ?></strong></h2>
            <!--             <form class="form-inline">
                            <div class="form-group">
                                <label for="inputPassword2" class="sr-only">Search</label>
                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                            </div>
                        </form>
                    -->
                    </div>
                    <div class="col-sm-4">
                        <div class="text-sm-right">
                            <a href="<?php echo e(url()->previous()); ?>"
                                class="btn btn-sm btn-danger waves-effect waves-light mb-2">
                                <i class="mdi mdi-menu-left-outline"></i> Regresar</a>
                        </div>
                    </div><!-- end col-->
                    <div class="col-md-12">
                        <br>
                    <form action="<?php echo e(route('facturas.update', $purchaseorder->id)); ?>" class="form-group" method="POST"  enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="type">Tipo de Factura(s)</label>
                                        <select required class="form-control" name="type">
                                            <option selected disabled value="">Seleccionar el tipo de factura</option>
                                            <option value="Completa">Completa</option>
                                            <option value="Parcialidades">Parcialidades</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="total_order">Total de orden de compra</label>
                                        <input class="form-control"id="total_order"disabled value="<?php echo e($purchaseorder->order->material->total_order); ?>">
                                        <input class="form-control" type="hidden" name="purchase_id" id="purchase_id"  value="<?php echo e($purchaseorder->id); ?>">
                                        <input class="form-control" type="hidden" name="department_id" id="department_id"  value="<?php echo e($purchaseorder->department_id); ?>">
                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Factura</th>
                                <th>Monto de Factura</th>
                                <th>Observacion</th>
                                <th><button type="button" class="add_button btn btn-sm btn-success"><i class="fas fa-plus-circle"></i></button></th>
                            </tr>
                            </thead>
                            <tbody class="field_wrapper">
                            <input class="form-control" type="text" name="cont" id="cont" hidden>
                            <tr>
                                <td>
                                    <div class="custom-file">
                                        <input required type="file" class="custom-file-input" id="invoice_file" name="invoice_file[]">
                                        <label class="custom-file-label" for="invoice_file">Elegir Archivo</label>
                                    </div>
                                </td>
                                <td><input type="text" id="amount-1" name="amount[]" class="form-control resta" required></td>
                                <td><input type="text" name="observation[]" class="form-control" required></td>

                                <td><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                Guardar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                            </button>
                            <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
                                Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                            </a>
                        </div>
                    </form>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
        <?php if(isset($purchasesinvoices)): ?>
            <?php $__currentLoopData = $purchasesinvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-box mb-2">
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <div class="media">
                                        <img class="d-flex align-self-center mr-3 rounded-circle" src="<?php echo e(asset('assets/images/companies/'.$invoice->purchaseautorize->order->detail->provider->provider_file)); ?>" alt="Generic placeholder image" height="64">
                                        <div class="media-body">
                                            <h4 class="mt-0 mb-2 font-16"><?php echo e($invoice->purchaseautorize->order->detail->provider->name); ?></h4>
                                            <p class="mb-1"><b>Direccion:</b><?php echo e($invoice->purchaseautorize->order->detail->provider->address); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="text-center my-3 my-sm-0">
                                        <p class="mb-0 text-muted"><b>Tipo:</b></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-center button-list">
                                        <div class="text-center my-3 my-sm-0">
                                            <p class="mb-0 text-muted"><b>Costo:</b></p>
                                        </div>
                                        <a  href="" target="__blank" class="btn btn-xs btn-primary waves-effect waves-light">Detalles</a>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="text-sm-right text-center mt-2 mt-sm-0">
                                        <a href="<?php echo e(asset('ordenes/facturas', $invoice->invoice_file )); ?>" download class="action-icon"> <i class="mdi mdi-package-down"></i></a>
                                    <!--     <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a> -->
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_quotes')): ?>
                                            <a href="javascript:void(0);"  data-toggle="modal" data-target="#delete" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </div> <!-- end col-->
                            </div> <!-- end row -->
                        </div> <!-- end card-box-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div> <!-- end col -->
</div>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        var contador = $('.resta').length + 1;
        var maxField = 20; //Limitación de incremento de campos de entrada
        var addButton = $('.add_button'); //Agregar selector de botones
        var wrapper = $('.field_wrapper'); //Contenedor de campo de entrada
        var fieldHTML = '<tr>'+
        '<td><div class="custom-file">'+'<input required type="file" class="custom-file-input" id="invoice_file" name="invoice_file[]">'+'<label class="custom-file-label" for="invoice_file">Elegir Archivo</label>'+'</div></td>'+
            '<td><input required type="text" id="amount-'+contador+'" name="amount[]" class="form-control resta"></td>'+
            '<td><input required type="text" name="observation[]" class="form-control"></td>'+
            '<td><button type="button" class="remove_button btn btn-danger btn-sm"><i class="fas fa-minus-circle"></td></tr>';

        var x = 1; //El contador de campo inicial es 1
        document.getElementById("cont").value = x;
        //Una vez que se hace clic en el botón Agregar

        $(addButton).click(function(){
            //Verifique el número máximo de campos de entrada
            if(x < maxField){
                x++; //Contador de campo de incremento
                $(wrapper).append(fieldHTML); //Agregar campo html
                document.getElementById("cont").value = x;
            }
        });
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent().parent().remove();
            x--;
            document.getElementById("cont").value = x;
        });

    });
</script>
<script>
    var valor_inicial = $('#total_order').val();
        
    $( document ).ready(function() {
        $('.resta').keyup(function () {
            var valor = parseFloat(valor_inicial);
            var valor_restar = 0;
            $('.resta').each(function () {
                if ($(this).val() > 0) {
                    valor_restar += parseFloat($(this).val());
                }
            });

            $('#total_order').val(valor - valor_restar);

        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Laravel\urm\resources\views/compras/facturas/edit.blade.php ENDPATH**/ ?>