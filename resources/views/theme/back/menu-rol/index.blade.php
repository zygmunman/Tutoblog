@extends('theme.back.app')
@section("titulo")
Menú Rol
@endsection

@section("scripts")
<script src="{{asset("assets/back/js/scripts/menu-rol/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    @csrf
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="text-white float-left">Menú Rol</h5>
                <a href="{{route('menu.crear')}}" class="btn btn-outline-light btn-sm float-right">Crear menú</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <th>Menú</th>
                        @foreach ($roles as $rol)
                            <th class="text-center">{{$rol->nombre}}</th>
                        @endforeach
                    </thead>
                    <tbody>
                        @foreach ($menus as $key => $menu)
                            @if ($menu["menu_id"] != null)
                                @break
                            @endif
                            @include('theme.back.menu-rol.item-menu', ['menu' => $menu, 'hijo' => 'no'])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
