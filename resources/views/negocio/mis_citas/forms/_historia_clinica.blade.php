<legend style="font-size: 1em" class="text-center">
    Historia del paciente "<b>{{ $paciente->nombres . ' ' . $paciente->apellidos }}</b>"
</legend>

<div class="px-1 border-radius-16">
    <div class="row">
        <input type="hidden" id="id_historia" value="{{ $historia != '' ? $historia->id_historia_clinica : '' }}">
        <input type="hidden" id="id_paciente" value="{{ $paciente->id_paciente }}">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-gradient-dark text-white">
                    Numero de Historia
                </span>
                <input type="text" id="codigo_historia" class="text-center form-control"
                    placeholder="Numero de historia" value="{{ $historia != '' ? $historia->codigo : '' }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-gradient-dark text-white">
                    Fecha de Registro
                </span>
                <input type="date" id="fecha_historia" class="text-center form-control" readonly
                    value="{{ $historia != '' ? $historia->fecha_registro : hoy() }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-gradient-dark text-white">
                    Fecha de Nacimiento
                </span>
                <input type="date" id="fecha_nacimiento" class="text-center form-control"
                    value="{{ $historia != '' ? $historia->fecha_nacimiento : '' }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-gradient-dark text-white">
                    Sexo
                </span>
                <select id="sexo" class="text-center form-control">
                    <option value="M" {{ $historia != '' && $historia->sexo == 'M' ? 'selected' : '' }}>
                        Masculino
                    </option>
                    <option value="F" {{ $historia != '' && $historia->sexo == 'F' ? 'selected' : '' }}>
                        Femenino
                    </option>
                </select>
                <button class="btn btn-primary mb-0" type="button" onclick="store_historia()">
                    <i class="fa fa-fw fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function store_historia() {
        datos = {
            _token: '{{ csrf_token() }}',
            id_historia: $('#id_historia').val(),
            id_paciente: $('#id_paciente').val(),
            codigo_historia: $('#codigo_historia').val(),
            fecha_historia: $('#fecha_historia').val(),
            fecha_nacimiento: $('#fecha_nacimiento').val(),
            sexo: $('#sexo').val(),
        }
        post_jquery_m('{{ url('mis_citas/store_historia') }}', datos, function() {
            location.reload();
        });
    }
</script>
