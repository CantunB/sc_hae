@extends('layouts.app')
@section('title', 'Crear Coordinaciones')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name','SMAPAC') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">COORDINACIONES</a></li>
                    <li class="breadcrumb-item active">CREAR </li>
                </ol>
            </div>
            <h4 class="page-title"> NUEVA COORDINACIÓN</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="table-responsive">
                    <form action="{{ action('CoordinationController@store') }}" method="POST" class="form-group">
                        @method('POST')
                        @include('coordinaciones.partials.form',
                        ['coordination' => new Smapac\Coordination ,
                        'btnText' => 'Guardar',
                        'departments'])
                    </form>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
    <!-- end row -->
@endsection
