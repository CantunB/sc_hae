@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">COTIZACIONES</a></li>
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>
            <h4 class="page-title">COTIZACIONES DE LA REQUISICIÓN {{$quotes[0]->requisition->folio}}</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12 order-lg-1 order-2">
        <div class="card mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
            <!--             <form class="form-inline">
                            <div class="form-group">
                                <label for="inputPassword2" class="sr-only">Search</label>
                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                            </div>
                        </form>
                    -->
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                            <a href="{{ url()->previous() }}"
                                class="btn btn-sm btn-danger waves-effect waves-light mb-2">
                                <i class="mdi mdi-menu-left-outline"></i> Regresar</a>
                        @can('create_quotes')
                            <a href="{{ route('cotizaciones.nueva', $quotes[0]->requisition->asignado[0]->id ) }}" type="button"
                            class="btn btn-sm btn-info waves-effect waves-light mb-2">
                            <i class="mdi mdi-plus mr-1"></i>Nueva cotización</a>
                        @endcan
                        </div>
                    </div><!-- end col-->
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
        @foreach ($quotes as $quote)
            <div class="card-box mb-2">
                <div class="row align-items-center">
                    <div class="col-sm-4">
                        <div class="media">
                            <img class="d-flex align-self-center mr-3 rounded-circle" src="{{ asset('assets/images/companies/'.$quote->provider->provider_file) }}" alt="Generic placeholder image" height="64">
                            <div class="media-body">
                                <h4 class="mt-0 mb-2 font-16"><a href="{{ route('proveedores.edit', $quote->provider->id) }}">{{ $quote->provider->name }}</a></h4>
                                <p class="mb-1"><b>Direccion:</b> {{ $quote->provider->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="text-center my-3 my-sm-0">
                            <p class="mb-0 text-muted">{{ $quote->created_at->toFormattedDateString() }}</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center button-list">
                            <a  href="{{asset('requisitions/cotizadas/'.$quote->quote_file  ) }}" target="__blank" class="btn btn-xs btn-primary waves-effect waves-light">Ver Cotizacion</a>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="text-sm-right text-center mt-2 mt-sm-0">
                        <!--     <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a> -->
                            @can('delete_quotes')
                                <a href="javascript:void(0);"  title="Eliminar cotización" data-toggle="modal" data-target="#delete" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                            @endcan
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-box-->
        @endforeach
    </div> <!-- end col -->
</div>
                        <!-- end row -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><strong>Eliminar registro</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>¿Desea eliminar la cotizacion?</h5>
                        <p><strong>{{$quotes[0]->requisition->folio }} </strong></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        <!-- Inicio btn para eliminar-->
                        <form style="display:inline"
                              method="POST"
                              {{--  action="{{ route('users.destroy', $user->id) }}">  --}}
                              action="{{ route('cotizaciones.delete', $quote->id)  }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-xs" type="submit">Eliminar</button>
                        </form>
                        <!-- Final btn para eliminar-->
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
