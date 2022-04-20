@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">ORDENES DE COMPRAS</a></li>
                    <li class="breadcrumb-item active">LISTA</li>
                </ol>
            </div>
            <h4 class="page-title">Ordenes de Compras del Departamento</h4>
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
                            <a href="{{ url()->previous() }}"
                               class="btn btn-sm btn-danger waves-effect waves-light mb-2">
                                <i class="mdi mdi-menu-left-outline"></i> Regresar</a>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="compras-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th style="text-align: center">Orden de compra</th>
                            <th style="text-align: center">Fecha</th>
                            <th style="text-align: center">Estado</th>
                            <th>Observación</th>
                            <th style="text-align: center">Opciones</th>
                        </thead>
                        @foreach($purchaseorders as $key => $purchaseorder)
                            <tbody>
                                <td style="text-align: center">{{ $purchaseorder->detail->order_folio}}</td>
                                <td style="text-align: center">{{ \Carbon\Carbon::parse($purchaseorder->detail->created_at)->format('Y/m/d') }}</td>
                                <td style="text-align: center">
                                @if ($purchaseorder->purchaseorderid->status === 0)
                                    <span class="badge badge-secondary">Por autorizar ...</span>
                                @elseif ($purchaseorder->purchaseorderid->status <= 2)
                                <span class="badge badge-info">Autorizada</span>
                                @elseif ($purchaseorder->purchaseorderid->status === 3)
                                <span class="badge badge-info">Autorizada</span>
                                   <!-- <button type="button" class="btn btn-pill btn-sm btn-success">Completo</button> -->
                                @endif
                                </td>
                                <td>{{$purchaseorder->purchaseorderid->observation}}</td>
                                <td style="text-align: center">
                                    @can('read_compras')
                                                    <a title="Orden de Compra"
                                                        href="{{route('ordenes.ordencompra',$purchaseorder->purchaseorderid->id)}}"
                                                        class="action-icon">
                                                        <i class="mdi mdi-monitor-eye"></i></a>
                                    <!---
                                                    <a title="Orden Autorizada"
                                                        href="{{route('autorizadas.show',$purchaseorder->purchaseorderid->id)}}"
                                                        class="btn btn-ghost-info">
                                                        <i class="fas fa-eye fa-md"></i></a>
                                                    </a>
                                          -->
                                    @endcan
                                    @can('delete_compras')
                                            <a class="action-icon"
                                               title="Eliminar Orden"
                                               onclick="event.preventDefault();
                                               document.getElementById('delete-form').submit();">
                                                <i class="mdi mdi-trash-can"></i></a>

                                            <form id="delete-form"
                                                  action="{{route('ordenes.destroy',$purchaseorder->purchaseorderid->id)}}"
                                                  method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
            $('#compras-table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            });
        } );
    </script>
@endpush
@endsection
