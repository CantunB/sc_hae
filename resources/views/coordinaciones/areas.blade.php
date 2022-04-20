@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">AREAS</a></li>
                    <li class="breadcrumb-item active">RELACION</li>
                </ol>
            </div>
            <h4 class="page-title"></h4>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h2 style="text-transform:uppercase;" class="header-title"><strong>Relacion de coordinacion, departamentos y unidades</strong></h2>
                <p class="sub-header">
                <div class="form-group">
         </p>
    </div>

    <div class="table-responsive">
        <table id="coordinations-table"class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Coordinacion</th>
                    <th scope="col">Departamento</th>
                    <th>Accciones</th>
                </tr>
            </thead>
        </table>
    </div>
            </div> <!-- end card-box -->
        </div> <!-- end col-->
</div>

@push('scripts')
   <script>
        $(document).ready( function () {
      $('#coordinations-table').DataTable( {
        processing: true,
        serverSide : true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: '{!! route('areas.index') !!}',
        columns:[
            {data: 'id', name: 'id'},
            {data: 'coordination_id', name: 'coordination_id'},
            {data: 'department_id', name: 'department_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
      } );
    } );
    </script>
@endpush

@endsection
