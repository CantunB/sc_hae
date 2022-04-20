@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">ORDENES</a></li>
                    <li class="breadcrumb-item active">AUTORIZADAS</li>
                </ol>
            </div>
            <h4 class="page-title">Archivos de Ordenes Autorizadas   <a class="btn btn-sm btn-danger waves-effect waves-light mb-2" href="{{ url()->previous() }}"><i class="mdi mdi-menu-left-outline" ></i> Regresar</a></h4>
        </div>
    </div>
</div>
<div class="row">
    @foreach($purchases as $purchase)
    <div class="col-md-4">
        <div class="card">
            <input type="file" class="dropify"  data-default-file="{{ asset('/ordenes/autorizadas/'. $purchase->order_file) }}" disabled="disabled" />
            <div class="card-body">
                <h5 class="card-title">{{ $purchase->order->detail->order_folio }}</h5>
                <p class="card-text">This is a wider card with supporting text below as a
                    natural lead-in to additional content. This content is a little bit
                    longer.</p>
                <p class="card-text">
                    <small class="text-muted">{{ $purchase->created_at->diffForHumans() }}</small> <a style="text-align: center"
                    href="{{ asset('ordenes/autorizadas/'.$purchase->order_file) }}" class="btn btn-ghost-success"  title="" target="_blank">
                    <i class="fas fa-download"></i> Descargar
                </a>
                </p>
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col -->
    @endforeach
</div>
@push('scripts')
    <script>
        $('.dropify').dropify();
    </script>
@endpush
@endsection
