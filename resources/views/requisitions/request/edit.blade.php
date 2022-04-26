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
                    <li class="breadcrumb-item active">LISTA</li>
                </ol>
            </div>
            <h4 class="page-title">Editar requisición {{$requisition->requisition->folio}}</h4>
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
                            <a href="{{ url()->previous() }}"
                                class="btn btn-sm btn-danger waves-effect waves-light mb-2"><i class="fas fa-times"></i> Regresar</a>
                        </div>
                    </div><!-- end col-->
                </div>
                    <form id="form" method="POST" action="{{ route('request.update', $requisition->requisition_id) }}">
                        @method('PUT')
                        @csrf
                        @if(is_null($requisition->requisition->file_req))
                            <div class="alert alert-{{$requisition->requisition->status  == 0 ? 'success' : 'danger'}} border-0">
                                <div class="form-group row col-md-12">
                                    <label><i class="mdi mdi-alert-circle-outline mr-2"></i>SELECCIONAR EL ESTADO DE LA REQUISICION</label>
                                    <div class="col-md-4">
                                        <select type="text" name="status" class="form-control select2" data-style="btn-outline-primary" >
                                                <option value="0" @if($requisition->requisition->status == 0)selected @endif >Autorizada</option>
                                                <option value="2" @if($requisition->requisition->status == 2)selected @endif >No Autorizada</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-check"></i></button>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="form-group row col-md-12">
                                <label for="folio" class="col-md-2 offset-md-7 col-form-label"><strong>REQ. NO.</strong></label>
                                <div class="col-md-3">
                                    <input   type="text" name="folio" class="form-control text-right" id="folio"
                                            value="{{$requisition->requisition->folio}}" required>
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label for="added_on" class="col-md-2 offset-md-7 col-form-label">Fecha de solicitud</label>
                                <div class="col-md-3">
                                    <input type="text" name="added_on"
                                           class="form-control" id="added_on" placeholder=""
                                           value="{{ Carbon\Carbon::parse($requisition->requisition->added_on)->format('Y/m/d') }}" required>

                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label for="management" class="col-md-2 col-form-label">Direccion</label>
                                <div class="col-md-4">
                                    <input type="text" name="management" class="form-control" id="management" required value="{{ $requisition->requisition->management }}">
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label for="coordination" class="col-md-2 col-form-label">Coordinación</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{$requisition->requisition->coordinations->name }}" required>
                                    <input type="hidden" class="form-control"  name="coordination_id" value="{{$requisition->requisition->coordinations->id }}" required>
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label for="department" class="col-md-2 col-form-label">Departamento</label>
                                <div class="col-md-6">
                                    <input type="text"  class="form-control" value="{{ $requisition->requisition->departments->name}}" required>
                                    <input type="hidden"  class="form-control"  name="department_id" value="{{ $requisition->requisition->departments->id}}" required>
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label for="inputEmail3" class="col-md-2 col-form-label">Unidad Administrativa</label>
                                <div class="col-md-6">
                                    <input type="text" name="administrative_unit"  class="form-control" id="inputEmail3" placeholder="" required
                                           value="{{$requisition->requisition->administrative_unit}}">
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label for="inputEmail3" class="col-md-2 col-form-label">Fecha Para Requerir Material</label>
                                <div class="col-md-3">
                                    <input type="text" name="required_on"   class="form-control" id="required_on" placeholder=""
                                           value="{{ Carbon\Carbon::parse($requisition->requisition->required_on)->format('Y/m/d') }}" required>
                                </div>
                            </div>
                            <div class="form-group row col-md-12">
                                <label for="inputEmail3" class="col-md-2 col-form-label">Asunto</label>
                                <div class="col-md-6">
                                    <input type="text"  name="issue" class="form-control" id="inputEmail3" placeholder="" value="{{$requisition->requisition->issue}}" required>
                                </div>
                            </div>
                            <div class="form-group row col-12">
                                <label class="col-md-2 col-form-label">Programa</label>
                                <div class="form-group col-md-12">
                                    <table class="table table-responsive ">
                                        <thead>
                                        <tr>
                                            <th>Partida</th>
                                            <th>Cantidad</th>
                                            <th>Unidad</th>
                                            <th>Concepto</th>
                                        </tr>
                                        </thead>
                                        <tbody class="field_wrapper">
                                        @foreach($requisition->requested as $requested )
                                        <tr>
                                            <td style="text-align: center"><textarea  min="0" name="departure[]" class="form-control" required>{{$requested->requested->departure }}</textarea></td>
                                            <td style="text-align: center"><textarea min="0" name="quantity[]" class="form-control" required>{{$requested->requested->quantity}}</textarea></td>
                                            <td style="text-align: center"><textarea name="unit[]" class="form-control" required>{{$requested->requested->unit}}</textarea></td>
                                            <td style="width:30rem"><textarea name="concept[]" class="form-control" required>{{$requested->requested->concept }}</textarea></td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group row col-md-12">
                                <label for="remark" class="col-md-2 col-form-label">Observaciónes</label>
                                <div class="col-md-10">
                                    <input type="text" name="remark"  class="form-control" id="inputEmail3" required value="{{$requisition->requisition->remark}}">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    Actualizar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                                </button>
                                <a  href="{{ url()->previous() }}" class="btn btn-danger waves-effect waves-light">
                                    Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                                </a>
                            </div>
                        </div>

                    </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
    <!-- end row -->
@push('scripts')
  <script>
      $('#form').parsley();
  </script>
  <script>
      $("#required_on").flatpickr(
          {
              altInput:!0,
              altFormat:"F j, y",
              locale: {
                  firstDayOfWeek: 1,
                  weekdays: {
                      shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                      longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                  },
                  months: {
                      shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                      longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                  },
              }
          });
      $("#added_on").flatpickr(
          {
              altInput:!0,
              altFormat:"F j, y",
              locale: {
                  firstDayOfWeek: 1,
                  weekdays: {
                      shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                      longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                  },
                  months: {
                      shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                      longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                  },
              }
          });
  </script>
@endpush
@endsection
