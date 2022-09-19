@extends('theme.front.app')

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @if ($mensaje = session("mensaje"))
            <x-alert tipo="success" :mensaje="$mensaje"/>
        @endif
        <h1>Aquí va el contenido</h1>
    </div>
</div>
@endsection
