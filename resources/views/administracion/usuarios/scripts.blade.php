<script>
    listar_reporte();

    function listar_reporte() {
        datos = {
            busqueda: $('#filtro_busqueda').val()
        }
        get_jquery('{{ url('usuarios/listar_reporte') }}', datos, function(retorno) {
            $('#div_listado').html(retorno);
        });
    }

    function add_usuario() {
        datos = {}
        get_jquery('{{ url('usuarios/add_usuario') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Agregar Usuario');
        });
    }
</script>
