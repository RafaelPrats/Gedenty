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
                        <div class="col-md-3 mt-0 mb-0">
                            <h6 class="mt-0 mb-0"><i class="fa fa-fw fa-{{ $menu->icono }}"></i> Horarios</h6>
                        </div>
                        <div class="col-md-9 mt-0 mb-0 text-end">
                            <table class="w-100 p-0 m-0">
                                <tr>
                                    <td>
                                        <div class="input-group p-0 align-items-center" style="top: -5px">
                                            <span class="input-group-text bg-secondary text-white">Sucursal</span>
                                            <select class="form-control text-left ps-1 rounded-0" id="filtro_sucursal"
                                                @if ($usuario_logeado->tipo == 'A') onchange="buscar_especialistas()" @else onchange="get_listado();" @endif>
                                                @foreach ($mis_sucursales as $s)
                                                    <option value="{{ $s->id_sucursal }}">
                                                        <b>{{ $s->nombre_empresa }}</b>: {{ $s->nombre_sucursal }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($usuario_logeado->tipo != 'A')
                                                <button class="btn bg-gradient-primary dropdown-toggle" type="button"
                                                    style="top: 8px" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    {{-- <i class="fa fa-fw fa-ellipsis-v"></i> --}}
                                                    <i class="fa fa-fw fa-copy"></i>
                                                </button>
                                                <ul class="dropdown-menu shadow blur shadow-blur dropdown-menu-left"
                                                    aria-labelledby="dropdownMenuButton">
                                                    @foreach ($mis_sucursales as $s)
                                                        <li onmouseover="$(this).addClass('bg-gradient-secondary')"
                                                            onmouseleave="$(this).removeClass('bg-gradient-secondary')">
                                                            <a class="dropdown-item" href="javascript:void(0)"
                                                                onclick="copiar_sucursal('{{ $s->id_sucursal }}')">
                                                                Copiar a <b>{{ $s->nombre_empresa }}:
                                                                    {{ $s->nombre_sucursal }}</b>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    <div class="dropdown-divider m-1"></div>
                                                    <li class="text-center"
                                                        onmouseover="$(this).addClass('bg-gradient-secondary')"
                                                        onmouseleave="$(this).removeClass('bg-gradient-secondary')">
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            onclick="copiar_all_sucursal()">
                                                            <b><i class="fa fa-fw fa-copy"></i>Copiar a todas mis
                                                                sucursales</b>
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endif
                                        </div>
                                    </td>
                                    @if ($usuario_logeado->tipo == 'A')
                                        <td>
                                            <div class="input-group p-0 align-items-center" style="top: -5px">
                                                <select class="form-control text-left ps-1 rounded-0"
                                                    id="filtro_especialista" onchange="get_listado()">
                                                </select>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 mt-0" id="div_listado" style="height: 550px">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script_final')
    @include('negocio.mis_horarios.scripts')
@endsection
