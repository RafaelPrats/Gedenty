<legend style="font-size: 1em" class="text-center">
    Agendar cita para el dia "<b>{{ convertDateToText($fecha) }}</b>" en el turno
    "<b>{{ substr($horario->desde, 0, 5) }} a
        {{ substr($horario->hasta, 0, 5) }}</b>"
</legend>
<input type="hidden" id="id_horario_selected" value="{{ $horario->id_horario }}">
<input type="hidden" id="fecha_selected" value="{{ $fecha }}">

<div class="p-4 border-radius-16">
    <div class="row">
        <input type="hidden" id="id_paciente">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-gradient-dark text-white">Especialidad</span>
                <select class="form-control text-center" id="id_especialidad">
                    @foreach ($especialidades as $e)
                        <option value="{{ $e->id_labor }}">{{ $e->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-gradient-dark text-white">Identificacion</span>
                <input type="text" id="cedula_paciente" class="text-center form-control"
                    placeholder="Cedula del Paciente" onkeyup="buscar_paciente()" onchange="buscar_paciente()">
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-gradient-dark text-white">Nombres</span>
                <input type="text" readonly id="nombres_paciente" class="text-center form-control"
                    placeholder="Nombres del Paciente">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text bg-gradient-dark text-white">Apellidos</span>
                <input type="text" readonly id="apellidos_paciente" class="text-center form-control"
                    placeholder="Apellidos del Paciente">
                <button class="btn btn-primary mb-0" type="button" onclick="store_cita()">
                    <i class="fa fa-fw fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        $('#cedula_paciente').focus();
    }, 500);

    function store_cita() {
        if ($('#cedula_paciente').val() != '' && $('#nombres_paciente').val() != '' && $('#apellidos_paciente').val() !=
            '') {
            if ($('#id_paciente').val() != '')
                texto =
                '<div class="text-center alert alert-info" style="color: white">¿Está seguro de <b>AGENDAR</b> esta cita?</div>';
            else
                texto =
                '<div class="text-center alert alert-info" style="color: white">Es un <b>NUEVO</b> paciente, ¿está seguro de <b>AGENDAR</b> esta cita?</div>';

            modal_quest1(
                texto,
                '100%',
                function() {
                    datos = {
                        _token: '{{ csrf_token() }}',
                        id_especialidad: $('#id_especialidad').val(),
                        id_paciente: $('#id_paciente').val(),
                        cedula_paciente: $('#cedula_paciente').val(),
                        nombres_paciente: $('#nombres_paciente').val(),
                        apellidos_paciente: $('#apellidos_paciente').val(),
                        horario: $('#id_horario_selected').val(),
                        fecha: $('#fecha_selected').val(),
                        especialista: $('#filtro_especialista').val(),
                    }
                    post_jquery_m('{{ url('mis_citas/store_cita') }}', datos, function() {
                        cerrar_modals();
                        listar_reporte();
                    });
                })
        }
    }

    function buscar_paciente() {
        datos = {
            _token: '{{ csrf_token() }}',
            cedula: $('#cedula_paciente').val(),
        }
        overlayTrue('#nombre_paciente');
        $.post('{{ url('mis_citas/buscar_paciente') }}', datos, function(retorno) {
            $('#nombres_paciente').val(retorno.nombres);
            $('#apellidos_paciente').val(retorno.apellidos);
            $('#id_paciente').val(retorno.id_paciente);
            if (retorno.id_paciente != '') {
                $('#nombres_paciente').prop('readonly', true);
                $('#apellidos_paciente').prop('readonly', true);
            } else {
                $('#nombres_paciente').prop('readonly', false);
                $('#apellidos_paciente').prop('readonly', false);
            }
        }, 'json').fail(function(retorno) {
            console.log(retorno);
            alerta(retorno.responseText);
            alert('Ha ocurrido un problema al enviar la información');
        }).always(function() {
            overlayFalse('#nombre_paciente');
        });
    }
</script>
