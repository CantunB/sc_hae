@extends('layouts.app')
@section('title', 'Actualizar Departamento')
@section('content')
@component('layouts.partials.breadcrumb')
        @slot('title') {{ config('app.name', 'H.A.E') }} @endslot
        @slot('subtitle') dependencia @endslot
        @slot('teme') actualizar @endslot
    @endcomponent
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Crear Permisos</h1>  -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('dependencias.update',$dependency->id ) }}" method="POST" class="form-group">
                        @method('PUT')
                        @csrf
                        <div class="container">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="">Nombre</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') ?: $dependency->name }}">
                                    @if ($errors->has('name'))
                                        <p style="color:red">  {{$errors->first('name')}} </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ old('slug') ?: $dependency->slug}}">
                                    @if ($errors->has('slug'))
                                        <p style="color:red">  {{$errors->first('slug')}} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="">Direccion</label>
                                    <input type="text" name="address_dependency" class="form-control" value="{{ old('address_dependency') ?: $dependency->address_dependency }}">
                                    @if ($errors->has('address_dependency'))
                                        <p style="color:red">  {{$errors->first('address_dependency')}} </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Colonia</label>
                                    <input type="text" name="colony_dependency" class="form-control" value="{{ old('colony_dependency') ?: $dependency->colony_dependency}}">
                                    @if ($errors->has('colony_dependency'))
                                        <p style="color:red">  {{$errors->first('colony_dependency')}} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="">Telefono</label>
                                    <input type="text" name="telephone_dependency" class="form-control" value="{{ old('telephone_dependency') ?: $dependency->telephone_dependency }}">
                                    @if ($errors->has('telephone_dependency'))
                                        <p style="color:red">  {{$errors->first('telephone_dependency')}} </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Correo</label>
                                    <input type="text" name="email_dependency" class="form-control" value="{{ old('email_dependency') ?: $dependency->email_dependency}}">
                                    @if ($errors->has('email_dependency'))
                                        <p style="color:red">  {{$errors->first('email_dependency')}} </p>
                                    @endif
                                </div>
                            </div>

                            <h5>Lista de coordinaciones</h5>
                            <div class="form-group">
                                <ul class="list-unstyled">
                                    {{--  @foreach ($departments as $item => $val )
                                        <li>
                                            <label>
                                                <input type="checkbox"
                                                    name="departments[]"
                                                    value="{{ $val->id  }}" {{ $coordination->departments->pluck('id')->contains($val->id) ? 'checked' : '' }}
                                                > {{ $val->name  }}
                                                <em><strong>( {{ $val->slug ?: 'N/A'}} )</strong></em>
                                            </label>
                                        </li>
                                    @endforeach  --}}
                                </ul>
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
                </div>
            </div>
        </div>
    </div>
@endsection
