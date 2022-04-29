@extends('layouts.app')
@section('title','Requisicones')
@section('content')
<!-- start page title -->
    @component('layouts.partials.breadcrumb')
    @slot('title') {{ config('app.name', 'H.A.E') }} @endslot
    @slot('subtitle') requisiciones @endslot
    @slot('teme') Lista @endslot
    @endcomponent
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            @can('create_requisicion')
                            <a href="{{ route('request.create') }}"
                                class="btn btn-sm btn-success waves-effect waves-light mb-2 float-left"><i class="fas fa-plus-square" ></i> Nueva requisición</a>
                            @endcan
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="requi_table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center; width: 15px">#</th>
                                <th scope="col" style="text-align: center; width: 15px"> Folio de requisiciones </th>
                                <th scope="col" style="text-align: center;">Fecha de registro</th>
                                <th scope="col" style="text-align: center;">Departamento</th>
                                <th scope="col" style="text-align: center;">Fecha para requerir</th>
                                <th scope="col" style="text-align: center;">Status</th>
                                <th scope="col" style="text-align: center; width: 10px">Opciones</th>
                            </tr>
                            </thead>
                            {{--  @foreach($requisitions as $key => $r)
                                <tbody>
                                <td style="text-align: center"><strong>{{ $r->requisition->folio}}</strong></td>
                                <td style="text-align: center"><strong>{{ $r->requisition->added_on}}</strong></td>
                                <td style="text-align: center"><strong>{{ $r->requisition->departments->name}}</strong></td>
                                <td style="text-align: center"><strong>{{ $r->requisition->required_on}}</strong></td>
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
                                            <a href="{{route('request.edit',$r->id)}}"
                                               title="Editar Requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="{{route('requisiciones.upload',$r->requisition->id)}}"
                                               title="Subir Firmada"
                                               class="action-icon">
                                                <i class="mdi mdi-file-upload"></i></a>
                                            </a>
                                        @elseif($r->requisition->status === 2)
                                            <a href="{{route('request.edit',$r->id)}}"
                                               title="Editar Requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                        @endif
                                    @endcan
                                    @can('read_requisicion')
                                        @if( $r->requisition->status <= 0)
                                            <a href="{{route('request.show',$r->id)}}"
                                               title="Ver requisicion"
                                               class="action-icon">
                                                <i class="mdi mdi-monitor-eye"></i></a>
                                            </a>
                                        @elseif($r->requisition->status <= 1)
                                            <a href="{{route('authorized.show',$r->id)}}"
                                               class="action-icon">
                                                <i  class="mdi mdi-monitor-eye"></i></a>
                                        @elseif($r->requisition->status <= 2)
                                            <a href="{{route('request.show',$r->id)}}"
                                               class="action-icon">
                                                <i class="mdi mdi-monitor-eye"></i></a>
                                        @endif
                                    @endcan
                                    @can('delete_requisicion')
                                        <a href="{{route('request.destroy',$r->requisition->id)}}" class="action-icon" onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();">
                                            <i class="mdi mdi-trash-can"></i>
                                        </a>
                                        <form id="delete-form" action="{{ route('request.destroy', $r->requisition->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endcan
                                </td>
                                </tbody>
                            @endforeach  --}}
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
            $('#requi_table').DataTable({
                processing: true,
                serverSide : true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                ajax: '{!! route('request.index') !!}',
            columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'requisition.folio', name: 'requisition.folio'},
                {data: 'added_on', name: 'added_on'},
                {data: 'department_id', name: 'department_id'},
                {data: 'required_on', name: 'required_on'},
                {data: 'status', name: 'status'},
                {data: 'options', name: 'options', orderable: false, searchable: false}
            ]
            });
        } );
    </script>
    <script>
        /** DESTROY UNIT*/
        function btnDelete(id) {
            Swal.fire({
                title: "Desea eliminar?",
                text: "Por favor asegúrese y luego confirme!",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "¡Sí, borrar!",
                cancelButtonText: "¡No, cancelar!",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'DELETE',
                        url: "/requisiciones/request/" + id,
                        data: {
                            id: id,
                            _token: '{!! csrf_token() !!}'
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            console.log(response);
                            if (response.success === true) {
                                Swal.fire({
                                    title: "Hecho!",
                                    text: response.message,
                                    icon: "success",
                                    confirmButtonText: "Hecho!",
                                });
                                $('#requi_table').DataTable().ajax.reload();
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: response.message,
                                    icon: "error",
                                    confirmButtonText: "Cancelar!",
                                });
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }
        /** DESTROY UNIT*/
    </script>
@endpush
@endsection
