<div class="p-4 bg-secondary border-radius-16">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <input type="text" class="form-control text-center" placeholder="Nombre del Grupo Menu" autofocus
                    aria-label="Nombre del Grupo Menu" aria-describedby="button-addon2" id="nombre_grupo_menu"
                    maxlength="252">
                <button class="btn btn-primary mb-0" type="button" onclick="store_grupo_menu()">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        $('#nombre_grupo_menu').focus();
    }, 500);

    function store_grupo_menu() {
        datos = {
            _token: '{{ csrf_token() }}',
            nombre: $('#nombre_grupo_menu').val(),
        }
        post_jquery_m('{{ url('menu_sistema/store_grupo_menu') }}', datos, function() {
            overlayTrue();
            cargar_url('menu_sistema');
        });
    }
</script>
