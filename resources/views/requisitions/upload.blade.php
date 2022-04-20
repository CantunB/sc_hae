@extends('layouts.app')
@section('title','Subir Autorizacion')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">REQUISICIONES</a></li>
                    <li class="breadcrumb-item active">AUTORIZACIÓN</li>
                </ol>
            </div>
            <h4 class="page-title">AUTORIZACIÓN DE LA REQUISICIÓN</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style="text-transform:uppercase;" class="header-title"><strong> REQUISICIÓN No. {{$requisition->folio}}</strong></h1>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">

                        </div>
                    </div><!-- end col-->
                </div>
                <div class="container">

                    @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        <strong>
                            Adventencia:
                        </strong>
                        Debe completar los siguientes campos
                    </div>
                @endif
                <form id="form" action="{{route('requisiciones.file_upload',$requisition->id) }}" class="form-group" method="POST" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf
                <!--  <p class="sub-header">
                        Override your input files with style. Your so fresh input file — Default version.
                    </p>
                -->
                    <input  name="file_req" class="dropify @error('file_req') is-invalid @enderror" id="file_req" type="file"  required data-plugins="dropify" data-height="300" data-max-file-size="5M" />
                    <p class="text-muted text-center mt-2 mb-0">*El tamaño maximo de archivo son 5MB</p>
                    @error('file_req')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <br>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success waves-effect waves-light">
                            Subir Autorizacion<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                        </button>
                        <a  href="{{ url()->previous() }}" class="btn btn-danger waves-effect waves-light">
                            Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                        </a>
                    </div>
                </form>

                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
@push('scripts')
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Arrastre y suelte un archivo aquí o haga clic para elegir un archivo',
                'replace': 'Arrastra y suelta o haz clic para reemplazar',
                'remove':  'Eliminar',
                'error':   'Ooops, sucedió algo malo.'
            }
        });
    </script>
    <script>
        $('#form').parsley();
    </script>
@endpush

@endsection
