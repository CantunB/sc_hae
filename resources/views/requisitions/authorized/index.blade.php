@extends('layouts.app')
@section('content')
@component('layouts.partials.breadcrumb')
@slot('title') {{ config('app.name', 'H.A.E') }} @endslot
@slot('subtitle') requisiciones @endslot
@slot('teme') autorizadas @endslot
@endcomponent
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
                    <table id="requi-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;">Folio</th>
                                <th scope="col" style="text-align: center;">Departamentos</th>
                                <th scope="col" style="text-align: center; width: 15px">Fecha de para requerir</th>
                                <th scope="col" style="text-align: center; width: 15px">Fecha de autorizacion</th>
                                <th scope="col" style="text-align: center; width: 10px">Opciones</th>
                            </tr>
                            </thead>
                        <tbody>
                        @foreach($requisitions as $key => $r)
                            <tr>
                                <td style="text-align: center"><strong>{{ $r->requisition->folio}}</strong></td>
                                <td style="text-align: center"><strong>{{ $r->requisition->departments->name}}</strong></td>
                                <td style="text-align: center"><strong>{{ \Carbon\Carbon::parse($r->requisition->required_on)->format('Y-m-d')}}</strong></td>
                                <td style="text-align: center"><strong>{{ \Carbon\Carbon::parse($r->requisition->updated_at)->format('Y-m-d')}}</strong></td>
                                <td style="text-align: center">
                                    @can('update_requisicion')
                                        @if( $r->status <= 1)
                                            <a href="{{route('cotizaciones.edit',$r->id)}}"
                                                title="Cotizar Requisicion"
                                                class="action-icon">
                                                <i class="mdi mdi-archive-arrow-up"></i></a>
                                            </a>
                                        @endif
                                    @endcan
                                        @can('read_requisicion')
                                            @if( $r->status <= 1)
                                                <a href="{{route('authorized.show',$r->id)}}"
                                                    title="Ver requisicion"
                                                    class="action-icon">
                                                    <i class="mdi mdi-clipboard-file-outline"></i></a>
                                                </a>
                                            @elseif($r->status <= 2)
                                                <a href="{{route('request.show',$r->id)}}"
                                                    class="action-icon">
                                                    <i class="mdi mdi-monitor-eye"></i></a>
                                            @endif
                                        @endcan
                                    @can('delete_requisicion')
                                        <a href="{{route('authorized.destroy',$r->requisition->id)}}" class="action-icon">
                                            <i class="mdi mdi-trash-can"></i> </a>
                                    @endcan
                                </td>
                            </tr>
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
            $('#requi-table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                columnDefs: [
                    { className: "folio", "targets": [ 0 ] },
                ]
            });
        } );
    </script>
@endpush
@endsection
