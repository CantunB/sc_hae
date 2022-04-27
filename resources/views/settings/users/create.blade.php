@extends('layouts.app')
@section('title',' Crear Empleado')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">USUARIOS</a></li>
                    <li class="breadcrumb-item active">CREAR</li>
                </ol>
            </div>
            <h4 class="page-title">CREAR USUARIO</h4>
        </div>
    </div>
</div>
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
                    <form id="form" method="POST" action="{{ route('usuarios.store') }}" class="form-group">
                        @csrf
                        @method('POST')
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Informacion Personal</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre completo</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Ingresa un nombre" required value="{{old('name')}}">
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
                                    <input type="text" class="form-control @error('NoEmpleado') is-invalid @enderror" id="NoEmpleado" name="NoEmpleado" placeholder="HAEXXX"
                                           value="{{old('NoEmpleado')}}" required>
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
                                    <input type="text" class="form-control" id="no_seg_soc" name="no_seg_soc" value="{{old('no_seg_soc')}}">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="userbio">Categoria</label>
                                    <input type="text" class="form-control" id="categoria" name="categoria" value="{{old('catergoria')}}">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="no_seg_soc">Coordinacion</label>
                                    <select id="coordinacion" name="coordinacion" class="form-control" required>
                                        <option disabled selected>Selecciona una coordinacion </option>
                                    @foreach ($coordinations as $i => $coordination )
                                        <option value=" {{  old('coordinacion') ?? $coordination->id}} ">{{$coordination->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="userbio">Departamento</label>
                                    <select  id="departamento" name="departamento" class="form-control" required>
                                        <option disabled selected>Selecciona un departamento </option>
                                    </select>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nivel">Nivel</label>
                                    <input type="text" class="form-control" id="nivel" name="nivel">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" id="rfc" name="rfc">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="curp">CURP</label>
                                    <input type="text" class="form-control" id="curp" name="curp">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fe_nacimiento">Fecha Nacimiento</label>
                                    <input type="text" class="form-control" id="fe_nacimiento" name="fe_nacimiento">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fe_ingreso">Fecha Ingreso</label>
                                    <input type="text" class="form-control" id="fe_ingreso" name="fe_ingreso">
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Correo Electronico</label>
                                    <input  required type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="text-muted mt-3 mb-2">Lista de roles</p>
                                    @foreach ($roles as $id => $rol)
                                        <div class="radio radio-info form-check-inline">
                                            <input type="radio" id="roles" name="roles[]" value="{{ $id }}" required>
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
