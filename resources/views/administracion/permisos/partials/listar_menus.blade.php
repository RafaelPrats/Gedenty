<div class="card">
    <div class="card-header pb-0">
        <h6>Menus</h6>
    </div>
    <div class="card-body px-0 py-0">
        <div class="table-responsive p-0 mt-0 contenedor"
            style="overflow-x: scroll; overflow-y: scroll; max-height: 500px">
            <table class="table mb-0 mt-0 w-100">
                <thead>
                    <tr class="tr_fija_top_0">
                        <th class="text-center text-xs" style="background-color: white !important">
                            Grupo
                        </th>
                        <th class="text-center text-xs" style="background-color: white !important">
                            Menu
                        </th>
                        <th class="text-center text-xs mouse-hand text-primary"
                            style="background-color: white !important" onclick="add_menu()">
                            Agregar
                            <i class="fa fa-fw fa-plus"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rol->menus as $item)
                        <tr class="p-0">
                            <th class="px-1 text-center text-xs">
                                {{ $item->menu->grupo_menu->nombre }}
                            </th>
                            <th class="px-1 text-center text-xs">
                                {{ $item->menu->nombre }}
                            </th>
                            <th class="px-1 text-center text-xs pt-0">
                                <span class="btn btn-lg badge badge-md bg-gradient-danger mb-0 pt-0" title="Eliminar"
                                    onclick="eliminar_rol_menu('{{ $item->id_rol_menu }}')">
                                    <i class="fa fa-fw fa-trash"></i>
                                </span>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function add_menu() {
        datos = {
            rol: $('#rol_selected').val()
        }
        get_jquery('{{ url('permisos/add_menu') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Agregar Usuario al Rol');
        });
    }

    function eliminar_rol_menu(id) {
        modal_quest1(
            '<div class="text-center alert alert-info" style="color: white">¿Esta seguro de <b>ELIMINAR</b> el menu del rol?</div>',
            '100%',
            function() {
                datos = {
                    _token: '{{ csrf_token() }}',
                    id: id
                }
                post_jquery_m('{{ url('permisos/eliminar_rol_menu') }}', datos, function(retorno) {
                    listar_menus($('#rol_selected').val())
                    cerrar_modals();
                });
            })
    }
</script>
