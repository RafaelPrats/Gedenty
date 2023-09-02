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
    <div class="row mt-2">
        <div class="col-5">
            <div class="card">
                <div class="card-header pb-0">
                    <h6><i class="fa fa-fw fa-{{ $menu->icono }}"></i> Grupos de Menu</h6>
                </div>
                <div class="card-body px-0 py-0">
                    <div class="table-responsive p-0 mt-0 contenedor"
                        style="overflow-x: scroll; overflow-y: scroll; max-height: 500px">
                        <table class="table mb-0 mt-0 w-100">
                            <thead>
                                <tr class="tr_fija_top_0">
                                    <th class="text-center text-xs" style="background-color: white !important">
                                        Nombre
                                    </th>
                                    <th class="text-center text-xs" style="background-color: white !important">
                                        Estado
                                    </th>
                                    <th class="text-center text-xs mouse-hand text-primary" onclick="add_grupo_menu()"
                                        style="background-color: white !important">
                                        Agregar
                                        <i class="fa fa-fw fa-plus"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grupos_menu as $item)
                                    <tr class="p-0">
                                        <td class="p-0">
                                            <div class="text-center">
                                                <input type="text"
                                                    class="text-center w-100 form-control input-height-table"
                                                    value="{{ $item->nombre }}" id="nombre_grupo_{{ $item->id_grupo_menu }}"
                                                    onclick="seleccionar_grupo_menu('{{ $item->id_grupo_menu }}')">
                                            </div>
                                        </td>
                                        <td class="text-center text-xs p-0">
                                            <span
                                                class="badge badge-sm bg-gradient-{{ $item->estado == 1 ? 'success' : 'danger' }} mt-1">
                                                {{ $item->estado == 1 ? 'ACTIVO' : 'INACTIVO' }}
                                            </span>
                                        </td>
                                        <td class="text-center text-xs p-0">
                                            <div class="btn-group input-height-table">
                                                <span class="btn btn-lg badge badge-md bg-gradient-primary mb-0 pt-0"
                                                    title="Editar"
                                                    onclick="update_grupo_menu('{{ $item->id_grupo_menu }}')">
                                                    <i class="fa fa-fw fa-edit"></i>
                                                </span>
                                                <span class="btn btn-lg badge badge-md bg-gradient-danger mb-0 pt-0"
                                                    title="Cambiar Estado"
                                                    onclick="cambiar_estado_grupo_menu('{{ $item->id_grupo_menu }}')">
                                                    <i class="fa fa-fw fa-ban"></i>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7" id="div_menus">

        </div>
    </div>
@endsection

@section('script_final')
    @include('administracion.menu_sistema.scripts')
@endsection
