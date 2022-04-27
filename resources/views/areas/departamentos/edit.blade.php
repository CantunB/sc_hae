@extends('layouts.app')
@section('title', 'Actualizar Departamento')
@section('content')
@component('layouts.partials.breadcrumb')
        @slot('title') {{ config('app.name', 'H.A.E') }} @endslot
        @slot('subtitle') departamentos @endslot
        @slot('teme') actualizar @endslot
    @endcomponent
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Crear Permisos</h1>  -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('departamentos.update',$department->id ) }}" method="POST" class="form-group">
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
