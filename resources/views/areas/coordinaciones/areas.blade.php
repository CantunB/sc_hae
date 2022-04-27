@extends('layouts.app')
@section('content')
    @component('layouts.partials.breadcrumb')
        @slot('title') {{ config('app.name', 'H.A.E') }} @endslot
        @slot('subtitle') {{Request::path()}} @endslot
        @slot('teme') Lista @endslot
    @endcomponent
<div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h2 style="text-transform:uppercase;" class="header-title"><strong>Relacion de coordinacion, departamentos</strong></h2>
                <p class="sub-header">
                <div class="form-group">
                    </p>
                </div>
                <div class="table-responsive">
                    <table id="coordinations-table"class="table dt-responsive table-bordered nowrap w-100">
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
            </div>
        </div>
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
