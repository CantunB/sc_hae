@extends('layouts.app')
@section('content')
<!-- start page title -->
@component('layouts.partials.breadcrumb')
@slot('title') {{ config('app.name', 'H.A.E') }} @endslot
@slot('subtitle') {{Request::path()}} @endslot
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
                            @can('create_users')
                            <a href="{{ route('usuarios.create') }}"
                                class="btn btn-sm btn-success waves-effect waves-light mb-2 float-right">Crear nuevo usuario</a>
                            @endcan
                        </div>
                    </div><!-- end col-->
                </div>
                    <table id="users-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th style="text-align: center" >ID</th>
                                <th style="text-align: center">No.Empleado</NoEmpleadoth>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Correo</th>
                                <th style="text-align: center">&nbsp;</th>
                            </tr>
                        </thead>
                    </table>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
    <!-- end row -->
@push('scripts')
<script>
    $(document).ready( function () {
      $('#users-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('usuarios.index') !!}',
        columns:[
            {data: 'id', name : 'id'},
            {data: 'NoEmpleado', name : 'NoEmpleado'},
            {data: 'name', name : 'name'},
            {data: 'email', name : 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
      } );
    } );

</script>
@endpush
@endsection
