@extends('layouts.app')
@section('title', 'Lista de compras')
@section('content')
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Usuarios</h1> -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="h3 m-0 font-weight-bold text-primary"> @yield('title', 'Lista')
                        @yield('button')
                    {{--
                        @can('requisitions.create')
                            <a href="{{ route('requisiciones.create') }}"
                               class="btn btn-sm btn-primary float-right">Crear</a>
                        @endcan</h6>
                       --}}
                </div>
                <div class="card-body">
                    @yield('contenido')
                </div>
            </div>
        </div>
    </div>
@endsection
