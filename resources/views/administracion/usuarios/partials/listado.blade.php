<div class="card">
    <div class="card-body px-0 py-0">
        <div class="table-responsive p-0 mt-0 contenedor"
            style="overflow-x: scroll; overflow-y: scroll; max-height: 500px">
            <table class="table mb-0 mt-0 w-100">
                <thead>
                    <tr class="tr_fija_top_0">
                        <th class="text-center text-xs" style="background-color: white !important; width: 210px">
                            <div style="width: 210px">
                                Nombre
                            </div>
                        </th>
                        <th class="text-center text-xs" style="background-color: white !important; width: 90px">
                            <div style="width: 90px">
                                Usuario
                            </div>
                        </th>
                        <th class="text-center text-xs" style="background-color: white !important; width: 210px">
                            <div style="width: 210px">
                                Correo
                            </div>
                        </th>
                        <th class="text-center text-xs" style="background-color: white !important; width: 100px">
                            <div style="width: 100px">
                                Tipo
                            </div>
                        </th>
                        <th class="text-center text-xs" style="background-color: white !important">
                            Estado
                        </th>
                        <th class="text-center text-xs" style="background-color: white !important; width: 210px">
                            <div style="width: 210px">
                                Password
                            </div>
                        </th>
                        <th class="text-center text-xs mouse-hand text-primary"
                            style="background-color: white !important" onclick="add_usuario()">
                            Agregar
                            <i class="fa fa-fw fa-plus"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listado as $item)
                        <tr class="p-0">
                            <td class="p-0 text-center">
                                <input type="text" class="text-center w-100 form-control input-height-table"
                                    value="{{ $item->nombre_completo }}" id="nombre_{{ $item->id_usuario }}">
                            </td>
                            <td class="p-0 text-center">
                                <input type="text" class="text-center w-100 form-control input-height-table"
                                    value="{{ $item->username }}" id="username_{{ $item->id_usuario }}">
                            </td>
                            <td class="p-0 text-center">
                                <input type="text" class="text-center w-100 form-control input-height-table"
                                    value="{{ $item->correo }}" id="correo_{{ $item->id_usuario }}">
                            </td>
                            <td class="p-0 text-center">
                                <select class="text-center w-100 form-control input-height-table pt-0"
                                    id="tipo_{{ $item->id_usuario }}">
                                    <option value="E" {{ $item->tipo == 'E' ? 'selected' : '' }}>
                                        Especialista
                                    </option>
                                    <option value="A" {{ $item->tipo == 'A' ? 'selected' : '' }}>
                                        Asistente
                                    </option>
                                    <option value="M" {{ $item->tipo == 'M' ? 'selected' : '' }}>
                                        Mixto
                                    </option>
                                </select>
                            </td>
                            <td class="text-center text-xs p-0">
                                <span
                                    class="badge badge-sm bg-gradient-{{ $item->estado == 1 ? 'success' : 'danger' }} mt-1">
                                    {{ $item->estado == 1 ? 'ACTIVO' : 'INACTIVO' }}
                                </span>
                            </td>
                            <td class="p-0 text-center">
                                <input type="password" class="text-center w-100 form-control input-height-table"
                                    id="passw_{{ $item->id_usuario }}" placeholder="Contraseña">
                            </td>
                            <td class="text-center text-xs p-0">
                                <div class="btn-group input-height-table">
                                    <span class="btn btn-lg badge badge-md bg-gradient-primary mb-0 pt-0" title="Editar"
                                        onclick="update_usuario('{{ $item->id_usuario }}')">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </span>
                                    <span class="btn btn-lg badge badge-md bg-gradient-secondary mb-0 pt-0"
                                        title="Empresas del Usuario"
                                        onclick="empresas_usuario('{{ $item->id_usuario }}')">
                                        <i class="fa fa-fw fa-building"></i>
                                    </span>
                                    <span class="btn btn-lg badge badge-md bg-gradient-danger mb-0 pt-0"
                                        title="Cambiar Estado"
                                        onclick="cambiar_estado_usuario('{{ $item->id_usuario }}')">
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
    function update_usuario(id) {
        datos = {
            _token: '{{ csrf_token() }}',
            id: id,
            nombre: $('#nombre_' + id).val(),
            username: $('#username_' + id).val(),
            tipo: $('#tipo_' + id).val(),
            correo: $('#correo_' + id).val(),
            passw: $('#passw_' + id).val(),
        }
        post_jquery_m('{{ url('usuarios/update_usuario') }}', datos, function() {
            //listar_reporte();
            $('#passw_' + id).val('');
        });
    }

    function cambiar_estado_usuario(id) {
        modal_quest1(
            '<div class="text-center alert alert-info" style="color: white">¿Esta seguro de <b>CAMBIAR</b> el estado del usuario?</div>',
            '100%',
            function() {
                datos = {
                    _token: '{{ csrf_token() }}',
                    id: id,
                }
                post_jquery_m('{{ url('usuarios/cambiar_estado_usuario') }}', datos, function() {
                    cerrar_modals();
                    listar_reporte();
                });
            })
    }

    function empresas_usuario(user) {
        datos = {
            usuario: user
        }
        get_jquery('{{ url('usuarios/empresas_usuario') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Empresas del Usuario');
        });
    }
</script>
