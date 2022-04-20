@extends('layouts.CoreUi.app')
@section('title', 'Editar Almacen')
@section('content')
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Crear Permisos</h1>  -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="h3 m-0 font-weight-bold text-primary">Editar Producto almacenado
                </div>
                <div class="card-body">
                    <form action="{{ action('StorehouseController@update', $almacen->id) }}" method="POST" class="form-group">
                        @method('PUT')
                        @csrf
                        <div class="container">
                            {{-- <label class="col-md-2 col-form-label">Crear Permisos</label> --}}
                            <div class="card col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Unidad</th>
                                        <th>Concepto</th>
                                        <th>Descripcion</th>
                                    </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                    <input class="form-control col-md-2" type="text" name="cont" id="cont" hidden>
                                    <tr>
                                        <td>
                                            <input id="name" type="number" min="0"
                                                   class="form-control @error('quantity') is-invalid @enderror"
                                                   name="quantity" value="{{ $almacen->quantity}}" required autocomplete="name" autofocus>
                                            <!--             <input type="text" name="name[]" class="form-control" placeholder="Listar permisos" required></td> -->
                                            @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                                        @enderror
                                        <td><input type="text" name="unit" class="form-control" value="{{  $almacen->unit}}" required></td>
                                        <td><input type="text" name="concept" class="form-control" value="{{  $almacen->concept}}"></td>
                                        <td><input type="text" name="description" class="form-control" value="{{  $almacen->description}}"></td>

                                    </tr>
                                    </tbody>

                                </table>
                                <div class="container">
                                    <a href="{{ url()->previous() }}"  style="margin: 10px"class="btn btn-outline-danger float-right"><i class="fas fa-times-circle"></i>&nbsp;Cancelar</a>
                                    <button type="submit"  style="margin: 10px"class="btn btn-primary float-right"><i class="fas fa-check"></i> Actualizar</button>
                                </div>
                                <br>
                            </div>

                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
