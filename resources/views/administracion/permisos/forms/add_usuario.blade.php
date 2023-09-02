<div class="p-4 bg-secondary border-radius-16">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <select class="form-control text-center" autofocus id="usuario_rol">
                    <option value="">Seleccione el USUARIO</option>
                    @foreach ($usuarios as $u)
                        <option value="{{ $u->id_usuario }}">{{ $u->nombre_completo }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary mb-0" type="button" onclick="store_usuario()">
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

    function store_usuario() {
        datos = {
            _token: '{{ csrf_token() }}',
            usuario: $('#usuario_rol').val(),
            rol: $('#rol_selected').val(),
        }
        post_jquery_m('{{ url('permisos/store_usuario') }}', datos, function() {
            cerrar_modals();
            listar_usuarios(datos['rol']);
        });
    }
</script>
