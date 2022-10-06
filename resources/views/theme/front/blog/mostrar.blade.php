@php
$imagen = $post->archivo ?? null;
@endphp
@extends('theme.front.app')

@section('scripts')
    <script src="{{ asset('assets/front/pages/scripts/comentario.js') }}" type="text/javascript"></script>
@endsection

@section('contenido')
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
        <!-- BEGIN CONTENT -->
        <div class="col-md-12 col-sm-12">
            @if ($mensaje = session('mensaje'))
                <x-alert tipo="success" :mensaje="$mensaje" />
            @endif
            @if ($errors->any())
                <x-alert tipo="danger" :mensaje="$errors" />
            @endif
            <h1>{{ $post->titulo }}</h1>
            <div class="content-page">
                <div class="row">
                    <!-- BEGIN LEFT SIDEBAR -->
                    <div class="col-md-9 col-sm-9 blog-item">
                        <div class="blog-item-img">
                            <div class="front-carousel">
                                <div id="myCarousel" class="carousel slide">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img  height="500 px" width="450 px"
                                            src="{{ $imagen->local ? asset("storage/$imagen->ruta") : Storage::disk('s3')->url($imagen->ruta) }}" alt="">
                                        </div>
                                    </div>
                                    <!-- Carousel nav -->
                                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {!! $post->contenido !!}
                        <ul class="blog-info">
                            <li><i class="fa fa-user"></i> Usuario: {{ $post->usuario->nombre }}</li>
                            <li><i class="fa fa-calendar"></i> {{ $post->created_at->format('d/m/Y') }}</li>
                            <li><i class="fa fa-comments"></i> 17</li>
                            <li><i class="fa fa-tags"></i> {{ $post->tag->implode('nombre', ', ') }}</li>
                        </ul>
                        <h2>Comentarios</h2>
                        <div class="comments">
                            @forelse ($post->comentario->whereNull('comentario_id') as $comentario)
                                @include('theme.front.blog.comentario')
                            @empty
                                No hay comentarios
                            @endforelse
                        </div>
                        @if (Auth::check())
                            @include('theme.front.blog.comentario-form')
                        @endif
                    </div>
                    @include('theme.front.blog.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
