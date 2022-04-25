@extends('layouts.app')
@section('content')
<!-- start page title -->
@component('layouts.partials.breadcrumb')
@slot('title') {{ config('app.name', 'H.A.E') }} @endslot
@slot('subtitle') usuarios @endslot
@slot('teme') actualizar @endslot
@endcomponent
<!-- end page title -->
<div class="row">
    <div class="col-lg-12 col-xl-8">
        <div class="card-box">
            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        Configuración
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="settings">
                    <form id="form" method="POST" action="{{ route('usuarios.update', $user->id) }}" class="form-group">
                        @csrf
                        @method('PUT')
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Informacion Personal</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre completo</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="NoEmpleado">No. Empleado</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="NoEmpleado" name="NoEmpleado" value="{{ $user->NoEmpleado }}" required>
                                    @error('NoEmpleado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="no_seg_soc">No. Seguro Social</label>
                                    <input type="text" class="form-control" id="no_seg_soc" name="no_seg_soc" value="{{ $user->no_seg_soc }}">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="userbio">Categoria</label>
                                    <input type="text" class="form-control" id="categoria" name="categoria" value="{{ $user->categoria }}">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="no_seg_soc">Coordinacion</label>
                                    <select id="coordinacion" name="coordinacion" class="form-control" required>
                                        @if(true === ($user->asignado->areas->coordinations->id ?? null))
                                            <option value="{{ $user->asignado->areas->coordinations->id}}" selected>
                                                {{$user->asignado->areas->coordinations->name}}</option>
                                        @else
                                            <option disabled selected> Selecciona una coordinacion</option>
                                            @foreach ($coordinations as $i => $coordination )
                                                <option value="{{$coordination->id}}"
                                                @if($coordination->id === ($user->asignado->areas->coordinations->id ?? null)) selected
                                                @endif
                                                >{{$coordination->name}}</option>
                                            @endforeach
                                        @endif

                                </select>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="userbio">Departamento</label>
                                    <select  id="departamento" name="departamento" class="form-control" required>
                                        @if(($user->asignado->areas->departments->id ?? null))
                                        <option value="{{$user->asignado->areas->departments->id}}" selected >
                                            {{ $user->asignado->areas->departments->name}}</option>
                                        @else
                                            <option selected disabled> Selecciona un departamento</option>
                                        @endif
                                    </select>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nivel">Nivel</label>
                                    <input type="text" class="form-control" id="nivel" name="nivel" value="{{ $user->nivel }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" id="rfc" name="rfc" value="{{ $user->rfc }}">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="curp">CURP</label>
                                    <input type="text" class="form-control" id="curp" name="curp" value="{{ $user->curp }}">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fe_nacimiento">Fecha Nacimiento</label>
                                    <input type="text" class="form-control" id="fe_nacimiento" name="fe_nacimiento" value="{{ $user->fe_nacimiento }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fe_ingreso">Fecha Ingreso</label>
                                    <input type="text" class="form-control" id="fe_ingreso" name="fe_ingreso" value="{{ $user->fe_ingreso }}">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Correo Electronico</label>
                                    <input required stype="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" autocomplete="off">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="text-muted mt-3 mb-12">Lista de roles</p>
                                    @foreach ($roles as $id => $rol)
                                        <div class="radio radio-info form-check-inline">
                                            <input type="radio" id="roles" name="roles[]" value="{{ $id }}" {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }} >
                                            <label for="roles">{{$rol }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    Registrar<span class="btn-label-right"><i class="mdi mdi-check-all"></i></span>
                                </button>
                                <a  href="{{ url()->previous() }}" class="btn btn-danger waves-effect waves-light">
                                    Cancelar<span class="btn-label-right"><i class="mdi mdi-close-outline"></i></span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end settings content-->

            </div> <!-- end tab-content -->
        </div> <!-- end card-box-->

    </div> <!-- end col -->
</div>
<!-- end row-->
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
                $('#departamento').empty();
                $.each(data.departments,function(i, val){
                $('#departamento').append('<option value="'+data.departments[i].departments['id']+'">'+data.departments[i].departments['name']+'</option>');
                })
            },
                error: function( error )
                {
                    alert( error );
                }
            })
        });
        });
</script>
<script>
    $('#form').parsley();
</script>
@endpush
@endsection
