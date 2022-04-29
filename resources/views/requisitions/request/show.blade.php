@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">REQUISICIONES</a></li>
                    <li class="breadcrumb-item active">DETALLES</li>
                </ol>
            </div>
            <h4 class="page-title">REQUISICIÓN No.{{$requisition[0]->requisition->folio}}</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="text-sm-left">
                                @if( $requisition[0]->requisition->status <= 0)
                                    @can('create_requisicion')
                                    <a class="btn btn-sm btn-soft-danger waves-effect waves-light mb-2"
                                        href="{{route('pdf.request_gt',$requisition[0]->id)}}"
                                        target="_blank"><i class="fas fa-file-pdf"></i> Generar PDF</a>
                                    {{--  <button type="button" id="generatePDF" class="btn btn-sm btn-soft-danger waves-effect waves-light mb-2"><i class="fas fa-file-pdf"></i> Generar PDF</button>  --}}
                                        @endcan
                                    @can('update_requisicion')
                                        <a  class="btn btn-sm btn-info waves-effect waves-light mb-2"
                                            href="{{route('requisiciones.upload',$requisition[0]->requisition_id)}}">
                                            <i class="fas fa-file-upload">
                                            </i> Subir Autorizacion</a>
                                    @endcan
                                        {{-- @can('requisitions.edit')
                                        <a style="margin: 10px" class="btn btn btn-warning float-right"
                                            href="{{route('requisiciones.edit',$requisition[0]->id)}}">
                                            <i class="fas fa-edit">
                                            </i> Editar</a>
                                    @endcan --}}
                                @elseif($requisition[0]->requisition->status >= 2)
                                        <h4><span class="badge badge-xl badge-outline-danger">Requisicion No Autorizada</span></h4>
                                @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right">
                            <a class="btn btn-sm btn-secondary waves-effect waves-light mb-2" href="{{ url()->previous() }}">
                                                        <i class="mdi mdi-chevron-left" ></i> Regresar</a>
                        </div>
                    </div>
                                    <div class="container">
                                        @foreach($requisition as $r)
                                        <div class="container"  style="margin-top:20px">
                                            <div class="row justify-content-end">
                                                <div class="col-sm-4">
                                                    <p class=""><strong>REQ. NO. {{ $r->requisition->folio }}</strong></p>
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-4">
                                                    <strong> {{ Carbon\Carbon::parse($r->requisition->added_on)->format('d/m/Y')}}</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-8">
                                                <label>
                                                    <strong>DIRECCIÓN:  </strong>{{ $r->requisition->management }}

                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-8">
                                                <label>
                                                    <strong>COORDINACIÓN:  </strong>{{$r->requisition->coordinations->name}}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-8">
                                                <label>
                                                    <strong>DEPARTAMENTO:  </strong>{{$r->requisition->departments->name}}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-8">
                                                <label>
                                                    <strong>UNIDAD ADMINISTRATIVA:  </strong>{{ $r->requisition->administrative_unit }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-12">
                                                <label>
                                                    <strong>
                                                        FECHA PARA REQUERIR MATERIAL:
                                                        {{ Carbon\Carbon::parse($r->requisition->required_on)->format('d/m/Y')}}
                                                    </strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-12">
                                                <label>
                                                    <strong>ASUNTO:  </strong>{{ $r->requisition->issue }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-sm-12">
                                                <strong>PROGRAMA:  </strong>
                                            </div>
                                        <div class="container col-sm-12 table-responsive table-sm">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th style="text-align: center "WIDTH="10"> <i>PARTIDA</i></th>
                                                    <th style="text-align: center "WIDTH="1"><i>CANTIDAD</i></th>
                                                    <th style="text-align: center "WIDTH="10"><i>UNIDAD</i></th>
                                                    <th style="text-align: center"><i>CONCEPTO</i></th>
                                                </tr>
                                                </thead>
                                                @foreach ($requesteds as $req)
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$req->requested->departure }}</td>
                                                        <td>{{ $req->requested->quantity}}</td>
                                                        <td>{{$req->requested->unit }}</td>
                                                        <td>{{$req->requested->concept }}</td>
                                                    </tr>
                                                    </tbody>

                                                @endforeach
                                                <thead>
                                                <th colspan="4">
                                                    <label> <strong>  Observaciones: </strong>
                                                        {{ $r->requisition->remark }}
                                                    </label>
                                                </th>
                                                </thead>
                                            </table>
                                            @endforeach
                                        </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                    </div><!-- end col-->
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
@push('scripts')

@endpush
@endsection
