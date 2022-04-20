@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">ORDEN DE COMPRA</a></li>
                    <li class="breadcrumb-item active">DETALLES</li>
                </ol>
            </div>
            <h4 class="page-title">DETALLES DE ORDEN DE COMPRA {{$purchaseorder->detail->order_folio}}</h4>
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
                            @if($purchaseorder->status <= 1)
                                <a class="btn btn-sm btn-soft-danger waves-effect waves-light mb-2" href="{{route('ordenes.pdf',$purchaseorder->id)}}" target="_blank"><i class="mdi mdi-printer" ></i> Imprimir</a>
                                @can('update_compras')
                                <a class="btn btn-sm btn-info waves-effect waves-light mb-2" href="{{route('autorizadas.edit', $purchaseorder->id)}}"><i class="mdi mdi-clipboard-alert-outline" ></i> Subir Orden(es) Firmada(s)</a>
                                @endcan
                            @elseif ($purchaseorder->status === 2)
                                <a  class="btn btn-sm btn-primary waves-effect waves-light mb-2" href="{{route('ordenes.factura', $purchaseorder->id)}}">
                                <i class="fas fa-file-upload" ></i> Subir Factura(s)</a>
                                <a title="Orden Autorizada" href="{{route('autorizadas.show',$purchaseorder->id)}}"
                                                        class="btn btn-sm btn-soft-info waves-effect waves-light mb-2">
                                                        <i class="fas fa-eye fa-md"></i> Ver orden autorizada</a>
                                                    </a>
                            @else
                                <a class="btn btn btn-success float" href="{{route('ordenes.factura', $purchaseorder->id)}}">
                                <i class="fas fa-check" ></i>  Ver Factura(s)</a>
                            @endif
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-sm-6">
                        <div class="text-sm-right">
                            <a class="btn btn-sm btn-danger waves-effect waves-light mb-2" href="{{ url()->previous() }}"><i class="mdi mdi-menu-left-outline" ></i> Regresar</a>
                        </div>
                    </div>
                    <!-- end col-->
                </div>
                <div class="contatiner">
                    <form>
                        <div class="container col-md-12">
                            <div class="container">
                                <div class="row justify-content-end">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group" >
                                                <label for=""><strong>ORDEN DE COMPRA: </strong></label>
                                                &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->detail->order_folio}}</span>
                                            </div>
                                            <div class="input-group" >
                                                <label for=""><strong>FECHA DE ELABORACION: </strong></label>
                                                &nbsp;&nbsp;&nbsp;<span>{{Carbon\Carbon::parse($purchaseorder->detail->created_at)->format('d-M-Y')}}</span>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <div class="row justify-content-start">
                                    <div class="col-md-6">
                                        <label for=""><strong>ANÁLISIS DEL PRECIO: </strong></label>
                                                &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->detail->analysis_folio}}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><strong>Proveedor: </strong></label>
                                        &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->detail->provider->name}}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><strong>R.F.C: </strong></label>
                                        &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->detail->provider->rfc}}</span>
                                    </div>
                                </div>
                                <div class="row justify-content-start">
                                    <div class="col-md-6">
                                        <label for=""><strong>Coordinacion: </strong></label>
                                        &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->detail->area->coordinations->name}}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><strong>Unidad Administrativa: </strong></label>
                                        &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->detail->unit_administrative }}</span>
                                    </div>
                                </div>
                                <div class="row justify-content-start">
                                    <div class="col-md-6">
                                        <label for=""><strong>Departamento: </strong></label>
                                        &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->detail->area->departments->name}}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><strong>No. De Requisicion: </strong></label>
                                        &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->detail->requisition->folio ?? ''}}</span>
                                    </div>
                                </div>
                                <br>
                                    <div class="table-responsive" id="table">
                                        <table id="myTable" name="table" class="table border " border>
                                            <thead>
                                            <tr>
                                                <th style="text-align: center; width:5%"> <i>Part.</i></th>
                                                <th style="text-align: center; width:5%"><i>Cant.</i></th>
                                                <th style="text-align: center; width:10%"><i>Unidad</i></th>
                                                <th style="text-align: center; width:35%"><i>Concepto</i></th>
                                                <th style="text-align: center; width: 20%"><i>Costo.U.</i></th>
                                                <th style="text-align: center; width: 20%"><i>Importe</i></th>
                                            </tr>
                                            </thead>
                                            @foreach($materials as $key => $material)
                                               <tbody>
                                                <tr>
                                                    <td style="text-align: center" >
                                                        {{$material->material->departure}}
                                                    </td>
                                                    <td style="text-align: center">
                                                    {{$material->material->quantity}}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{$material->material->unit}}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{$material->material->concept}}
                                                        @if($loop->last)
                                                            <br><br><br><br><br><br><br><br><br><br><br><br>
                                                        <TABLE style="width: 100%;">
                                                            SON: ( {{$material->material->total_order}}  PESOS 00/100 M.N.)
                                                        </TABLE>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        $&nbsp;{{$material->material->unit_cost}}
                                                        @if($loop->last)
                                                            <br><br><br><br><br><br>
                                                        <TABLE style="width: 100%;">
                                                            <tr>
                                                                <td>
                                                            <div class="row justify-content-start">
                                                                <div class="col-md-6">
                                                                    Desc:
                                                                </div>
                                                                <div class="col-md-6">
                                                                    {{$material->material->p_disc}}%
                                                                </div>
                                                            </div>
                                                                </td>
                                                            </tr>
                                                               <tr>
                                                                   <td>Sub-total</td>
                                                               </tr>
                                                               <tr>
                                                                   <td>
                                                                       I.V.A.
                                                                   </td>
                                                               </tr>
                                                            <tr>
                                                                   <td>
                                                                       Total
                                                                   </td>
                                                               </tr>
                                                        </TABLE>
                                                            @endif

                                                    </td>
                                                <td>
                                                    $&nbsp;{{$material->material->cost_quantity}}
                                                    @if($loop->last)
                                                        <br><br><br><br><br><br><br><br>
                                                    <TABLE class=""  style="width: 100%;">

                                                        <tr>
                                                            <td>$ {{$material->material->subtotal}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                $ {{$material->material->iva}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                $ {{$material->material->total_order}}
                                                            </td>
                                                        </tr>
                                                    </TABLE>
                                                    @endif
                                                </td>
                                                </tr>
                                                </tbody>
                                                    @endforeach

                                        </table>
                                    </div>
                                        <div class="row justify-content-start">
                                            <div class="col-md-5">
                                                <label style="color: blue" for=""><strong>A) TIEMPO DE ENTREGA DEL BIEN O SERVICIO: </strong></label>
                                            </div>
                                                <div class="col-md-6">
                                                &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->feauture->delivery_time}}</span>
                                                </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-md-5">
                                                <label style="color: blue" for=""><strong>A) MATERIAL EN EXISTENCIA: </strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->feauture->existence}}</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-md-5">
                                                <label style="color: blue" for=""><strong>B) MATERIAL EN EXISTENCIA: </strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->feauture->existence}}</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-md-5">
                                                <label style="color: blue" for=""><strong>C) FORMA DE PAGO: </strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->feauture->payment_method}}</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-md-5">
                                                <label style="color: blue" for=""><strong>D) VIGENCIA DEL(OS) PRECIO(S): </strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->feauture->price_term}}</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-md-5">
                                                <label style="color: blue" for=""><strong>E) OTRAS: </strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->feauture->other}}</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-md-5">
                                                <label style="color: blue" for=""><strong>Programa </strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->feauture->program}}</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-md-5">
                                                <label style="color: blue" for=""><strong>Aplicación </strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->feauture->application}}</span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-md-5">
                                                <label style="color: blue" for=""><strong>Vehículo </strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;&nbsp;&nbsp;<span>{{$purchaseorder->feauture->vehicle}}</span>
                                            </div>
                                        </div>
                                        </br>
                                        </br>

                                    </div>
                                </div>
                    </form>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
    <div class="container">

    </div>
@endsection
