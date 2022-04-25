@extends('layouts.app')
@section('title', 'Editar Coordinaciones')
@section('content')
    @component('layouts.partials.breadcrumb')
        @slot('title') {{ config('app.name', 'H.A.E') }} @endslot
        @slot('subtitle') coordinacion @endslot
        @slot('teme') actualizar @endslot
    @endcomponent
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
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
