<input type="hidden" id="rol_selected" value="{{ $rol->id_rol }}">
<div class="card">
    <div class="card-header pb-0">
        <h6>Usuarios</h6>
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
                        <th class="text-center text-xs mouse-hand text-primary"
                            style="background-color: white !important" onclick="add_usuario()">
                            Agregar
                            <i class="fa fa-fw fa-plus"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rol->usuarios as $item)
                        <tr class="p-0">
                            <th class="p-0 text-center" colspan="2">
                                {{ $item->nombre_completo }}
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function add_usuario() {
        datos = {
            rol: $('#rol_selected').val()
        }
        get_jquery('{{ url('permisos/add_usuario') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Agregar Usuario al Rol');
        });
    }
</script>
