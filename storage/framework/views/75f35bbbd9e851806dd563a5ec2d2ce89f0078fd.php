<?php $__env->startSection('content'); ?>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo e(config('app.name','SMAPAC')); ?></a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">COTIZACIONES</a></li>
                        <li class="breadcrumb-item active">CREAR</li>
                    </ol>
                </div>
                <h4 class="page-title">Generar Orden de Compra</h4>
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
                            </div>
                            <div class="container">
                                <form id="form" method="POST" action="<?php echo e(route('ordenes.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('POST'); ?>
                                    <div class="container col-md-12">
                                            <div class="container">
                                                <div class="row justify-content-end">
                                                    <div class="col-xs-12 col-md-8">
                                                        <div class="form-group">
                                                            <label for=""><strong>ORDEN DE COMPRA</strong></label>
                                                            <div class="input-group" >
                                                                <input name="folio_or" id="folio_or" type="text" required class="form-control" value="SMAPAC-CAF/">
                                                                <select name="type_or" id="type_or" type="text" required class="form-control" >
                                                                    <option value="OC1">OC1</option>
                                                                    <option value="OC2">OC2</option>
                                                                </select>
                                                                <span class="input-group-addon">-</span>
                                                                <input name="count_or" id="count_or" type="number" required class="form-control" value="<?php echo e($compra); ?>">
                                                                <span class="input-group-addon">-</span>
                                                                <input name="date_or" id="date_or" type="text" required class="form-control" value="<?php echo e(date('Y')); ?>">

                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row justify-content-start">
                                                    <div class="col-xs-12 col-md-8">
                                                        <div class="form-inline">
                                                            <label  for=""><strong>ANÁLISIS DE PRECIO &nbsp;&nbsp;&nbsp;</strong>
                                                                <div class="checkbox checkbox-primary">
                                                                    <input id="chk_active" type="checkbox" onChange="activar(this);"><label for="chk_active">(Activar)</label>
                                                                </div></label>
                                                            <br>
                                                            <br>
                                                            <div class="input-group" >
                                                                <input  name="folio_analysis" id="folio_analysis" type="text"  class="form-control analysis" placeholder="SMAPAC-CAF/" style="display:none">
                                                                <input  name="type_anaylysis" id="type_anaylysis" type="text" class="form-control analysis" value="" style="display:none">
                                                                <span class="input-group-addon">-</span>
                                                                <input   name="count_analysis" id="count_analysis" type="number" class="form-control analysis" style="display:none" >
                                                                <input  name="date_analysis" id="date_analysis" type="text" class="form-control analysis" value="<?php echo e(date('Y')); ?>" style="display:none">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-start">
                                                <div class="col-md-6">
                                                    <label class="col-form-label">
                                                        <strong>Proveedor:
                                                            <select class="form-control col sel" id="prov1"  name="provider_id" required>
                                                                <option selected disabled>Selecciona un proveedor</option>
                                                                <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option data-rfc="<?php echo e($provider->rfc); ?>" value="<?php echo e($provider->id); ?>"><?php echo e($provider->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                    </label>
                                                </div>
                                                <div class="col-md-12 offset-8">
                                                    <label for="inputEmail3" class="col-form-label">RFC</label>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" id="prov_rfc" readonly >
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row justify-content-start">
                                                <div class="col-6">
                                                    <label>
                                                        <strong>Coordinacion:  </strong>
                                                    </label>
                                                    <select required class="form-control" id="coordinacion" name="coordination">
                                                        <option selected disabled>Selecciona una coordinación</option>
                                                        <?php $__currentLoopData = $coordinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $coordination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($coordination->id); ?>"><?php echo e($coordination->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 offset-2">
                                                    <label>
                                                        <strong>Unidad Administrativa:  </strong>
                                                    </label>
                                                    <input required name="unit_admnistrative" id="unit_administrative" class="form-control" value="">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row justify-content-start">
                                                <div class="col-md-6">
                                                    <label>
                                                        <strong>Departamento:  </strong>
                                                    </label>
                                                    <select required class="form-control" id="departamento" name="department">
                                                        <option selected disabled>Selecciona un departamento</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 offset-2">
                                                    <label>
                                                        <strong>No. De Requisición:  </strong>
                                                    </label>
                                                    <input class="form-control" type="text" name="requisition_id" id="requisition_id" value="">

                                                </div>
                                            </div>
                                            <br>
                                            <div class="row justify-content-start table-responsive-md">
                                                <table class="table table-hover table-sm"  style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        
                                                        <th style="width: 5%">Cantidad</th>
                                                        <th style="width: 15%">Unidad</th>
                                                        <th style="width: 35%">Concepto</th>
                                                        <th style="width: 20%">C.U</th>
                                                        <th style="width: 20%">Importe</th>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <td><input class="form-control nuevo" onblur="nuevo()" type="text" name="quantity" id="quantity"></td>
                                                    <td><input class="form-control" type="text" name="unit" id="unit"></td>
                                                    <td><textarea class="form-control" type="text" name="concept" id="concept" rows="2"></textarea></td>
                                                    <td><input class="form-control nuevo    " type="text" onblur="nuevo()"  name="unit_price" id="unit_price"></td>
                                                    <td><input class="form-control importe"  type="text" name="importe" id="importe"></td>
                                                    <td><button type="button"onclick="addRow();sumar();descuento();calculo_iva();" class="add_button btn btn-sm btn-success"><i class="fas fa-plus-circle"></i></button>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <div class="row justify-content-start">
                                                <div class="form-group col-md-12 table-responsive-md" id="table">
                                                    <table id="myTable" name="table" class="table table-hover table-sm" style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th style="text-align: center; width:5%"> <i>PARTIDA</i></th>
                                                            <th style="text-align: center; width:5%"><i>CANTIDAD</i></th>
                                                            <th style="text-align: center; width:15%"><i>UNIDAD</i></th>
                                                            <th style="text-align: center; width:35%"><i>CONCEPTO</i></th>
                                                            <th style="text-align: center; width: 20%"><i>C.U.</i></th>
                                                            <th style="text-align: center; width: 20%"><i>IMPORTE</i></th>
                                                        </tr>
                                                        </thead class="field_wrapper">
                                                        <tbody>
                                                            <tr></tr>
                                                        </tbody>
                                                        <thead>
                                                        <th colspan="6" style="width: 100%">
                                                            <div class="container">
                                                                <div class="row justify-content-end">
                                                                    <div class="col-xs-12 col-md-4">
                                                                        <table>
                                                                            <tr>
                                                                                <th>Importe</th>
                                                                                <th></th>
                                                                                <th>
                                                                                    <div id="sb">
                                                                                    <span onclick="descuento();"
                                                                                          id="spTotal">
                                                                                    </span>
                                                                                        <input class="form-control"
                                                                                               type="text"
                                                                                               name="imp_final" id="imp_final"
                                                                                               value="" hidden>
                                                                                        <input class="form-control"
                                                                                               type="text"
                                                                                               name="contador_mat" id="contador_mat"
                                                                                               value="" hidden>
                                                                                    </div>

                                                                                </th>
                                                                            </tr>

                                                                            <tr>
                                                                                <td>Desc</td>
                                                                                <td>
                                                                                    <input required class="form-control desc"
                                                                                           onblur="descuento();"
                                                                                           type="text"
                                                                                           name="desc" id="desc"
                                                                                           value="<?php echo e(old('desc')); ?>">
                                                                                </td>
                                                                                <td>
                                                                                    <input required class="form-control"  type="text"
                                                                                           name="val_desc" id="val_desc"
                                                                                           value="" >
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Sub-total</td>
                                                                                <td></td>
                                                                                <td>
                                                                                    <input required class="form-control"  type="text"
                                                                                           name="subtotal" id="subtotal"
                                                                                           value="">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>I.V.A</td>
                                                                                <td>
                                                                                    <input required class="form-control val_iva"
                                                                                           onblur="calculo_iva();" type="text"
                                                                                           name="iva" id="iva" value="" >
                                                                                </td>
                                                                                <td>
                                                                                    <input required class="form-control "
                                                                                           type="text"
                                                                                           name="Total_iva" id="Total_iva" value="" >
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Total</td>
                                                                                <td></td>
                                                                                <td>
                                                                                    <input required class="form-control "
                                                                                           type="text"
                                                                                           name="total" id="total" value="" >
                                                                                </td>
                                                                                <div class="container">
                                                                                    <div class="row justify-content-start">
                                                                                    </div>
                                                                                </div>
                                                                            </tr>

                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </th>
                                                        </thead>

                                                    </table>

                                                    <div class="col-12 col-md-8">
                                                        <table>
                                                            <tr>
                                                                <th>A) TIEMPO DE ENTREGA DEL BIEN O SERVICIO: </th>
                                                                <th></th>
                                                                <th>
                                                                    <input required class="form-control "
                                                                           type="text"
                                                                           name="entrega" id="entrega" value="" placeholder="Inmediato" >
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>B) MATERIAL EN EXISTENCIA: </th>
                                                                <th></th>
                                                                <th>
                                                                    <input required class="form-control "
                                                                           type="text"
                                                                           name="existencia" id="existencia" value="" placeholder="N/A" >
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>C) FORMA DE PAGO: </th>
                                                                <th></th>
                                                                <th>
                                                                    <input required class="form-control "
                                                                           type="text"
                                                                           name="forma_pago" id="forma_pago" value="" placeholder="Contado" >
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>D) VIGENCIA DEL(OS) PRECIO(S): </th>
                                                                <th></th>
                                                                <th>
                                                                    <input required class="form-control "
                                                                           type="text"
                                                                           name="vigencia" id="vigencia" value="" placeholder="15 Días" >
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>E) OTRAS: </th>
                                                                <th></th>
                                                                <th>
                                                                <textarea required class="form-control "
                                                                          type="text"
                                                                          name="otras" id="otras" value="" placeholder="N/A"></textarea>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Programa: </th>
                                                                <th></th>
                                                                <th>
                                                                <textarea required class="form-control "
                                                                          type="text"
                                                                          name="programa" id="programa" value=""></textarea>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Apliacion: </th>
                                                                <th></th>
                                                                <th>
                                                                <textarea required class="form-control "
                                                                          type="text"
                                                                          name="aplicacion" id="aplicacion" value=""></textarea>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>Vehículo: </th>
                                                                <th></th>
                                                                <th>
                                                                <textarea required class="form-control "
                                                                          type="text"
                                                                          name="vehiculo" id="vehiculo" value=""></textarea>
                                                                </th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                                            Generar Orden<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                                                        </button>
                                                        <a  href="<?php echo e(url()->previous()); ?>" class="btn btn-danger waves-effect waves-light">
                                                            Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                </form>
                            </div>
                        </div><!-- end col-->
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("myTable").deleteRow(i);
        }
    </script>
    <script>
        const $contenedor = $('.contenedor');
        const $selects = $contenedor.find('select');
        const $options = $contenedor.find('select option');

        const data = $options.toArray().reduce((obj, option) => (option.value && (obj[option.value] = obj[option.value] || option.selected), obj), {});

        function updateData() {
            Object.keys(data).forEach(value => data[value] = false);
            $selects.each((index, el) => (el.value !== "" && (data[el.value] = true)));
        };

        $contenedor.on('change', 'select', () => {
            updateData();
            $options.each((index, el) => (el.value !== "" && !el.selected && (el.disabled = data[el.value]), true));
        });
    </script>
    <script type="text/javascript">
        $('#prov1').on('change', function () {
            var rfc = $(this).children('option:selected').data('rfc');
            $('#prov_rfc').val(rfc);
        });

        $("input:file").change(function () {
            var filenames = '';
            for (var i = 0; i < this.files.length; i++) {
                filenames += '<li>' + this.files[i].name + '</li>';
            }
            $(".filename").html('<  ul>' + filenames +
                '<button type="button" value="Delete" onclick="deleteRow(this)" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle">' +' </ul>');
        });
    </script>
    <script>

        function addRow()
        {
            // get input valu
            idcantnuevo = document.getElementsByClassName("cantidad").length;
            longitud =  idcantnuevo;
            for (var i = 0; i <= longitud; i++) {
                var cantidadnueva = document.getElementsByName('quantity[]');
                cantidadnueva = cantidadnueva.length;
                var nuevoid = cantidadnueva;
                var departure = nuevoid+1;
            }

            // var valdep =  document.getElementById('departure').value;

            var valqua = document.getElementById('quantity').value;
            if(valqua  === ''){
                valqua += 0;
            }else{
                valqua;
            }
            var valunit = document.getElementById('unit').value;
            var valcon = document.getElementById('concept').value;
            var valupri = document.getElementById('unit_price').value;
            if(valupri === ''){
                valupri += 0;
            }else{
                valupri;
            }

            var valimp = document.getElementById('importe').value;



            var departure = '<input required type="number" min="0" value="'+departure+'" id="departure[]" name="departure[]" class="form-control">';
            var quantity = '<input required class="form-control cantidad"  type="text" onblur="cantidad();" name="quantity[]"  id="quantity'+nuevoid+'" value="'+valqua+'">';
            var unit = '<input required type="text" value="'+valunit+'" id="unit[]" name="unit[]" class="form-control">';
            var concept = '<textarea required type="text" id="concept[]" name="concept[]" class="form-control">'+valcon+'</textarea>';
            var unit_price = '<input required type="text" value="'+valupri+'" onblur="cantidad();" id="unit_price'+nuevoid+'" name="unit_price[]" class="form-control ">';
            var importe = '<input required type="text"  value="'+valimp+'"  id="importe'+nuevoid+'" name="importe[]" onblur="sumar();" class="form-control importe">';
            var button = '<button type="button" value="Delete" onclick="deleteRow(this)" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle">';
            // get the html table
            // 0 = the first table
            var table = document.getElementsByTagName('table')[1];

            // add new empty row to the table
            // 0 = in the top
            // table.rows.length = the end
            // table.rows.length/2+1 = the center
            var newRow = table.insertRow(table.rows.length);

            // add cells to the row
            var cel1 = newRow.insertCell(0);
            var cel2 = newRow.insertCell(1);
            var cel3 = newRow.insertCell(2);
            var cel4 = newRow.insertCell(3);
            var cel5 = newRow.insertCell(4);
            var cel6 = newRow.insertCell(5);
            var cel7 = newRow.insertCell(6);


            // add values to the cells
            cel1.innerHTML = departure;
            cel2.innerHTML = quantity;
            cel3.innerHTML = unit;
            cel4.innerHTML = concept;
            cel5.innerHTML = unit_price;
            cel6.innerHTML = importe;
            cel7.innerHTML = button;

            //clear inputs form
            // document.getElementById("departure").value = "";
            document.getElementById("quantity").value = "";
            document.getElementById("unit").value = "";
            document.getElementById("concept").value = "";
            document.getElementById("unit_price").value = "";
            document.getElementById("importe").value = "";

        }
    </script>
    <script>

        function cantidad(){
            var idcant = document.getElementsByClassName("cantidad").length;
            var longitud =  idcant;
            document.getElementById("contador_mat").value = longitud
            for (var i = 0; i < longitud; i++) {
                var cantidad = document.getElementById('quantity'+i).value;
                if(cantidad === ''){
                    var   cantidad = 0;
                }else{
                    var  cantidad = document.getElementById('quantity'+i).value;
                }
                var precio =  document.getElementById('unit_price'+i).value;
                if(precio === ''){
                    var precio = 0;
                }else {
                    var   precio =  document.getElementById('unit_price'+i).value;
                }
                var importe =  document.getElementById('importe'+i).value;
                if(importe === ''){
                    var  importe = 0;
                }else{
                    var importe = 0;
                }
                var suma  = cantidad * precio;
                if(suma === ''){
                    var  suma = 0;
                }else{
                    var   importe = document.getElementById('importe'+i).value = suma;
                }
            }
            return importe;
        }

        function nuevo(){
            idcantnuevo = document.getElementsByClassName("nuevo").length;
            if(isNaN(idcantnuevo)){
                idcantnuevo += 0;
            }else{
                var longitud =  idcantnuevo;
                for (var i = 0; i < longitud; i++) {
                    var cantidadnueva = document.getElementById('quantity').value;
                    var precionuevo = document.getElementById('unit_price').value;
                    var sumanueva  = cantidadnueva * precionuevo;
                    document.getElementById('importe').value = sumanueva;
                }
            }
        }

    </script>
    <script>
        /* Sumar dos números. */
        function sumar() {
            var total = 0;
            $(".importe").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                    total += 0;
                } else {
                    total += parseFloat($(this).val());
                }
                // document.getElementById('importe').value = total;

                document.getElementById('desc').value = 0;
                document.getElementById('val_desc').value = 0;
                document.getElementById('iva').value = 0;
                document.getElementById('Total_iva').value = 0;
                document.getElementById('imp_final').value = total;
                document.getElementById('spTotal').innerHTML = total;
                document.getElementById('subtotal').value = total;
                document.getElementById('total').value = total;
            });
            // alert(total);
        }
    </script>
    <script>
        //function descuento() {
        //  var descuento = document.getElementsByClassName("desc").length;
        //var des =  descuento;
        // console.log(des);
        ///for (var i = 0; i < longitud; i++) {}
        function descuento() {
            var desc = 0;
            $(".desc").each(function () {
                if (isNaN(parseFloat($(this).val()))) {
                    if(desc  === ''){
                        desc += 0;
                        var subtotal = $("#sb span").text();
                        document.getElementById('subtotal').value = subtotal;
                        document.getElementById('val_desc').value = desc;
                    }
                } else {
                    desc += parseFloat($(this).val());
                    var subtotal = $("#sb span").text();

                    //      alert(subtotal);
                    var descuento = (desc * subtotal) / 100;
                    document.getElementById('val_desc').value = descuento;
                    var total_descuento = subtotal - descuento;
                    document.getElementById('subtotal').value = total_descuento;
                    //console.log(descuento);
                }
            });
        }

        function calculo_iva() {
            var iva = 0;
            //     var total_iva = 0;
            $(".val_iva").each(function () {
                if (isNaN(parseFloat($(this).val()))) {
                    if(desc  === ''){
                        iva += 0;
                        var subt = document.getElementById('subtotal').value;
                        document.getElementById('Total_iva').value = subt;
                    }
                }else{
                    iva += parseFloat($(this).val());
                    var subt = document.getElementById('subtotal').value;
                    var total_iva = (subt * iva) / 100;
                    var totaliva = Number(subt) + Number(total_iva);
                    document.getElementById('Total_iva').value = total_iva;
                }
                document.getElementById('total').value = totaliva;

                //  alert(subt);
                //  console.log('Tengo un porcentaje de iva de '+iva+ ' y un subtotal de '+subt);
                //    console.log('Tengo un iva de '+ totaliva);
            });
        }
    </script>
    <script>
        function activar(chk)
        {
            if(chk.checked){
                document.getElementsByClassName("analysis")[0].style.display = "";
                document.getElementsByClassName("analysis")[1].style.display = "";
                document.getElementsByClassName("analysis")[2].style.display = "";
                document.getElementsByClassName("analysis")[3].style.display = "";
            }else{
                document.getElementsByClassName("analysis")[0].style.display = "none";
                document.getElementsByClassName("analysis")[1].style.display = "none";
                document.getElementsByClassName("analysis")[2].style.display = "none";
                document.getElementsByClassName("analysis")[3].style.display = "none";
            }
        }
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
        $('#form').parsley();
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Laravel\urm\resources\views/compras/ordenes/new.blade.php ENDPATH**/ ?>