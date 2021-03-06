@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">COTIZACIONES</a></li>
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>
            <h4 class="page-title">FACTURAS DE LA COMPRA {{$purchasesinvoices[0]->purchaseautorize->order->detail->order_folio}}</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12 order-lg-1 order-2">
        <div class="card mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
            <!--             <form class="form-inline">
                            <div class="form-group">
                                <label for="inputPassword2" class="sr-only">Search</label>
                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                            </div>
                        </form>
                    -->
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                            <a href="{{ url()->previous() }}"
                                class="btn btn-sm btn-danger waves-effect waves-light mb-2">
                                <i class="mdi mdi-menu-left-outline"></i> Regresar</a>
                        </div>
                    </div><!-- end col-->
                    @if(!$purchasesinvoices[0]->type === 'Completa')
                    <div class="col-md-12">
                        <br>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Archivo</th>
                                <th>Monto Total</th>
                                <th>Observacion</th>
                                <th><button type="button" class="add_button btn btn-sm btn-success"><i class="fas fa-plus-circle"></i></button></th>
                            </tr>
                            </thead>
                            <tbody class="field_wrapper">
                            <input class="form-control" type="text" name="cont" id="cont" hidden>
                            <tr>
                                <td><input type="file" id="invoice_file[]" class="form-control-file" value="" autofocus>
                                <td><input type="text" name="unit[]" class="form-control" value="" ></td>
                                <td><input type="text" name="concept[]" class="form-control" value=""></td>
                                <td><input type="text" name="description[]" class="form-control" value=""></td>

                                <td><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                    @endif

                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
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
                            <p class="mb-0 text-muted"><b>Tipo:</b> {{ $invoice->type }}</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center button-list">
                            <div class="text-center my-3 my-sm-0">
                                <p class="mb-0 text-muted"><b>Costo:</b>{{ $invoice->total_purchase }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="text-sm-right text-center mt-2 mt-sm-0">
                            <a href="{{ asset('ordenes/facturas/'. $invoice->invoice_file )}}" target="_blank" class="action-icon"> <i class="mdi mdi-package-down"></i></a>
                             <a href="javascript:void(0);"
                                title="Eliminar Factura"
                                class="action-icon"
                                onclick="event.preventDefault();
                                document.getElementById('delete-form').submit();" > <i class="mdi mdi-trash-can-outline"></i></a>
                            <form id="delete-form"
                                  action="{{route('facturas.destroy',$invoice->id)}}"
                                  method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-box-->
        @endforeach
    </div> <!-- end col -->
</div>
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 20; //Limitaci??n de incremento de campos de entrada
        var addButton = $('.add_button'); //Agregar selector de botones
        var wrapper = $('.field_wrapper'); //Contenedor de campo de entrada
        var fieldHTML = '<tr>'+
            '<td><input type="file" name="invoice_file[]" class="form-control-file"></td>'+
            '<td><input type="text" name="unit[]" class="form-control"></td>'+
            '<td><input type="text" name="concept[]" class="form-control"></td>'+
            '<td><input type="text" name="description[]" class="form-control"></td>'+
            '<td><button type="button" class="remove_button btn btn-danger btn-sm"><i class="fas fa-minus-circle"></td></tr>';

        var x = 1; //El contador de campo inicial es 1
        document.getElementById("cont").value = x;
        //Una vez que se hace clic en el bot??n Agregar

        $(addButton).click(function(){
            //Verifique el n??mero m??ximo de campos de entrada
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
@endpush
@endsection
