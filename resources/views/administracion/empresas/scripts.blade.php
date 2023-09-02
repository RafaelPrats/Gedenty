<script>
    listar_empresas();

    function listar_empresas() {
        datos = {
            busqueda: $('#filtro_busqueda').val()
        }
        get_jquery('{{ url('empresas/listar_empresas') }}', datos, function(retorno) {
            $('#div_empresas').html(retorno);
        });
    }

    function add_empresa() {
        datos = {}
        get_jquery('{{ url('empresas/add_empresa') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Agregar Empresa');
        });
    }

    function add_sucursal() {
        datos = {}
        get_jquery('{{ url('empresas/add_sucursal') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Agregar Sucursal');
        });
    }
</script>
