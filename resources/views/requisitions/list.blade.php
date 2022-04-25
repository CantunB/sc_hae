@extends('layouts.app')
@section('content')
@component('layouts.partials.breadcrumb')
@slot('title') {{ config('app.name', 'H.A.E') }} @endslot
@slot('subtitle') {{Request::path()}} @endslot
@slot('teme') Lista @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">

                            @can('create_requisicion')
                                <a href="{{ route('requisiciones.create') }}"
                                class="btn btn-sm btn-info waves-effect waves-light mb-2"><i class="fas fa-plus-square" ></i> Nueva requisición</a> &nbsp;&nbsp;&nbsp;
                            @endcan
                            <a href="{{ url()->previous() }}"
                                class="btn btn-sm btn-danger waves-effect waves-light mb-2"><i class="fas fa-times"></i> Regresar</a>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="list-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center; width:50px">No.Req.</th>
                                <th scope="col" style="text-align: center">Fecha para requerir</th>
                                <th scope="col" style="text-align: center">Departamento</th>
                                <th scope="col" style="text-align: center">Estado</th>
                                <th scope="col" style="text-align: center; width: 10px">Opciones</th>
                            </tr>
                            </thead>
                             @foreach($requisitions as $r)
                                <tbody>
                                <td style="text-align: center">{{ $r->requisition->folio}}</td>
                                <td style="text-align: center">{{ Carbon\Carbon::parse($r->requisition->required_on)->format('Y/m/d') }}</td>
                                <td style="text-align: center">{{ $r->requisition->departments->name}}</td>
                                <td style="text-align: center">
                                    @if( $r->requisition->status === 0)
                                        <span class="badge badge-secondary">Por autorizar</span>
                                    @elseif($r->requisition->status <= 1)
                                        <span class="badge badge-info">Autorizada</span>
                                    @elseif($r->requisition->status <= 2)
                                        <span class="badge badge-danger">No autorizada</span>
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    @can('update_requisicion')
                                        @if( $r->requisition->status <= 0)
                                            <a href="{{route('requisiciones.edit',$r->id)}}"
                                               title="Editar Requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="{{route('requisiciones.upload',$r->id)}}"
                                               title="Subir Firmada"
                                               class="action-icon">
                                                <i class="mdi mdi-file-upload"></i></a>
                                            </a>
                                        @elseif($r->requisition->status === 2)
                                            <a href="{{route('requisiciones.edit',$r->id)}}"
                                               title="Editar Requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                        @endif
                                    @endcan
                                    @can('read_requisicion')
                                        @if( $r->requisition->status <= 0)
                                                <a href="{{route('requisiciones.show',$r->id)}}"
                                                title="Ver requisicion"
                                                class="action-icon">
                                                    <i class="mdi mdi-monitor-eye"></i></a>
                                                </a>
                                        @elseif($r->requisition->status <= 1)
                                                <a href="{{route('requisiciones.authorized',$r->id)}}"
                                                class="action-icon">
                                                    <i  class="mdi mdi-monitor-eye"></i></a>
                                        @elseif($r->requisition->status <= 2)
                                                <a href="{{route('requisiciones.show',$r->id)}}"
                                                    class="action-icon">
                                                    <i class="mdi mdi-monitor-eye"></i></a>
                                        @endif
                                    @endcan
                                    @can('delete_requisicion')
                                    <a href="route('requisiciones.destroy')" class="action-icon" onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();">
                                            <i class="mdi mdi-trash-can"></i>
                                        </a>
                                        <form id="delete-form" action="{{ route('requisiciones.destroy', $r->requisition->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endcan
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
            $('#list-table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
            });
        } );
    </script>
@endpush
@endsection
