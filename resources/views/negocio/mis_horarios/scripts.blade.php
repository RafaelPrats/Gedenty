<script>
    @if ($usuario_logeado->tipo == 'A')
        buscar_especialistas();
    @else
        get_listado();
    @endif

    function get_listado() {
        datos = {
            sucursal: $('#filtro_sucursal').val(),
            especialista: $('#filtro_especialista').val()
        }
        if (datos['especialista'] != 'N')
            get_jquery('{{ url('mis_horarios/get_listado') }}', datos, function(retorno) {
                $('#div_listado').html(retorno);
            });
        else
            $('#div_listado').html('');
    }

    function add_horario() {
        datos = {}
        get_jquery('{{ url('mis_horarios/add_horario') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Agregar Horario');
        });
    }

    function copiar_sucursal(sucursal) {
        modal_quest1(
            '<div class="text-center alert alert-info" style="color: white">Esta acción eliminará los horarios y creara un formulario nuevo en la sucursal escogida</div>',
            '100%',
            function() {
                datos = {
                    _token: '{{ csrf_token() }}',
                    paste: parseInt(sucursal),
                    copy: parseInt($('#filtro_sucursal').val()),
                }
                if (datos['copy'] != datos['paste'])
                    post_jquery_m('{{ url('mis_horarios/copiar_sucursal') }}', datos, function() {
                        cerrar_modals();
                    });
            })
    }

    function copiar_all_sucursal() {
        alert('caca ' + '{{ csrf_token() }}')
        modal_quest1(
            '<div class="text-center alert alert-info" style="color: white">Esta acción eliminará los horarios y creara un formulario nuevo en las demas sucursales</div>',
            '100%',
            function() {
                datos = {
                    _token: '{{ csrf_token() }}',
                    copy: parseInt($('#filtro_sucursal').val()),
                }
                post_jquery_m('{{ url('mis_horarios/copiar_all_sucursal') }}', datos, function() {
                    cerrar_modals();
                });
            })
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
