<div class="p-4 bg-secondary border-radius-16">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <select class="form-control text-center" autofocus id="select_grupo" onchange="select_grupo_menu()">
                    <option value="">Seleccione el GRUPO</option>
                    @foreach ($grupos as $item)
                        <option value="{{ $item->id_grupo_menu }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <select class="form-control text-center" autofocus id="select_menu">
                    <option value="">Seleccione el MENU</option>
                </select>
                <button class="btn btn-primary mb-0" type="button" onclick="store_menu()">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        $('#nombre_rol').focus();
    }, 500);

    function store_menu() {
        datos = {
            _token: '{{ csrf_token() }}',
            menu: $('#select_menu').val(),
            rol: $('#rol_selected').val(),
        }
        post_jquery_m('{{ url('permisos/store_menu') }}', datos, function() {
            cerrar_modals();
            listar_menus(datos['rol']);
        });
    }

    function select_grupo_menu() {
        datos = {
            _token: '{{ csrf_token() }}',
            grupo: $('#select_grupo').val(),
            rol: $('#rol_selected').val()
        }
        if (datos['grupo'] == '') {
            $('#select_menu').html('');
        } else {
            overlayTrue('select_menu');
            $.post('{{ url('permisos/select_grupo_menu') }}', datos, function(retorno) {
                $('#select_menu').html(retorno.options);
            }, 'json').fail(function(retorno) {
                console.log(retorno);
                alerta(retorno.responseText);
            }).always(function() {
                overlayFalse('select_menu');
            });
        }
    }
</script>
