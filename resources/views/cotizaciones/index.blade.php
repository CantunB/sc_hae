@extends('layouts.app')
@section('content')
@component('layouts.partials.breadcrumb')
@slot('title') {{ config('app.name', 'H.A.E') }} @endslot
@slot('subtitle') COTIZACIONES @endslot
@slot('teme') Lista @endslot
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
                    <table id="quotes-table" class="table dt-responsive nowrap w-100">
                        <thead>
                            <th style="text-align: center">Departamento</th>
                            <th style="text-align: center">No.Cotizaciones</th>
                            <th style="text-align: center">Opciones</th>
                        </thead>
                        @foreach($quotes as $key => $q)

                        <tbody>
                            <td style="text-align: start"><strong>{{ $q->department->name }}</strong></td>
                            <td style="text-align: center"> <button type="button" class="btn btn-pill btn-sm btn-info    "><strong>{{ $counts[$key] }}</strong></button></td>
                            <td style="text-align: center; width: 10px">
                                <a href="{{route('cotizaciones.list',$q->department->id)}}"
                                   title="Lista de cotizaciones"
                                   class="action-icon  btn btn-soft-info ">
                                   <i class="mdi mdi-currency-eth"></i></a>
                                </a>
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
