@extends('layouts.app')
@section('content')
@component('layouts.partials.breadcrumb')
@slot('title') {{ config('app.name', 'H.A.E') }} @endslot
@slot('subtitle') COMPRAS @endslot
@slot('teme') AUTORIZAR @endslot
@endcomponent
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style="text-transform:uppercase;" class="header-title"><strong> Oden de compra No. {{ $purchaseorder->detail->order_folio }}</strong></h1>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <a href="{{ url()->previous() }}"
                                class="btn btn-sm btn-danger waves-effect waves-light mb-2">
                                <i class="mdi mdi-menu-left-outline"></i> Regresar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="card-body">
                                        <form  action="{{route('autorizadas.update', $purchaseorder->id)}}" class="form-group" method="POST"   enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                                <input type="file" name="order_file[]" data-plugins="dropify" data-height="300" multiple/>
                                                <input type="text" class="form-control" name="purchase_id"  hidden value="{{$purchaseorder->id}}">
                                                <input type="text" class="form-control" name="department_id" hidden value="{{$purchaseorder->department_id}}">
                                                <!--<input type="file" class="custom-file-input" name="order_file[]" id="order_file" multiple>
                                                <label class="custom-file-label" for="inputGroupFile01"></label>-->

                                                <div class="form-group col-md-12 table-responsive-md" id="table">
                                                    <table id="form-table"  class="table thead-light table-hover table-sm" style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th style="text-align: center;"> <i>ARCHIVOS</i></th>
                                                        </tr>
                                                        </thead class="field_wrapper">
                                                            <tbody>
                                                                <tr>
                                                                <td><div class="filename"></div></td>
                                                                </tr>
                                                            </tbody>
                                                        </thead>
                                                    </table>
                                                </div>

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
    </div> <!-- end col -->
</div>
@push('scripts')
<script type="application/javascript">
    $('input[type="file"]').change(function(e){
        var invoice_file = e.target.files[0].name;
        $('.custom-file-label').html(invoice_file);
    });

            $("input:file").change(function () {
    var filenames = '';
    for (var i = 0; i < this.files.length; i++) {
        filenames += '<li style="color: Dodgerblue; ">'+ '<span >'+ '<i class="fas fa-file-invoice-dollar fa-lg" ></i> ' + this.files[i].name + '</span>'+'</li>'+'<br>';
    }
    $(".filename").html('<ul>'+ filenames +'</ul>');});
</script>
<script>
    document.getElementById("file").onchange = function(e) {
        // Creamos el objeto de la clase FileReader
        let reader = new FileReader();

        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(e.target.files[0]);

        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function(){
            let preview = document.getElementById('preview'),
                image = document.createElement('img');

            image.src = reader.result;

            preview.innerHTML = '';
            preview.append(image);
        };
    }
    </script>
@endpush
@endsection
