@extends('layouts.app')
@section('title', 'Actualizar Departamento')
@section('content')
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Crear Permisos</h1>  -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="h3 m-0 font-weight-bold text-primary">Actualizar departamento
                </div>
                <div class="card-body">
                    <form action="{{ action('DepartmentController@update',$department->id ) }}" method="POST" class="form-group">
                        @method('PUT')
                        @include('departamentos.partials.form',
                        ['department',
                        'btnText' => 'Guardar'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
