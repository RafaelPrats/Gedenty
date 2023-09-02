<script>
    listar_roles();

    function listar_roles() {
        datos = {}
        get_jquery('{{ url('permisos/listar_roles') }}', datos, function(retorno) {
            $('#div_roles').html(retorno);
        });
    }

    function listar_usuarios(rol) {
        datos = {
            rol: rol
        }
        get_jquery('{{ url('permisos/listar_usuarios') }}', datos, function(retorno) {
            $('#div_usuarios').html(retorno);
        });
    }

    function listar_menus(rol) {
        datos = {
            rol: rol
        }
        get_jquery('{{ url('permisos/listar_menus') }}', datos, function(retorno) {
            $('#div_menus').html(retorno);
        });
    }

    function add_rol() {
        datos = {}
        get_jquery('{{ url('permisos/add_rol') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Agregar Rol');
        });
    }
</script>
