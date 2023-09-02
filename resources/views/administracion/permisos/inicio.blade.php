@extends('layouts_softui.master')

@section('titulo')
    Permisos
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item text-sm text-dark" aria-current="page">
        {{ $menu->grupo_menu->nombre }}
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
        <a href="javascript:void(0)" onclick="cargar_url('{{ $url }}')">
            <i class="fa fa-fw fa-refresh"></i> {{ $menu->nombre }}
        </a>
    </li>
@endsection

@section('contenido')
    <div class="row mt-2">
        <div class="col-4" id="div_roles">

        </div>
        <div class="col-4" id="div_menus">

        </div>
        <div class="col-4" id="div_usuarios">

        </div>
    </div>
@endsection

@section('script_final')
    @include('administracion.permisos.scripts')
@endsection
