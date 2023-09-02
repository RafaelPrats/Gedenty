@extends('layouts_softui.master')

@section('titulo')
    {{ $menu->nombre }}
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
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header pb-0">
                    <div class="row mb-0 p-0">
                        <div class="col-md-2 mt-0 mb-0">
                            <h6 class="mt-0 mb-0"><i class="fa fa-fw fa-{{ $menu->icono }}"></i> Citas</h6>
                        </div>
                        <div class="col-md-{{ $usuario_logeado->tipo == 'A' ? '4' : '7' }} mt-0 mb-0 text-end">
                            <div class="input-group p-0 align-items-center" style="top: -5px">
                                <span class="input-group-text bg-secondary text-white">Sucursal</span>
                                <select class="form-control text-left ps-1 rounded-0" id="filtro_sucursal"
                                    @if ($usuario_logeado->tipo == 'A') onchange="buscar_especialistas()" @else onchange="listar_reporte();" @endif>
                                    @foreach ($mis_sucursales as $s)
                                        <option value="{{ $s->id_sucursal }}">
                                            <b>{{ $s->nombre_empresa }}</b>: {{ $s->nombre_sucursal }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if ($usuario_logeado->tipo == 'A')
                            <div class="col-md-3 mt-0 mb-0 text-end">
                                <div class="input-group p-0 align-items-center" style="top: -5px">
                                    <select class="form-control text-left ps-1 rounded-0" id="filtro_especialista">
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-3 mt-0 mb-0 text-end">
                            <div class="input-group p-0 align-items-center" style="top: -5px">
                                <input type="date" class="form-control text-center ps-1 rounded-0" id="filtro_fecha"
                                    value="{{ opDiasFecha('+', 0, hoy()) }}" required>
                                <button class="btn bg-gradient-primary mb-0" type="button" onclick="listar_reporte()">
                                    <i class="fa fa-fw fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 mt-0" id="div_listado" style="max-height: 550px">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_final')
    @include('negocio.mis_citas.scripts')
@endsection
