@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">ROLES</a></li>
                    <li class="breadcrumb-item active">LISTA</li>
                </ol>
            </div>
            <h4 class="page-title"></h4>
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
                            @can('create_roles')
                            <a href="{{ route('roles.create') }}"
                                class="btn btn-sm btn-success waves-effect waves-light mb-2 float-left">Crear nuevo rol</a>
                            @endcan
                        </div>
                    </div><!-- end col-->
                </div>
                <table id="roles-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Activos</th>
                                <th scope="col">Permisos</th>
                                <th>Accciones</th>
                            </tr>
                        </thead>
                    </table>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

@push('scripts')
     <script>
    $(document).ready( function () {
      $('#roles-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('roles.index') !!}',
        columns:[
            {data: 'DT_RowIndex', name: 'DT_RowIndex', className:'text-center'},
            {data: 'name', name : 'name',className: 'text-center'},
            {data: 'actives', name : 'actives', className: 'text-center'},
            {data: 'permissions', name : 'permissions', className: 'text-center'},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
        ]
      } );
    } );
    </script>
@endpush
@endsection
