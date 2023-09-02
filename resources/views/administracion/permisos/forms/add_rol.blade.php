<div class="p-4 bg-secondary border-radius-16">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <input type="text" class="form-control text-center" placeholder="Nombre del Rol" autofocus
                    aria-label="Nombre del Rol" aria-describedby="button-addon2" id="nombre_rol" maxlength="252">
                <button class="btn btn-primary mb-0" type="button" onclick="store_rol()">
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

    function store_rol() {
        datos = {
            _token: '{{ csrf_token() }}',
            nombre: $('#nombre_rol').val(),
        }
        post_jquery_m('{{ url('permisos/store_rol') }}', datos, function() {
            cerrar_modals();
            listar_roles();
        });
    }
</script>
