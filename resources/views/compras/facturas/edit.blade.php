@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'SMAPAC') }}</a></li>
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
                        <h2 style="text-transform:uppercase;" class="header-title"><strong>SUBIR FACTURAS DE LA ORDEN DE COMPRA {{ $purchaseorder->order->detail->order_folio }}</strong></h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-sm-right">
                            <a href="{{ url()->previous() }}"
                                class="btn btn-sm btn-danger waves-effect waves-light mb-2">
                                <i class="mdi mdi-menu-left-outline"></i> Regresar</a>
                        </div>
                    </div><!-- end col-->
                    <div class="col-md-12">
                        <br>
                    <form id="facturas_form" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="type">Tipo de Factura(s)</label>
                                        <select id="type" required class="form-control select2" name="type">
                                            <option selected disabled value="">Seleccionar el tipo de factura</option>
                                            <option value="Completa">Completa</option>
                                            <option value="Parcialidades">Parcialidades</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="total_order">Total de orden de compra</label>
                                        <input class="form-control"id="total_order_1"disabled value="{{ $purchaseorder->order->material->total_order }}">
                                        <input class="form-control" type="hidden" name="purchase_id" id="purchase_id"  value="{{ $purchaseorder->id }}">
                                        <input class="form-control" type="hidden" name="department_id"   value="{{ $purchaseorder->department_id}}">
                                        {{--  <input class="form-control" type="text" id="total_order"  value="{{ $purchaseorder->order->material->total_order }}">  --}}
                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Factura</th>
                                <th>Monto de Factura</th>
                                <th>Observacion</th>
                                <th><button id="add" type="button" class="add_button btn btn-sm btn-success"><i class="fas fa-plus-circle"></i></button></th>
                            </tr>
                            </thead>
                            <tbody class="field_wrapper">
                            <input class="form-control" type="text" name="cont" id="cont" hidden>
                            <tr>
                                <td>
                                    <div class="custom-file" style="width:250px;">
                                        <input required type="file" class="dropify" name="invoice_file[]" data-height="120" />

                                        {{--  <input required type="file" class="custom-file-input" id="invoice_file" name="invoice_file[]">  --}}
                                        {{--  <label class="custom-file-label" for="invoice_file">Elegir Archivo</label>  --}}
                                    </div>
                                </td>
                                <td><input type="text" id="amount-1" name="amount[]" class="form-control monto " onkeyup="sumar();" data-parsley-equalto="#total_order_1" required></td>
                                <td><input type="text" name="observation[]" class="form-control"></td>

                                <td><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></td>
                            </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan="4">
                                        <label class="float-right">TOTAL<br>
                                            <span class="form-control" id="total_invoices">$0.0</span>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                Guardar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                            </button>
                            <a  href="{{ url()->previous() }}" class="btn btn-danger waves-effect waves-light">
                                Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                            </a>
                        </div>
                    </form>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
        @isset($purchasesinvoices)
            @foreach ($purchasesinvoices as $key => $invoice)
                        <div class="card-box mb-2">
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <div class="media">
                                        <img class="d-flex align-self-center mr-3 rounded-circle" src="{{ asset('assets/images/companies/'.$invoice->purchaseautorize->order->detail->provider->provider_file) }}" alt="Generic placeholder image" height="64">
                                        <div class="media-body">
                                            <h4 class="mt-0 mb-2 font-16">{{ $invoice->purchaseautorize->order->detail->provider->name }}</h4>
                                            <p class="mb-1"><b>Direccion:</b>{{ $invoice->purchaseautorize->order->detail->provider->address }}</p>
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
                                        <a href="{{ asset('ordenes/facturas', $invoice->invoice_file )}}" download class="action-icon"> <i class="mdi mdi-package-down"></i></a>
                                    <!--     <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a> -->
                                        @can('delete_quotes')
                                            <a href="javascript:void(0);"  data-toggle="modal" data-target="#delete" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        @endcan
                                    </div>
                                </div> <!-- end col-->
                            </div> <!-- end row -->
                        </div> <!-- end card-box-->
                    @endforeach
        @endisset

    </div> <!-- end col -->
</div>
@push('scripts')
<script>
    var formulario = $('#facturas_form').parsley();
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
<script>
    $(document).ready(function() {
        $("#type").change(function(){
            if($(this).val() == "Completa"){
                console.info("%cTipo de factura completa", "color: blue; font-style: italic");
                var btn_add = document.getElementById('add').disabled = true;
                $('#facturas_form').parsley().reset();
                $("#facturas_form").on('submit', function(e){
                    e.preventDefault();
                    var form = $(this);
                    form.parsley().validate();
                    if (form.parsley().isValid()){
                        var formData = new FormData(this);
                        console.info("%c Form complete...sending", "color: green; font-style: italic");
                        var formData = new FormData(this);
                        $.ajax({
                            type: "POST",
                            url: '{{ route('facturas.update', $purchaseorder->id) }}',
                            data: formData,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            success: function(response){
                                console.log(response.data);
                                {{--  Swal.fire({
                                    title: "Registro creado!",
                                    text: response.data,
                                    icon: "success",
                                    timer: 3500
                                });
                                window.location = '/users' + id;  --}}
                            },
                            error: function(response){
                                console.log(response);
                                var errors = response.responseJSON;
                                errorsHtml = '<ul>';
                                $.each(errors.errors,function (k,v) {
                                errorsHtml += '<li>'+ v + '</li>';
                                });
                                errorsHtml += '</ul>';
                                Swal.fire({
                                    title: "Ooops!",
                                    html: errorsHtml,
                                    icon: "error",
                                    confirmButtonText: "Volver!",
                                });
                            }
                        });
                    }
                });
            }else{
                console.info("%cTipo de factura parcialidades", "color: blue; font-style: italic");
                var btn_add = document.getElementById('add').disabled = false;
                $('#facturas_form').parsley().reset();
                $('#amount-1').removeAttr('data-parsley-equalto');
                $('#amount-1').attr('data-parsley-max', {{ $purchaseorder->order->material->total_order }});

            }

            });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var contador = $('.resta').length + 1;
        var maxField = 20; //Limitación de incremento de campos de entrada
        var addButton = $('.add_button'); //Agregar selector de botones
        var wrapper = $('.field_wrapper'); //Contenedor de campo de entrada
        var fieldHTML = '<tr>'+
        '<td><div class="custom-file" style="width:250px;">'+
            '<input required type="file" class="dropify" name="invoice_file[]" id="invoice_file" data-height="120" />'+'</div></td>'+
            '<td><input required type="text" id="amount-'+contador+'" name="amount[]" class="form-control monto " onkeyup="sumar();"></td>'+
            '<td><input type="text" name="observation[]" class="form-control"></td>'+
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
{{--  <script>
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
</script>  --}}
<script>
    function sumar() {
        var total = 0;
        $(".monto").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            total += 0;
            } else {
            total += parseFloat($(this).val());
            }
        });
        document.getElementById('total_invoices').innerHTML = '$'+total;
    }

</script>
@endpush
@endsection
