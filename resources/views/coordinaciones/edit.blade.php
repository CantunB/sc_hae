@extends('layouts.app')
@section('title', 'Editar Coordinaciones')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'SMAPAC') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">COORDINACIONES</a></li>
                        <li class="breadcrumb-item active">EDITAR</li>
                    </ol>
                </div>
                <h4 class="page-title">Editar Coordinacion</h4>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ action('CoordinationController@update', $coordination->id) }}" method="POST" class="form-group">
                                @method('PUT')
                                @include('coordinaciones.partials.form',
                                ['btnText' => 'Actualizar'])
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

</div> <!-- container -->

@endsection
