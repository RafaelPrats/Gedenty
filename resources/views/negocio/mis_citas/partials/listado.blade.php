<legend style="font-size: 1.2em" class="text-center my-0">
    Horarios del dia "{{ convertDateToText($fecha) }}"
</legend>
<hr class="horizontal dark mb-2 mt-1">

@if (count($listado) > 0)
    <div style="overflow-x: scroll" class="contenedor">
        <table class="table align-items-center mb-0 mt-0 w-100">
            <tr>
                @foreach ($listado as $pos => $item)
                    <th class="text-center" style="vertical-align: top">
                        <div class="card mt-0" style="min-width: 200px">
                            <div class="card-header p-0 text-center">
                                <h6>
                                    {{ substr($item['horario']->desde, 0, 5) }} a
                                    {{ substr($item['horario']->hasta, 0, 5) }}
                                </h6>
                                @if ($item['cita'] == '')
                                    <div
                                        class="icon icon-shape icon-lg bg-gradient-light shadow text-center border-radius-lg">
                                        <i class="fa fa-fw fa-ban" aria-hidden="true"></i>
                                    </div>
                                @else
                                    <div
                                        class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                        <i class="fa fa-fw fa-clock" aria-hidden="true"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body p-1 text-center">
                                @if ($item['cita'] == '')
                                    <hr class="horizontal dark my-3">
                                    <h6 class="text-center mb-0 p-0">
                                        <button type="button" class="btn bg-gradient-primary"
                                            onclick="agendar_cita('{{ $item['horario']->id_horario }}', '{{ $fecha }}')">
                                            <i class="fa fa-fw fa-clock"></i> Agendar
                                        </button>
                                    </h6>
                                @else
                                    <h6 class="text-center mb-0 mt-2">
                                        {{ $item['cita']->paciente->nombres . ' ' . $item['cita']->paciente->apellidos }}
                                    </h6>
                                    <span class="text-xs my-0">
                                        {{ $item['cita']->labor->nombre }}
                                    </span>

                                    <hr class="horizontal dark mb-2 mt-1">
                                    <button type="button" class="btn bg-gradient-info"
                                        onclick="confirmar_cita('{{ $item['cita']->id_cita }}')">
                                        <i class="fa fa-fw fa-check"></i> Confirmar Asistencia
                                    </button>
                                    <button type="button" class="btn bg-gradient-warning"
                                        onclick="cancelar_cita('{{ $item['cita']->id_cita }}')">
                                        <i class="fa fa-fw fa-ban"></i> Cancelar
                                    </button>
                                @endif
                            </div>
                        </div>
                    </th>
                @endforeach
            </tr>
        </table>
    </div>
@else
    <div class="alert alert-info text-center mx-3 rounded-3">
        <h5 class="text-white my-0">
            No hay turnos programados para el
            "{{ getDias(TP_COMPLETO, FR_ARREGLO)[transformDiaPhp(date('w', strtotime($fecha)))] }}"
            en esta sucursal
        </h5>
        <hr class="horizontal light mb-2 mt-1">
        <a href="javascript:void(0)" onclick="cargar_url('mis_horarios')" class="text-center text-white">
            <i class="fa fa-fw fa-arrow-right"></i> ¿Desea programar sus horarios? <i
                class="fa fa-fw fa-arrow-left"></i>
        </a>
    </div>
@endif

<script>
    function agendar_cita(horario, fecha) {
        datos = {
            horario: horario,
            fecha: fecha,
        }
        get_jquery('{{ url('mis_citas/agendar_cita') }}', datos, function(retorno) {
            modal_view1(retorno, '<i class="fa fa-fw fa-plus"></i> Agendar Cita');
        });
    }

    function cancelar_cita(id) {
        texto =
            '<div class="text-center alert alert-warning" style="color: white">¿Está seguro de <b>CANCELAR</b> esta cita?</div>';

        modal_quest1(
            texto,
            '100%',
            function() {
                datos = {
                    _token: '{{ csrf_token() }}',
                    id: id,
                }
                post_jquery_m('{{ url('mis_citas/cancelar_cita') }}', datos, function() {
                    listar_reporte();
                });
            })
    }

    function confirmar_cita(id) {
        id = convertirNumero(id);
        overlayTrue();
        location.href = '{{ url('mis_citas/confirmar_cita') }}?id=' + id;
        overlayFalse();
    }
</script>
