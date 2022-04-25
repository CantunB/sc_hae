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
    @component('layouts.partials.breadcrumb')
        @slot('title') {{ config('app.name', 'H.A.E') }} @endslot
        @slot('subtitle') cotizaciones @endslot
        @slot('teme') nueva @endslot
    @endcomponent
    <div class="container">
        <div class="container-fluid">
            <!-- <h1 class="h3 mb-2 text-gray-800">Crear Permisos</h1>  -->
            <div class="card shadow md-12">
                <div class="card-body justify-content-center align-items-center ">
                    <form action="{{ action('QuotesrequisitionsController@new') }}" method="POST" class="form-group" enctype="multipart/form-data">
                        @method('POST')
                        @include('cotizaciones.partials.form',
                        ['cotizacion' => new HAE\Quotesrequisitions ,
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
