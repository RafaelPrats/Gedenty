<script>
    function add_grupo_menu() {
        datos = {}
        get_jquery('{{ url('menu_sistema/add_grupo_menu') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Agregar Grupo Menu');
        });
    }

    function update_grupo_menu(id) {
        datos = {
            _token: '{{ csrf_token() }}',
            id: id,
            nombre: $('#nombre_grupo_' + id).val(),
        }
        post_jquery_m('{{ url('menu_sistema/update_grupo_menu') }}', datos, function() {});
    }

    function cambiar_estado_grupo_menu(id) {
        modal_quest1(
            '<div class="text-center alert alert-info" style="color: white">¿Esta seguro de <b>CAMBIAR</b> el estado del grupo?</div>',
            '100%',
            function() {
                datos = {
                    _token: '{{ csrf_token() }}',
                    id: id,
                }
                post_jquery_m('{{ url('menu_sistema/cambiar_estado_grupo_menu') }}', datos, function() {
                    cerrar_modals();
                    cargar_url('menu_sistema');
                });
            })
    }

    function seleccionar_grupo_menu(id) {
        datos = {
            id: id
        }
        get_jquery('{{ url('menu_sistema/seleccionar_grupo_menu') }}', datos, function(retorno) {
            $('#div_menus').html(retorno);
        });
    }

    function add_menu(grupo) {
        datos = {
            grupo: grupo
        }
        get_jquery('{{ url('menu_sistema/add_menu') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Agregar Menu');
        });
    }

    function update_menu(id) {
        datos = {
            _token: '{{ csrf_token() }}',
            id: id,
            nombre: $('#nombre_menu_' + id).val(),
            url: $('#url_menu_' + id).val(),
            icono: $('#icono_menu_' + id).val(),
        }
        post_jquery_m('{{ url('menu_sistema/update_menu') }}', datos, function() {

        });
    }
</script>
