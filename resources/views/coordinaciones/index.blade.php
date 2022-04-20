@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">COORDINACIONES</a></li>
                    <li class="breadcrumb-item active">LISTA </li>
                </ol>
            </div>
            <h4 class="page-title">LISTA DE COORDINACIONES</h4>
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
                            @can('create_coordinaciones')
                            <a href="{{ route('coordinaciones.create') }}"
                                class="btn btn-sm btn-success waves-effect waves-light mb-2 float-right">Crear nueva coordinación</a>
                            @endcan
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <table id="coordinations-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Fecha de registro</th>
                                <th scope="col">Fecha de actualizacion</th>
                                <th>Accciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
    <!-- end row -->

@push('scripts')
   <script>
        $(document).ready( function () {
      $('#coordinations-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('coordinaciones.index') !!}',
        columns:[
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'slug', name: 'slug'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
      } );
    } );
    </script>
@endpush

@endsection
