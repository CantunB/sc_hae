@extends('layouts.app')
@section('content')
    @component('layouts.partials.breadcrumb')
        @slot('title') {{ config('app.name', 'H.A.E') }} @endslot
        @slot('subtitle') proovedores @endslot
        @slot('teme') Lista @endslot
    @endcomponent
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                {{--  <div class="col-lg-8">
<!-- <form class="form-inline">
                        <div class="form-group">
                            <label for="inputPassword2" class="sr-only">Search</label>
                            <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="status-select" class="mr-2">Sort By</label>
                            <select class="custom-select" id="status-select">
                                <option>Select</option>
                                <option>Date</option>
                                <option selected>Name</option>
                                <option>Revenue</option>
                                <option>Employees</option>
                            </select>
                        </div>
                    </form> -->
                </div>  --}}
                <div class="col-lg-4">
                    <div class="text-lg-left mt-3 mt-lg-0">
                        @can('create_proveedores')
                        <button type="button" class="btn btn-sm btn-success waves-effect waves-light mb-2" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus mr-1"></i>Nuevo Proveedor</button>
                        @endcan
                    </div>
                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div><!-- end col-->
</div>
<!-- end row -->

<div class="row">
    @foreach($providers as $key => $u)
    <div class="col-lg-4">
        <div class="card-box bg-pattern">
            <div class="text-center">
                <img src="{{ asset('assets/images/companies/'.$u->provider_file) }}" alt="logo" class="avatar-xl rounded-circle mb-3">
                <h4 class="mb-1 font-20">{{ $u->name }}</h4>
                <p class="text-muted  font-14">{{ $u->rfc }}</p>
            </div>

            <p class="font-14 text-center text-muted">
               Direccion: {{ $u->address }}
            </p>
            <p class="font-14 text-center text-muted">
               Telefono: {{ $u->phone }}
            </p>
            <p class="font-24 text-center text-muted">
             <a href="{{ $u->website }}" target="_blank" rel="noopener noreferrer"><i class="mdi mdi-web"></i></a>
            </p>
            @can('update_proveedores')
            <div class="text-center">
                <a href="{{route('proveedores.edit',$u->id)}}" class="btn btn-sm btn-info">Detalles</a>
            </div>
            <div class="row mt-4 text-center">
                <div class="col-6">
                    <h5 class="font-weight-normal text-muted">No.Cotizaciones</h5>
                    <h4>{{ $u->CountCot($u->id)}}</h4>
                </div>
                <div class="col-6">
                    <h5 class="font-weight-normal text-muted">No.Compras</h5>
                    <h4>{{ $u->CountCom($u->id) }}</h4>
                </div>
            </div>
            @endcan
        </div> <!-- end card-box -->
    </div><!-- end col -->
    @endforeach
</div>
<!-- end row -->
@include('proveedores.partials.create')

@push('scripts')
<script>
        $('#form-create').parsley();
</script>
<script>
    $(document).ready(function () {
        var formulario = $("#form-create");
        $("#registrar").on("click", function () {
            var url = "{!! route('proveedores.store') !!}";
                $.ajax({
                type: "POST",
                url: url,
                data: formulario.serialize(),
                success: function (result) {
                    //alert('Documento Listo');
                    location.reload();
                }});
        });
    });
</script>
@endpush
@endsection
