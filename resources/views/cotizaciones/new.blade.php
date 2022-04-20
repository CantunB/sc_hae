@extends('layouts.index')
@section('title', 'Nueva Cotizacion')
@section('content')
    <style>
        select{
            background:#fff0ff ;
            color:#4c110f;
            text-shadow:0 1px 0 rgba(0,0,0,0.5);
        }
        option:checked {
            {{--  option:is(:checked) {--}}
background-color: #00b0e8;
            color: #113049;
        }
    </style>
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Crear Permisos</h1>  -->
            <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                    <h6 class="h3 m-0 font-weight-bold text-primary">Nueva Cotizacion
                </div>
                <div class="card-body">
                    <form action="{{ action('QuotesrequisitionsController@new') }}" method="POST" class="form-group">
                        @method('POST')
                        @include('cotizaciones.partials.form',
                        ['cotizacion' => new Smapac\Quotesrequisitions ,
                         'providers',
                        'requisition',
                        'btnText' => 'Guardar',
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
