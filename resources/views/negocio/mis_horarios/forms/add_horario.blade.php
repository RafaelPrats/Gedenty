<div class="p-4 bg-secondary border-radius-16">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-gradient-dark text-white">Desde</span>
                <input type="time" id="desde" class="text-center form-control" placeholder="Desde">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-gradient-dark text-white">Hasta</span>
                <input type="time" id="hasta" class="text-center form-control">
                <button class="btn btn-primary mb-0" type="button" onclick="store_horario()">
                    <i class="fa fa-fw fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        $('#desde').focus();
    }, 500);

    function store_horario() {
        datos = {
            _token: '{{ csrf_token() }}',
            desde: $('#desde').val(),
            hasta: $('#hasta').val(),
            sucursal: $('#filtro_sucursal').val(),
            especialista: $('#filtro_especialista').val()
        }
        post_jquery_m('{{ url('mis_horarios/store_horario') }}', datos, function() {
            cerrar_modals();
            get_listado();
        });
    }
</script>
