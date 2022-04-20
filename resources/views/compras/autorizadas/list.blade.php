@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">ORDENES AUTORIZADAS</a></li>
                    <li class="breadcrumb-item active">LISTA</li>
                </ol>
            </div>
            <h4 class="page-title">LISTA ORDENES DE COMPRAS AUTORIZADAS</h4>
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
                    <table id="compras-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th style="text-align: center">Folio de orden de compra</th>
                            <th style="text-align: center">Fecha de autorizacion</th>
                            <th style="text-align: center">Estado</th>
                            <th style="text-align: center">Opciones</th>
                            </thead>

                            @foreach($purchaseorders as $key => $purchaseorder)
                                <tbody>
                                <td style="text-align: center">{{ $purchaseorder->order->detail->order_folio}}</td>
                                <td style="text-align: center">
                {{--                    {{$purchaseorder->order->purchase[0]->created_at}}--}}
                                    {{ \Carbon\Carbon::parse($purchaseorder->order->created_at)->format('Y/m/d') }}
                                </td>
                                <td style="text-align:center">
                                  @if ($purchaseorder->order->purchase[$key]->status === 0 )
                                    <span class="badge badge-info">En espera de factura(s)...</span>
                                  @elseif ($purchaseorder->order->purchase[$key]->status === 1 )
                                    <span class="badge badge-primary">Compra finalizada</span>
                                  @endif
                                </td>
                                <td style="text-align: center">
                                    @if ($purchaseorder->order->purchase[$key]->status === 0 )
                                    @can('read_compras')
                                            <a title="Ver Autorizacion"
                                            href="{{route('autorizadas.show',$purchaseorder->order->id)}}"
                                            class="action-icon">
                                                <i class="mdi mdi-clipboard-file-outline"></i></a>
                                    @endcan
                                    @can('update_compras')
                                        <a title="Subir Factura"
                                           href="{{route('facturas.edit',$purchaseorder->order->purchase[$key]->id)}}"
                                            class="action-icon">
                                            <i class="mdi mdi-clipboard-pulse-outline"></i></a>
                                    @endcan
                                    @can('delete_compras')
                                        <a href="{{route('autorizadas.deleteautorizacion',$purchaseorder->order->purchase[$key]->purchase_order_id)}}"
                                           onclick="event.preventDefault();
                                           document.getElementById('delete-form').submit();"
                                           class="action-icon"
                                            title="Eliminar Orden Autorizada">
                                            <i class="mdi mdi-trash-can"></i>
                                        </a>
                                            <form id="delete-form"
                                                  action="{{route('autorizadas.deleteautorizacion',$purchaseorder->order->purchase[$key]->purchase_order_id)}}"
                                                  method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                    @endcan

                                    @endif
                                </td>
                                </tbody>
                              @endforeach
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
            $('#compras-table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            });
        } );
    </script>
@endpush
@endsection
