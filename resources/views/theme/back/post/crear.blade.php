@extends('theme.back.app')
@section('titulo')
   Sistema Post
@endsection

@section('styles')
    <link href="{{asset("assets/back/extra-libs/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/back/libs/select2/dist/css/select2.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/back/libs/quill/dist/quill.snow.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section('scriptsPlugins')
    <script src="{{asset("assets/back/extra-libs/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/back/extra-libs/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/back/extra-libs/bootstrap-fileinput/themes/fa6/theme.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/back/libs/select2/dist/js/select2.full.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/back/libs/select2/dist/js/i18n/es.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/back/libs/quill/dist/quill.min.js")}}" type="text/javascript"></script>
@endsection

@section('scripts')
    <script src="{{asset("assets/back/js/scripts/post/crear.js")}}"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            @if ($mensaje = session("mensaje"))
                <x-alert tipo="success" :mensaje = "mensaje"/>
            @endif
            @if ($errors->any())
                <x-alert tipo="danger" :mensaje ="$errors"/>
            @endif
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="text-white float-left">Crear post</h5>
                    <a href="{{route("post")}}" class="btn btn-outline-light btn-sm float-right">Volver al listado</a>
                </div>
                <form action="{{route('post.guardar')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    @include('theme.back.post.form')
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
