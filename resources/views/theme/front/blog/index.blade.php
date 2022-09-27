@extends('theme.front.app')
@section('contenido')
<div class="row margin-bottom-40">
    <div class="col-md-12 col-sm-12">
        <div class="content-page">
            <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->
                <div class="col-md-9 col-sm-9 blog-posts">
                    @foreach ($posts as $post)
                        @php
                            $imagen = $post->archivo ?? null;
                        @endphp
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <img class="img-responsive" alt="imagen_post"
                                    src="{{ $imagen->local ? asset("storage/$imagen->ruta") : Storage::disk('s3')->url($imagen->ruta) }}">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <h2><a href="{{ route('blog.mostrar', $post->slug) }}">{{ $post->titulo }}</a></h2>
                                <ul class="blog-info">
                                    <li><i class="fa fa-calendar"></i> {{ $post->created_at->format('d/m/Y') }}</li>
                                    <li><i class="fa fa-comments"></i> 17</li>
                                    <li><i class="fa fa-tags"></i> {{ $post->tag->implode('nombre', ', ') }}</li>
                                </ul>
                                <p>
                                    {{ $post->descripcion }}
                                </p>
                                <a href="{{ route('blog.mostrar', $post->slug) }}" class="more">Leer mas <i
                                        class="icon-angle-right"></i></a>
                            </div>
                        </div>
                        <hr class="blog-post-sep">
                    @endforeach
                        {{ $posts->links() }}ƒ
                </div>
                    @include('theme.front.blog.sidebar')
            </div>
        </div>
    </div>
</div>
@endsection
