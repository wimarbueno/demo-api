@extends('layout')

@section('title')Calculadora de expresiones matemáticas @endsection

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Calculadora</h1>
        <p>Calculadora de expresiones matemáticas</p>
        <p>Para hacer pruebas usar este URL: {{route('calc')}}</p>
        <p>Ejemplo:
            <code>
                {"expression": "-1 * (2 * 6 / 3)"}
            </code>
        </p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h4>Historial</h4>
            <ul class="list-group" id="historial-list" style="max-height: 400px;overflow: auto;">

            </ul>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12" id="message"></div>
            </div>

            <form role="form" name="formCalc" id="formCalc" action="{{route('calc')}}" method="POST">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('expression') ? 'has-error' : '' }}">
                            <label for="expression">Expresión <span class="required">*</span></label>
                            <input type="text" id="expression" name="expression" class="form-control" placeholder="-1 * (2 * 6 / 3)" value="" required="">
                            <div class="error">{{$errors->first('expression')}}</div>
                            <div>Resultado: <span id="resultado"></span></div>
                        </div>
                    </div>
                </div><!--/.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('expression') ? 'has-error' : '' }}">
                            <button type="button" id='btnSend' class="btn btn-primary">Calcular</button>
                        </div>
                    </div>
                </div><!--/.row-->
            </form>
        </div>
    </div>
    <hr>
</div> <!-- /container -->
@endsection
