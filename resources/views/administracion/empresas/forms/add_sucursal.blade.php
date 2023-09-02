<div class="p-4 bg-secondary border-radius-16">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <input type="text" id="nombre" class="text-center form-control text-uppercase" placeholder="Nombre de la Sucursal"
                    maxlength="250" style="text-transform: uppercase">
                <button class="btn btn-primary mb-0" type="button" onclick="store_sucursal()">
                    <i class="fa fa-fw fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        $('#nombre').focus();
    }, 500);

    function store_sucursal() {
        datos = {
            _token: '{{ csrf_token() }}',
            nombre: $('#nombre').val().toUpperCase(),
            empresa: $('#empresa_selected').val()
        }
        post_jquery_m('{{ url('empresas/store_sucursal') }}', datos, function() {
            cerrar_modals();
            listar_sucursales(datos['empresa']);
        });
    }
</script>
