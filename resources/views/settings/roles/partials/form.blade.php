@csrf
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Nombre(s)</label>
            <input type="text" class="form-control" value="{{ $roles->name}}">
            @if ($errors->has('name'))
                <p style="color:red">  {{$errors->first('name')}} </p>
            @endif
        </div>
    </div>

    <h5>Lista de permisos</h5>
    <div class="form-group">
        <ul class="list-unstyled">
            @foreach ($permissions as $item => $val )
                <li>
                    <label>

                        <input type="checkbox"
                               name="permission[]"
                               value="{{ $val->id }}" {{ $roles->permissions->pluck('id')->contains($val->id) ? 'checked' : '' }}
                        > <strong>{{ $val->name   }}</strong>
                       <em>({{ $val->description ?: 'N/A'}} )</em>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
    &nbsp; <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>&nbsp; {{ $btnText }} </button>
    <a href="{{ url()->previous() }}" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>


