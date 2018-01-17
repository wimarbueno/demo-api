@extends('layout')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Bienvenido...</h1>
        <p>Lista de aplicaciones</p>
        <p>
            <a class="btn btn-primary" href="{{ route('calc:index') }}" role="button">Calculadora &raquo;</a>
            <a class="btn btn-primary" href="{{ route('social:index') }}" role="button">Twitter API &raquo;</a>
        </p>

    </div>
</div>
@endsection
