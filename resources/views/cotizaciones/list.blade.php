@extends('layouts.app')
@section('content')
    @component('layouts.partials.breadcrumb')
        @slot('title') {{ config('app.name', 'H.A.E') }} @endslot
        @slot('subtitle') COTIZACIONES @endslot
        @slot('teme') Lista  @endslot
    @endcomponent
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
                    <table id="quotes-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th style="text-align: center">Folio de requisicion</th>
                            <th style="text-align: center">Fecha de cotizacion</th>
                            <th style="text-align: center">No.Cotizaciones</th>
                            <th style="text-align: center">Opciones</th>
                        </thead>
                        @foreach($quotes as $key => $q)
                            <tbody>
                            <td style="text-align: center">{{ $q->requisition->folio }}</td>
                            <td style="text-align: center">{{ \Carbon\Carbon::parse($q->requisition->created_at)->format('Y/m/d') }}</td>
                            <td style="text-align: center">
                                <a href="#" class="badge badge-dark">{{ $count[$key] }}</a></td>
                            <td style="text-align: center">
                                @can('read_quotes')
                                    <a title="Ver cotizaciones" href="{{route('cotizaciones.show',$q->requisition->id)}}"
                                    class="action-icon">
                                        <i style="center" class="mdi mdi-archive"></i></a>
                                    </a>
                                @endcan
                                @can('read_compras')
                                    <a title="Generar orden de compra" href="{{route('ordenes.show', $q->requisition->id)}}"
                                    class="action-icon">
                                        <i  class="mdi mdi-clipboard-text-outline"></i></a>
                                    </a>
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
            $('#quotes-table').DataTable({
            });
        } );
    </script>
@endpush
@endsection
