@extends('layouts.app')
@section('content')
    <form action="{{ route('ordenes.ordenes') }}" method="POST">
        @csrf
        @method('POST')
        <input name="array[]">
        <input name="array[]">


        <button type="submit" class="btn btn-info"> enviar</button>
    </form>
@endsection
