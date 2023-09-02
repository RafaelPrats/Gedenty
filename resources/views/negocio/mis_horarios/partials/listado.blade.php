<div class="table-responsive mt-0">
    <table class="table align-items-center mb-0 mt-0">
        <thead>
            <tr>
                @for ($i = 0; $i <= 6; $i++)
                    <th class="text-uppercase text-xs opacity-7 text-center">
                        {{ getDias()[$i] }}
                    </th>
                @endfor
                <th class="text-xs text-center text-primary mouse-hand" onclick="add_horario()" title="Agegar Horario"
                    colspan="2" style="width: 140px">
                    <i class="fa fa-fw fa-plus"></i> HORARIO
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horarios as $pos_h => $h)
                @php
                    $getArrayDias = $h->getArrayDias();
                @endphp
                <tr class="tr_horario_{{ $h->id_horario }}">
                    @for ($i = 0; $i <= 6; $i++)
                        @php
                            $bg_celda = in_array($i, $getArrayDias) ? 'success' : 'light';
                        @endphp
                        <th class="text-uppercase mouse-hand text-xs opacity-7 text-center text-black bg-gradient-{{ $bg_celda }}"
                            rowspan="2" onclick="store_horario_dia('{{ $i }}', '{{ $h->id_horario }}')"
                            onmouseover="$(this).addClass('bg-gradient-secondary').removeClass('bg-gradient-{{ $bg_celda }}')"
                            onmouseleave="$(this).removeClass('bg-gradient-secondary').addClass('bg-gradient-{{ $bg_celda }}')"
                            id="td_horario_{{ $h->id_horario }}_dia_{{ $i }}">
                            @if (in_array($i, $getArrayDias))
                                <i class="fa fa-fw fa-lg fa-check"></i>
                            @else
                                <i class="fa fa-fw fa-lg fa-ban"></i>
                            @endif
                        </th>
                    @endfor
                    <td class="text-center p-0 bg-{{ $pos_h % 2 == 0 ? 'secondary' : 'dark' }} text-white"
                        style="width: 80px">
                        <input type="time" class="text-center h-100 bg-{{ $pos_h % 2 == 0 ? 'secondary' : 'dark' }}"
                            value="{{ $h->desde }}" style="width: 100%; height: 34px; color: white"
                            id="desde_{{ $h->id_horario }}">
                    </td>
                    <td class="text-center p-0 bg-{{ $pos_h % 2 == 0 ? 'secondary' : 'dark' }} text-white"
                        rowspan="2">
                        <button type="button" class="btn btn-{{ $pos_h % 2 == 0 ? 'dark' : 'secondary' }} mt-3 shadow"
                            title="Editar Horario" onclick="update_horario('{{ $h->id_horario }}')">
                            <i class="fa fa-fw fa-save"></i>
                        </button>
                    </td>
                </tr>
                <tr id="tr_horario_{{ $h->id_horario }}">
                    <td class="text-center p-0 bg-{{ $pos_h % 2 == 0 ? 'secondary' : 'dark' }} text-white">
                        <input type="time" class="text-center bg-{{ $pos_h % 2 == 0 ? 'secondary' : 'dark' }}"
                            value="{{ $h->hasta }}" style="width: 100%; height: 34px; color: white"
                            id="hasta_{{ $h->id_horario }}">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function store_horario_dia(dia, horario) {
        datos = {
            _token: '{{ csrf_token() }}',
            dia: dia,
            horario: horario,
        }
        post_jquery_m('{{ url('mis_horarios/store_horario_dia') }}', datos, function() {
            cerrar_modals();
            get_listado();
        }, 'td_horario_' + horario + '_dia_' + dia);
    }

    function update_horario(horario) {
        datos = {
            _token: '{{ csrf_token() }}',
            horario: horario,
            desde: $('#desde_' + horario).val(),
            hasta: $('#hasta_' + horario).val(),
        }
        post_jquery_m('{{ url('mis_horarios/update_horario') }}', datos, function() {}, 'div_listado');
    }
</script>
