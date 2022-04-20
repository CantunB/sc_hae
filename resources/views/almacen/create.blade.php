@extends('layouts.app')
@section('title', 'Almacenar Producto')
@section('content')
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Crear Permisos</h1>  -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="h3 m-0 font-weight-bold text-primary">Nuevos productos
                </div>
                <div class="card-body">
                    <form action="{{ action('StorehouseController@store') }}" method="POST" class="form-group">
                        @method('POST')
                        @include('almacen.partials.form',
                        ['almacen' => new Smapac\Storehouse ],
                        ['btnText' => 'Guardar'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
