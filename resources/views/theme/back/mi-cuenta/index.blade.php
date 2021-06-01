@extends('theme.back.app')

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @if ($mensaje = session("mensaje"))
            <x-alert tipo="success" :mensaje="$mensaje"/>
        @endif
        <div>
            Estamos en mi cuenta
        </div>
    </div>
</div>
@endsection
