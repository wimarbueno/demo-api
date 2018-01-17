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
            <form role="form" name="formSocial" id="formSocial" class="border mb-10" action="{{route('social:filterbyuser')}}" method="POST">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="screen_name">Nombre del usuario</label>
                            <input type="text" id="screen_name" name="screen_name" class="form-control" placeholder="default: bbva" value="bbva">
                            <i>Ingrese el nombre de usuario para listar sus tweets</i>
                            <div class="error"></div>
                        </div>
                    </div>
                </div><!--/.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="button" id='btnListByUser' class="btn btn-primary">Listar por usuario</button>
                        </div>
                    </div>
                </div><!--/.row-->
            </form>

            <form role="form" name="formSearch" id="formSearch" class="border" action="{{route('social:search')}}" method="POST">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="search_tweets">Buscar tweets</label>
                            <input type="text" id="search_tweets" name="search_tweets" class="form-control" placeholder="" value="">
                        </div>
                    </div>
                </div><!--/.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="button" id='btnSearch' class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </div><!--/.row-->
            </form>
        </div>
        <div class="col-md-8">
            <h4>Lista</h4>
            <ul class="list-group social-list" id="social-list" style="max-height: 400px;overflow: auto;">
            </ul>
        </div>
    </div>
    <hr>
</div> <!-- /container -->
@endsection
