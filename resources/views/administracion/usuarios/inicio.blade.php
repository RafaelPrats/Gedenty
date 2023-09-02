@extends('layouts_softui.master')

@section('titulo')
    Usuarios
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
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-text bg-secondary text-white">Busqueda</span>
                <input type="text" class="form-control text-center" placeholder="Busqueda" autofocus
                    aria-label="Busqueda" aria-describedby="button-addon2" id="filtro_busqueda" maxlength="252">
                <button class="btn btn-primary mb-0" type="button" onclick="listar_reporte()">
                    <i class="fa fa-fw fa-search"></i> Buscar
                </button>
            </div>
        </div>
    </div>

    <div class="mt-3" id="div_listado"></div>
@endsection

@section('script_final')
    @include('administracion.usuarios.scripts')
@endsection
