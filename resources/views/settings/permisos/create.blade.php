@extends('layouts.app')
@section('title', 'Crear Permisos')
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">PERMISOS</a></li>
                        <li class="breadcrumb-item active">CREAR</li>
                    </ol>
                </div>
                <h4 class="page-title">Crear de permisos</h4>
            </div>
        </div>
    </div>
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
                        <form action="{{ action('PermissionController@store') }}" method="POST" class="form-group">
                            @method('POST')
                            @include('permisos.partials.form',
                            ['permiso' => new Spatie\Permission\Models\Permission ],
                            ['btnText' => 'Guardar'])
                        </form>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end page title -->
</div> <!-- container -->

@endsection
