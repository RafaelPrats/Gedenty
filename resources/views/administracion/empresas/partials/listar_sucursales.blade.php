<input type="hidden" id="empresa_selected" value="{{ $empresa->id_empresa }}">
<div class="card">
    <div class="card-header p-0 mb-0 text-center text-xs">
        Sucursales de "<b>{{ $empresa->nombre }}</b>"
    </div>
    <div class="card-body px-0 py-0">
        <div class="table-responsive p-0 mt-0 contenedor"
            style="overflow-x: scroll; overflow-y: scroll; max-height: 500px">
            <table class="table mb-0 mt-0 w-100">
                <thead>
                    <tr class="tr_fija_top_0">
                        <th class="text-center text-xs" style="background-color: white !important;">
                            Nombre
                        </th>
                        <th class="text-center text-xs" style="background-color: white !important">
                            Estado
                        </th>
                        <th class="text-center text-xs mouse-hand text-primary"
                            style="background-color: white !important" onclick="add_sucursal()">
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
                                    value="{{ $item->nombre }}" id="nombre_suc_{{ $item->id_sucursal }}">
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
                                        onclick="update_sucursal('{{ $item->id_sucursal }}')">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </span>
                                    <span class="btn btn-lg badge badge-md bg-gradient-danger mb-0 pt-0"
                                        title="Cambiar Estado"
                                        onclick="cambiar_estado_sucursal('{{ $item->id_sucursal }}')">
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
    function update_sucursal(id) {
        datos = {
            _token: '{{ csrf_token() }}',
            id: id,
            nombre: $('#nombre_suc_' + id).val(),
        }
        post_jquery_m('{{ url('empresas/update_sucursal') }}', datos, function() {});
    }

    function cambiar_estado_sucursal(id) {
        modal_quest1(
            '<div class="text-center alert alert-info" style="color: white">¿Esta seguro de <b>CAMBIAR</b> el estado de la sucursal?</div>',
            '100%',
            function() {
                datos = {
                    _token: '{{ csrf_token() }}',
                    id: id,
                }
                post_jquery_m('{{ url('empresas/cambiar_estado_sucursal') }}', datos, function() {
                    cerrar_modals();
                    listar_sucursales($('#empresa_selected').val());
                });
            })
    }

    function listar_sucursales(emp) {
        datos = {
            emp: emp
        }
        get_jquery('{{ url('empresas/listar_sucursales') }}', datos, function(retorno) {
            $('#div_sucursales').html(retorno);
        });
    }
</script>
