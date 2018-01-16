@extends('layout')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Calculadora</h1>
        <p>Calculadora de expresiones matemáticas</p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <form role="form" name="formCalc" id="formCalc" action="{{route('calc')}}" method="POST">
                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('expression') ? 'has-error' : '' }}">
                            <label for="expression">Expresión <span class="required">*</span></label>
                            <input type="text" id="expression" name="expression" class="form-control" placeholder="-1 * (2 * 6 / 3)" value="{{($expression) ? $expression : null }}" required="">
                            <div class="error">{{$errors->first('expression')}}</div>
                            <div>Resultado: <span id="resultado">{{$result}}</span></div>
                        </div>
                    </div>
                </div><!--/.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('expression') ? 'has-error' : '' }}">
                            <button type="button" onclick="calculadora();" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div><!--/.row-->
            </form>
        </div>
    </div>
    <hr>
</div> <!-- /container -->
@endsection
