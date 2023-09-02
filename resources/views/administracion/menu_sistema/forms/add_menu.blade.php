<div class="p-4 bg-secondary border-radius-16">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control text-center" placeholder="Nombre del Menu" autofocus
                    aria-label="Nombre del Menu" aria-describedby="button-addon2" id="nombre_menu" maxlength="250">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control text-center" placeholder="URL del Menu" autofocus
                    aria-label="URL del Menu" aria-describedby="button-addon2" id="url_menu" maxlength="250">
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <div class="input-group">
                <input type="text" class="form-control text-center" placeholder="Icono del Menu" autofocus
                    aria-label="Icono del Menu" aria-describedby="button-addon2" id="icono_menu" maxlength="250">
                <button class="btn btn-primary mb-0" type="button" onclick="store_menu('{{ $grupo }}')">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        $('#nombre_menu').focus();
    }, 500);

    function store_menu(grupo) {
        datos = {
            _token: '{{ csrf_token() }}',
            nombre: $('#nombre_menu').val(),
            url: $('#url_menu').val(),
            icono: $('#icono_menu').val(),
            grupo: grupo
        }
        post_jquery_m('{{ url('menu_sistema/store_menu') }}', datos, function() {
            cerrar_modals();
            seleccionar_grupo_menu(grupo);
        });
    }
</script>
