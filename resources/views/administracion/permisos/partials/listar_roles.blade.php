<div class="card">
    <div class="card-header pb-0">
        <h6>Roles</h6>
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
                        <th class="text-center text-xs mouse-hand text-primary"
                            style="background-color: white !important" onclick="add_rol()">
                            Agregar
                            <i class="fa fa-fw fa-plus"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $item)
                        <tr class="p-0">
                            <td class="p-0">
                                <div class="text-center">
                                    <input type="text" class="text-center w-100 form-control input-height-table"
                                        value="{{ $item->nombre }}" id="nombre_rol_{{ $item->id_rol }}"
                                        onclick="listar_usuarios('{{ $item->id_rol }}'); listar_menus('{{ $item->id_rol }}')">
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
                                        onclick="update_rol('{{ $item->id_rol }}')">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </span>
                                    <span class="btn btn-lg badge badge-md bg-gradient-danger mb-0 pt-0"
                                        title="Cambiar Estado" onclick="cambiar_estado_rol('{{ $item->id_rol }}')">
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
    function update_rol(id) {
        datos = {
            _token: '{{ csrf_token() }}',
            id: id,
            nombre: $('#nombre_rol_' + id).val(),
        }
        post_jquery_m('{{ url('permisos/update_rol') }}', datos, function() {
            listar_roles();
        });
    }

    function cambiar_estado_rol(id) {
        modal_quest1(
            '<div class="text-center alert alert-info" style="color: white">¿Esta seguro de <b>CAMBIAR</b> el estado del rol?</div>',
            '100%',
            function() {
                datos = {
                    _token: '{{ csrf_token() }}',
                    id: id,
                }
                post_jquery_m('{{ url('permisos/cambiar_estado_rol') }}', datos, function() {
                    cerrar_modals();
                    listar_roles();
                });
            })
    }
</script>
