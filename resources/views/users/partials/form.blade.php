@csrf

<div class="form-group row">
    <label for="NoEmpleado" class="col-md-4 col-form-label text-md-right">{{ __('No. Empleado') }}</label>
    <div class="col-md-6">
        <input id="NoEmpleado" type="text"  class="form-control
            @error('NoEmpleado') is-invalid
            @enderror" name="NoEmpleado"
               value="{{ old('NoEmpleado') ?: $user->NoEmpleado }} "
               required autocomplete="NoEmpleado"
               autofocus>
        @error('NoEmpleado')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo') }}</label>
    <div class="col-md-6">
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?: $user->name }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="no_seg_soc" class="col-md-4 col-form-label text-md-right">{{ __('No. Seguro Social') }}</label>
    <div class="col-md-6">
        <input id="no_seg_soc" type="text" class="form-control
            @error('no_seg_soc') is-invalid
            @enderror"
               name="no_seg_soc"
               value="{{ old('no_seg_soc') ?: $user->no_seg_soc }}"
               required autocomplete="no_seg_soc" autofocus>
        @error('no_seg_soc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
    <div class="col-md-6">
        <input id="categoria" type="text"
               class="form-control @error('categoria') is-invalid @enderror"
               name="categoria" value="{{ old('categoria') ?: $user->categoria }}"
               required autocomplete="categoria" autofocus>
        @error('categoria')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="nivel" class="col-md-4 col-form-label text-md-right">{{ __('Nivel') }}</label>
    <div class="col-md-6">
        <input id="nivel" type="text"
               class="form-control @error('nivel') is-invalid @enderror"
               name="nivel" value="{{ old('nivel') ?: $user->nivel }}"
               required autocomplete="nivel" autofocus>
        @error('nivel')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="rfc" class="col-md-4 col-form-label text-md-right">{{ __('RFC') }}</label>
    <div class="col-md-6">
        <input id="rfc" type="text"
               class="form-control @error('rfc') is-invalid @enderror"
               name="rfc" value="{{ old('rfc') ?: $user->rfc}}"
               required autocomplete="rfc" autofocus>
        @error('rfc')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="curp" class="col-md-4 col-form-label text-md-right">{{ __('CURP') }}</label>
    <div class="col-md-6">
        <input id="curp" type="text"
               class="form-control @error('curp') is-invalid @enderror"
               name="curp" value="{{ old('curp') ?: $user->curp }}"
               required autocomplete="curp" autofocus>
        @error('curp')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="fe_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Nacimiento') }}</label>
    <div class="col-md-6">
        <input id="fe_nacimiento" type="text"
               class="form-control @error('fe_nacimiento') is-invalid @enderror"
               name="fe_nacimiento" value="{{ old('fe_nacimiento') ?: $user->fe_nacimiento }}"
               required autocomplete="fe_nacimiento" autofocus>
        @error('fe_nacimiento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="fe_ingreso" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de ingreso') }}</label>
    <div class="col-md-6">
        <input id="fe_ingreso" type="text"
               class="form-control @error('fe_ingreso') is-invalid @enderror"
               name="fe_ingreso" value="{{ old('fe_ingreso') ?: $user->fe_ingreso }}"
               required autocomplete="fe_nacimiento" autofocus>
        @error('fe_ingreso')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    <div class="col-md-6">
        <input id="email" type="email"
               class="form-control @error('email') is-invalid @enderror"
               name="email" value="{{ old('email') ?: $user->email }}"
               required autocomplete="email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>
<h5>Lista de Areas</h5>
<div class="form-group col-12">
    <div class="row">
    <div class="form-group col-md-6">
        <label for="coordinacion">Selecciona una coordinación</label>
        <select id="coordinacion" name="coordinacion" class="form-control">
                @foreach ($coordinations as $i => $coordination )
                <option value="{{  old('coordinacion') ?? $coordination->id}}"
                    @if($coordination->id === ($user->asignado->areas->coordinations->id ?? null))
                      selected
                    @endif
                    >{{$coordination->name}}</option>
                @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 {{ $errors->has('department') ? 'has-error' : '' }}">
        <label for="departamento">Selecciona un departamento</label>
        <select  id="departamento" name="departamento" class="form-control">
            <option value="0" disabled="true" selected="true">
            @if( true === ($user->asignado->areas->departments->id ?? null)){
            <option value="{{  old('departamento') ?? $user->asignado->areas->departments->id}}"
                    disabled="true" selected >{{ $user->asignado->areas->departments->name}}</option>
            }
            @endif
        </select>
    </div>
    <div id="prueba"></div>
    </div>
</div>

<h5>Lista de roles</h5>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($roles as $id => $name )
            <li>
                <label>

                    <input type="checkbox"
                        name="roles[]"
                        value="{{ $id  }}" {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
                    > {{ $name   }}
                    {{--<em>({{ $permissions ?: 'N/A'}} )</em>--}}
                </label>
            </li>
        @endforeach
    </ul>
</div>
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
    $('#coordinacion').on('change',function(e) {
        var coordinacion = e.target.value;
        $.ajax({
        url:"{{ route('coordinaciones.getDepartments') }}",
        type:"POST",
        data: {
                '_token': '{{csrf_token()}}',
                'coordinacion': coordinacion
            },
            success:function (data) {
               // $('#prueba').html(data);
                //alert(data.departments);
                $('#departamento').empty();
                $.each(data.departments,function(i, val){
                 //   console.log(data.departments[i]); //Accedo al valor del departamento
                    //console.log(data.departments[i].departments['name']); //Accedo al valor del departamento

                $('#departamento').append('<option value="'+data.departments[i].departments['id']+'">'+data.departments[i].departments['name']+'</option>');

                })
                //$("#departamento").html(departamento.departamento).selectpicker('refresh');
            },
                error: function( error )
                {
                    alert( error );
                }
            })
        });
        });
</script>
@endpush

