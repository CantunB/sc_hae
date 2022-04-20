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
            <h4 class="page-title">LISTA ORDENES DE COMPRAS</h4>
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
                            @can('create_compras')
                                <a href="{{ route('ordenes.create') }}"
                                   class="btn btn-sm btn-info waves-effect waves-light mb-2"><i class="fas fa-plus-square" ></i> Generar Orden de compra</a> &nbsp;&nbsp;&nbsp;
                            @endcan
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="compras-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th style="text-align: center">Departamento</th>
                            <th style="text-align: center">No.Cotizaciones</th>
                            <th style="text-align: center">Opciones</th>
                        </thead>
                        @foreach($purchase as $key => $pur)
                        <tbody>
                            <td style="text-align: start"><strong>{{ $pur->purchasorder->department->name }}</strong></td>
                            <td style="text-align: center"> <button type="button" class="btn btn-pill btn-sm btn-info    "><strong>{{ $counts[$key] }}</strong></button></td>
                            <td style="text-align: center; width: 10px">
                                <a
                                    href="{{route('ordenes.list',$pur->purchasorder->department->id)}}"
                                    class="action-icon  btn btn-soft-info ">
                                    <i class="mdi mdi-currency-eth"></i></a>
                                </a>
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
