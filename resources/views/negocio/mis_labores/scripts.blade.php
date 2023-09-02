<script>
    listar_reporte();

    function listar_reporte() {
        datos = {
            especialista: $('#filtro_especialista').val(),
        }
        get_jquery('{{ url('mis_labores/listar_reporte') }}', datos, function(retorno) {
            $('#div_listado').html(retorno);
        });
    }

    function add_labor() {
        datos = {
        }
        get_jquery('{{ url('mis_labores/add_labor') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Agregar actividad');
        });
    }
</script>
