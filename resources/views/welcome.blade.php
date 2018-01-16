@extends('layout')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Bienvenido...</h1>
        <p>Lista de aplicaciones</p>
        <p><a class="btn btn-primary" href="{{ route('calc:index') }}" role="button">Calculadora &raquo;</a></p>
    </div>
</div>
@endsection
