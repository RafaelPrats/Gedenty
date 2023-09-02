<div class="p-4 bg-secondary border-radius-16">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <input type="text" id="nombre" class="text-center form-control" placeholder="Nombre de la actividad"
                    maxlength="250">
                <button class="btn btn-primary mb-0" type="button" onclick="store_labor()">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        $('#nombre').focus();
    }, 500);

    function store_labor() {
        datos = {
            _token: '{{ csrf_token() }}',
            nombre: $('#nombre').val(),
            especialista: $('#filtro_especialista').val(),
        }
        post_jquery_m('{{ url('mis_labores/store_labor') }}', datos, function() {
            cerrar_modals();
            listar_reporte();
        });
    }
</script>
