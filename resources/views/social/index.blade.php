@extends('layout')

@section('title') Twitter API @endsection

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Twitter API</h1>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12" id="message"></div>
            </div>

            <form role="form" name="formSocial" id="formSocial" action="{{route('social:filter')}}" method="POST">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="expression">Expresión <span class="required">*</span></label>
                            <input type="text" id="expression" name="expression" class="form-control" placeholder="-1 * (2 * 6 / 3)" value="" required="">
                            <div class="error"></div>
                            <div>Resultado: <span id="resultado"></span></div>
                        </div>
                    </div>
                </div><!--/.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="button" id='btnSendSocial' class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div><!--/.row-->
            </form>
        </div>
        <div class="col-md-8">
            <h4>Lista</h4>
            <ul class="list-group social-list" id="social-list" style="max-height: 400px;overflow: auto;">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </div>
                    <div class="by">WilzonMB</div>
                    <span class="badge badge-primary badge-pill">155</span>
                     <small>3 days ago</small>
                </li>
            </ul>
        </div>
    </div>
    <hr>
</div> <!-- /container -->
@endsection
