@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">FACTURAS</a></li>
                    <li class="breadcrumb-item active">LISTA</li>
                </ol>
            </div>
            <h4 class="page-title">LISTA DE FACTURAS</h4>
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
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="facturas-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th style="text-align: center">Folio de orden de compra</th>
                            <th style="text-align: center">Fecha de autorizacion</th>
                            <th style="text-align: center">Tipo</th>
                            <th style="text-align: center">Estado</th>
                            <th style="text-align: center">Opciones</th>
                        </thead>
                        <tbody>
                            @foreach($purchaseorders as $key => $purchaseorder)
                                <td style="text-align: center">{{ $purchaseorder->purchaseinvoice->purchaseautorize->order->detail->order_folio }}</td>
                                <td style="text-align: center">{{ \Carbon\Carbon::parse($purchaseorder->created_at)->format('Y/m/d') }}</td>
                                <td style="text-align: center">{{ $purchaseorder->purchaseinvoice->type }}</td>
                                <td style="text-align: center">
                                  @if ($purchaseorder->purchaseinvoice->status  === 0 )
                                    <span class="badge badge-primary">Compra finalizada</span>
                                  @endif
                                </td>
                                <td style="text-align: center;width: 10px">
                                    @can('read_quotes')
                                        <a title="Ver Facturas"
                                        href="{{route('facturas.show',$purchaseorder->purchaseinvoice->purchaseautorize->id)}}"
                                        class="btn btn-ghost-info">
                                            <i class="fas fa-eye fa-md"></i></a>
                                    @endcan
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#facturas-table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            });
        } );
    </script>
@endpush

@endsection
