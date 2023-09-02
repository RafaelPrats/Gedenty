<div class="table-responsive p-0 mt-0 contenedor" style="overflow-x: scroll; overflow-y: scroll; max-height: 500px">
    <table class="table mb-0 mt-0 w-100">
        <thead>
            <tr class="tr_fija_top_0">
                <th class="text-center text-xs" style="background-color: white !important;">
                    <div style="min-width: 210px">
                        Nombre
                    </div>
                </th>
                <th class="text-center text-xs" style="background-color: white !important;">
                        Estado
                </th>
                <th class="text-center text-xs mouse-hand text-primary" style="background-color: white !important"
                    onclick="add_labor()">
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
                            value="{{ $item->nombre }}" id="nombre_{{ $item->id_labor }}">
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
                                onclick="update_labor('{{ $item->id_labor }}')">
                                <i class="fa fa-fw fa-edit"></i>
                            </span>
                            <span class="btn btn-lg badge badge-md bg-gradient-danger mb-0 pt-0" title="Cambiar Estado"
                                onclick="cambiar_estado_labor('{{ $item->id_labor }}')">
                                <i class="fa fa-fw fa-ban"></i>
                            </span>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function update_labor(id) {
        datos = {
            _token: '{{ csrf_token() }}',
            id: id,
            nombre: $('#nombre_' + id).val(),
        }
        post_jquery_m('{{ url('mis_labores/update_labor') }}', datos, function() {
            //listar_reporte();
        });
    }

    function cambiar_estado_labor(id) {
        modal_quest1(
            '<div class="text-center alert alert-info" style="color: white">¿Esta seguro de <b>CAMBIAR</b> el estado de la actividad?</div>',
            '100%',
            function() {
                datos = {
                    _token: '{{ csrf_token() }}',
                    id: id,
                }
                post_jquery_m('{{ url('mis_labores/cambiar_estado_labor') }}', datos, function() {
                    cerrar_modals();
                    listar_reporte();
                });
            })
    }
</script>
