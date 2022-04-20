@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">REQUISICIONES</a></li>
                    <li class="breadcrumb-item active">AUTORIZADAS</li>
                </ol>
            </div>
            <h4 class="page-title"></h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-primary">Archivos de Requisición Autorizada No.<label style="color: #0b2e13">
                    <strong>
                        {{$requisitions->requisition->folio}}
                    </strong>
                </label> <a href="{{ url()->previous() }}"
                    class="btn btn-sm btn-danger waves-effect waves-light mb-2 float-right"><i class="fas fa-times"></i> Regresar</a></h4>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                        </div>
                    </div><!-- end col-->
                </div>
             <!--   <p class="sub-header">
                    Override your input files with style. Your so fresh input file — Default version.
                </p> -->

                <input type="file" class="dropify" data-default-file="{{asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  ) }}"
                    disabled="disabled"/>
                <p class="text-muted text-center mt-2 mb-0">{{ $requisitions->requisition->file_req }}</p>
                <br>
                <br>
                <div class="col-md-6 offset-md-4">
                    @can('read_requisicion')
                    <a  href="{{asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  ) }}"
                        type="submit" class="btn btn-soft-primary waves-effect waves-light btn-descargar"  download>
                        Descargar<span class="btn-label-right"><i class="mdi mdi-download"></i></span>
                    </a>&nbsp;
                    <a  href="{{asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  ) }}" target="__blank"
                        class="btn btn-soft-primary waves-effect waves-light">
                        Ver<span class="btn-label-right"><i class="mdi mdi-file"></i></span>
                    </a>&nbsp;
                    @endcan
                    @can('create_quotes')

                    <a  href="{{route('cotizaciones.edit',$requisitions->requisition->id)}}"
                        type="submit" class="btn btn-primary waves-effect waves-light">
                        Cotizar<span class="btn-label-right"><i class="mdi mdi-truck-outline"></i></span>
                    </a>
                    @endcan
                </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div><!-- end col -->
</div>
@push('scripts')
    <script>
        $('.dropify').dropify();
    </script>
@endpush
@endsection
