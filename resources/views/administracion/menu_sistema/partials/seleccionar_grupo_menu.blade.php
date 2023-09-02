<div class="card">
    <div class="card-header pb-0">
        <h6>Menus de "{{ $grupo->nombre }}"</h6>
    </div>
    <div class="card-body px-0 py-0">
        <div class="table-responsive p-0 mt-0 contenedor" style="overflow-x: scroll; overflow-y: scroll; max-height: 500px">
            <table class="table mb-0 mt-0 w-100">
                <thead>
                    <tr class="tr_fija_top_0">
                        <th class="text-center text-xs" style="background-color: white !important">
                            Nombre
                        </th>
                        <th class="text-center text-xs" style="background-color: white !important">
                            Icono
                        </th>
                        <th class="text-center text-xs" style="background-color: white !important">
                            URL
                        </th>
                        <th class="text-center text-xs" style="background-color: white !important">
                            Estado
                        </th>
                        <th class="text-center text-xs mouse-hand text-primary" style="background-color: white !important"
                            onclick="add_menu('{{ $grupo->id_grupo_menu }}')">
                            Agregar
                            <i class="fa fa-fw fa-plus"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grupo->menus as $item)
                        <tr class="p-0">
                            <td class="p-0">
                                <div class="text-center">
                                    <input type="text" class="text-center w-100 form-control input-height-table"
                                        value="{{ $item->nombre }}" id="nombre_menu_{{ $item->id_menu }}">
                                </div>
                            </td>
                            <td class="p-0">
                                <div class="text-center">
                                    <input type="text" class="text-center w-100 form-control input-height-table"
                                        value="{{ $item->icono }}" id="icono_menu_{{ $item->id_menu }}">
                                </div>
                            </td>
                            <td class="p-0">
                                <div class="text-center">
                                    <input type="text" class="text-center w-100 form-control input-height-table"
                                        value="{{ $item->url }}" id="url_menu_{{ $item->id_menu }}">
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
                                    <span class="btn btn-lg badge badge-md bg-gradient-primary mb-0 pt-0" title="Editar"
                                        onclick="update_menu('{{ $item->id_menu }}')">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </span>
                                    <span class="btn btn-lg badge badge-md bg-gradient-danger mb-0 pt-0"
                                        title="Cambiar Estado"
                                        onclick="cambiar_estado_menu('{{ $item->id_menu }}', '{{ $grupo->id_grupo_menu }}')">
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

<script>
    function cambiar_estado_menu(id, grupo) {
        modal_quest1(
            '<div class="text-center alert alert-info" style="color: white">¿Esta seguro de <b>CAMBIAR</b> el estado del menu?</div>',
            '100%',
            function() {
                datos = {
                    _token: '{{ csrf_token() }}',
                    id: id,
                }
                post_jquery_m('{{ url('menu_sistema/cambiar_estado_menu') }}', datos, function() {
                    cerrar_modals();
                    seleccionar_grupo_menu(grupo);
                });
            })
    }
</script>
