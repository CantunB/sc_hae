@csrf
<input type="hidden" name="caption" value="{{"2018, Año del Sesenta y Cinco Aniversario del Reconocimiento al Ejercicio del Derecho a Voto de las Mujeres Mexicanas"}}">
<div class="row">
    <div class="form-group row col-md-12">
        <label for="folio" class="col-md-2 offset-md-7 col-form-label"><strong>REQ. NO.</strong></label>
        <div class="col-md-3">
            <input type="text" name="folio" required readonly class="form-control text-right @error('folio') is-invalid @enderror" id="folio"
            value="{{
                config('app.name', 'H.A.E') .
                '/'.$countreq.'/'.date('Y')
            }}">
            @error('folio')
            <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
            @enderror
        </div>
    </div>
    @error('folio')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <input type="hidden" name="accountant" value="{{$countreq}}">
    <input type="hidden" name="user_id" value="{{$user->id}}">

    <div class="form-group row col-md-12">
        <label for="added_on" class="col-md-2 offset-md-7 col-form-label">&nbsp;</label>
        <div class="col-md-3">
            <input type="hidden" name="added_on" class="form-control  @error('added_on') is-invalid @enderror" id="added_on" value="{{now()}}" required>
                     @error('added_on')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                     @enderror
        </div>
    </div>
    <div class="form-group row col-md-12">
        <label for="inputEmail3" class="col-md-2 col-form-label">Direccion</label>
        <div class="col-md-4">
            <input type="text" name="management"
                   class="form-control @error('management') is-invalid @enderror" id="inputEmail3"  value="{{  config('app.name', 'H. Ayuntamiento de Escarcega') }}" readonly>
            @error('management')
            <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
            @enderror
        </div>
    </div>
    <div class="form-group row col-md-12">
        <label for="inputEmail3" class="col-md-2 col-form-label">Coordinación</label>
        <div class="col-md-6">
            @if(Auth::user()->hasRole('Super-Admin') or Auth::user()->hasRole('admin'))
                <select class="form-control select2" name="coordination_id" id="coordinacion" required >
                    <option disabled selected>Selecciona una coordinacion</option>
                @foreach($coordinaciones as $i => $coordinacion)
                    <option value="{{$coordinacion->id}}">{{$coordinacion->name}}</option>
                @endforeach
                </select>
            @else
                <input type="text" class="form-control @error('coordination') is-invalid @enderror"  value="{{ $user->asignado->areas->coordinations->name }}" readonly>
                <input type="hidden" class="form-control @error('coordination') is-invalid @enderror" name="coordination_id" value="{{ $user->asignado->areas->coordinations->id }}" readonly>
            @error('coordination')
            <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
            @enderror
            @endif

        </div>
    </div>
    <div class="form-group row col-md-12">
        <label for="inputEmail3" class="col-md-2 col-form-label">Departamento</label>
        <div class="col-md-6">
            @if(Auth::user()->hasRole('Super-Admin') or Auth::user()->hasRole('admin'))
                <select class="form-control select2" name="department_id" id="departamento">
                    <option disabled selected>Selecciona un departamento</option>
                </select>
            @else
                <input type="text" class="form-control @error('department') is-invalid @enderror" value="{{ $user->asignado->areas->departments->name }}" readonly>
                <input type="hidden" class="form-control @error('department') is-invalid @enderror" name="department_id" value="{{ $user->asignado->areas->departments->id }}" readonly>
            @endif
            @error('department')
            <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
            @enderror
        </div>
    </div>
    <div class="form-group row col-md-12">
        <label for="inputEmail3" class="col-md-2 col-form-label">Unidad Administrativa</label>
        <div class="col-md-6">
            <input type="text" name="administrative_unit" class="form-control @error('administrative_unit') is-invalid @enderror" id="administrative_unit" required value="{{old('administrative_unit')}}">
              @error('administrative_unit')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
        </div>
    </div>
    <div class="form-group row col-md-12">
        <label for="inputEmail3" class="col-md-2 col-form-label">Fecha Para Requerir Material</label>
        <div class="col-md-3">
            <input type="date" name="required_on" class="form-control @error('required_on') is-invalid @enderror" id="required_on" required value="{{old('required_on')}}">
            @error('required_on')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row col-md-12">
        <label for="issue" class="col-md-2 col-form-label">Asunto</label>
        <div class="col-md-6">
            <input type="text" name="issue" class="form-control @error('issue') is-invalid @enderror" id="issue" required value="{{old('issue')}}">
            @error('issue')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
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
                    <th><button type="button" class="add_button btn btn-sm btn-success"><i class="fas fa-plus-circle"></i></button></th>
                </tr>
                </thead>
                    <tbody class="field_wrapper">
                <input class="form-control col-md-12" type="text" name="cont" id="cont" hidden>
                <tr>
                    <td ><input readonly min="0" name="departure[]" id="departure" required
                      class="form-control @error('departure') is-invalid @enderror text-center">
                      @error('departure[]')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror</td>
                    <td ><input type="number" min="0" name="quantity[]" id="quantity" required
                      class="form-control @error('quantity') is-invalid @enderror">
                        @error('quantity[]')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror</td>
                    <td ><input type="text" name="unit[]" id="unit" required
                      class="form-control  @error('unit') is-invalid @enderror">
                      @error('unit[]')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror</td>
                    <td style="width:30rem"><textarea type="text" required name="concept[]" id="concept[]" class="form-control @error('concept') is-invalid @enderror"></textarea>
                      @error('concept')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror</td>

                    <td><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

<div class="form-group row col-md-12">
    <label for="inputEmail3" class="col-md-2 col-form-label">Observaciónes</label>
    <div class="col-md-10">
        <input type="text" name="remark" class="form-control" id="inputEmail3" placeholder="" value="{{ old('remark')}}" required>
    </div>
</div>


    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-success waves-effect waves-light">
            {{ $btnText }}<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
        </button>
        <a  href="{{ url()->previous() }}" class="btn btn-danger waves-effect waves-light">
            Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
        </a>
    </div>

</div>
