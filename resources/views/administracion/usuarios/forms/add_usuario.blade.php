<div class="p-4 bg-secondary border-radius-16">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" id="nombre_completo" class="text-center form-control" placeholder="Nombre completo"
                    maxlength="250">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" id="username" class="text-center form-control" placeholder="nombre_de_usuario"
                    maxlength="250" style="text-transform: lowercase">
            </div>
        </div>
        <div class="col-md-6 mt-1">
            <div class="input-group">
                <input type="email" id="correo" class="text-center form-control" placeholder="Correo"
                    maxlength="250">
            </div>
        </div>
        <div class="col-md-6 mt-1">
            <div class="input-group">
                <select class="form-control text-center" autofocus id="tipo">
                    <option value="">Seleccione el TIPO</option>
                    <option value="E">Especialsita</option>
                    <option value="A">Asistente</option>
                    <option value="M">Mixto</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 mt-1">
            <div class="input-group">
                <input type="password" id="passw" class="text-center form-control" placeholder="Contraseña"
                    maxlength="250">
            </div>
        </div>
        <div class="col-md-6 mt-1">
            <div class="input-group">
                <select class="form-control text-center" autofocus id="rol">
                    <option value="">Seleccione el ROL</option>
                    @foreach ($roles as $item)
                        <option value="{{ $item->id_rol }}">{{ $item->nombre }}</option>
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
        $('#nombre_completo').focus();
    }, 500);

    function store_usuario() {
        datos = {
            _token: '{{ csrf_token() }}',
            nombre_completo: $('#nombre_completo').val(),
            username: $('#username').val().toLowerCase(),
            correo: $('#correo').val(),
            tipo: $('#tipo').val(),
            rol: $('#rol').val(),
            passw: $('#passw').val(),
        }
        post_jquery_m('{{ url('usuarios/store_usuario') }}', datos, function() {
            cerrar_modals();
            listar_reporte();
        });
    }
</script>
