@extends('layouts.app')
@section('content')
@component('layouts.partials.breadcrumb')
@slot('title') {{ config('app.name', 'H.A.E') }} @endslot
@slot('subtitle') requisicion @endslot
@slot('teme') autorizada @endslot
@endcomponent
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-primary">Archivos de Requisición Autorizada No.<label style="color: #0b2e13">
                    <strong>
                        {{$requisitions->requisition->folio}}
                    </strong>
                </label> <a href="{{ url()->previous() }}"
                    class="btn btn-sm btn-secondary waves-effect waves-light mb-2 float-right"><i class="mdi mdi-chevron-left"></i> Regresar</a></h4>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                        </div>
                    </div><!-- end col-->
                </div>
             <!--   <p class="sub-header">
                    Override your input files with style. Your so fresh input file — Default version.
                </p> -->
                <br>
                <iframe src="{{asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  ) }}" width="100%" height="500px">
                {{-- <iframe src="{{asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  ) }}#toolbar=0" width="100%" height="500px"> --}}
                </iframe>
                {{-- <input type="file" class="dropify" data-default-file="{{asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  ) }}"
                    disabled="disabled"/> --}}
                <p class="text-muted text-center mt-2 mb-0">{{ $requisitions->requisition->file_req }}</p>
                <br>
                <br>
                <div class="col-md-6 offset-md-4">
                    @can('read_requisicion')
                    <a  href="{{asset('requisitions/autorizadas/'.$requisitions->requisition->file_req  ) }}"
                        type="submit" class="btn btn-soft-primary waves-effect waves-light btn-descargar"  download>
                        Descargar<span class="btn-label-right"><i class="mdi mdi-download"></i></span>
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
