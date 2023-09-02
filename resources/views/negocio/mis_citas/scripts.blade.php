<script>
    @if ($usuario_logeado->tipo == 'A')
        buscar_especialistas();
    @else
        listar_reporte();
    @endif

    function listar_reporte() {
        datos = {
            sucursal: $('#filtro_sucursal').val(),
            fecha: $('#filtro_fecha').val(),
            especialista: $('#filtro_especialista').val(),
        }
        if (datos['especialista'] != 'N')
            get_jquery('{{ url('mis_citas/listar_reporte') }}', datos, function(retorno) {
                $('#div_listado').html(retorno);
            });
        else
            $('#div_listado').html('');
    }

    function buscar_especialistas() {
        datos = {
            _token: '{{ csrf_token() }}',
            sucursal: $('#filtro_sucursal').val()
        }
        overlayTrue('#filtro_especialista');
        $.post('{{ url('mis_horarios/buscar_especialistas') }}', datos, function(retorno) {
            $('#filtro_especialista').html(retorno.options);
            $('#div_listado').html('');
        }, 'json').fail(function(retorno) {
            console.log(retorno);
            alerta(retorno.responseText);
            alert('Ha ocurrido un problema al enviar la información');
        }).always(function() {
            overlayFalse('#filtro_especialista');
        });
    }
</script>
