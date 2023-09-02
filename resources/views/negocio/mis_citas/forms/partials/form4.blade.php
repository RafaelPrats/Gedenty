<div style="overflow-x: scroll;" class="contenedor">
    <table class="table-bordered" style="width: 100%; border-collapse: collapse;">
        <tr>
            <th class="bg-gradient-primary px-2 text-white" colspan="7">
                4 SIGNOS VITALES
            </th>
            <th class="p-0 m-0 bg-primary" style="width: 100px; text-align: right">
                <div class="btn-group">
                    <button type="button" class="btn btn-success m-0" onclick="store_signos_vitales()"
                        title="Guardar Signos Vitales">
                        <i class="fa fa-save fa-lg"></i>
                    </button>
                    <button type="button" class="btn btn-dark m-0" onclick="getForm4()" title="Refrescar seccion">
                        <i class="fa fa-refresh fa-lg"></i>
                    </button>
                </div>
            </th>
        </tr>
        <tr style="font-size: 0.8em">
            <th class="text-center" style="border-color: #9d9d9d">
                <div style="width: 120px">
                    Presion Arterial
                </div>
            </th>
            <td class="text-center p-0" style="border-color: #9d9d9d;">
                <input type="text" class="text-center" id="input_signos_vitales-presion_arterial" style="width: 100%"
                    value="{{ $model != '' ? $model->presion_arterial : '' }}">
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <div style="width: 130px">
                    Frec. Cardiaca min.
                </div>
            </th>
            <td class="text-center p-0" style="border-color: #9d9d9d">
                <input type="text" class="text-center" id="input_signos_vitales-frec_cardiaca" style="width: 100%"
                    value="{{ $model != '' ? $model->frec_cardiaca : '' }}">
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <div style="width: 120px">
                    Temperatura °C
                </div>
            </th>
            <td class="text-center p-0" style="border-color: #9d9d9d">
                <input type="text" class="text-center" id="input_signos_vitales-temperatura" style="width: 100%"
                    value="{{ $model != '' ? $model->temperatura : '' }}">
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <div style="width: 120px">
                    F. Respirat. min.
                </div>
            </th>
            <td class="text-center p-0" style="border-color: #9d9d9d">
                <input type="text" class="text-center" id="input_signos_vitales-frec_respiratoria" style="width: 100%;"
                    value="{{ $model != '' ? $model->frec_respiratoria : '' }}">
            </td>
        </tr>
        <tr>
            <th colspan="8" class="p-0">
                <textarea id="texto_signos_vitales" class="px-1" rows="2"
                    style="width: 100%; font-size: 0.8em; margin-bottom: -8px !important">{!! $model != '' ? $model->texto : '' !!}</textarea>
            </th>
        </tr>
    </table>
</div>

<script>
    function store_signos_vitales() {
        datos = {
            _token: '{{ csrf_token() }}',
            texto: $('#texto_signos_vitales').val(),
            presion_arterial: $('#input_signos_vitales-presion_arterial').val(),
            frec_cardiaca: $('#input_signos_vitales-frec_cardiaca').val(),
            temperatura: $('#input_signos_vitales-temperatura').val(),
            frec_respiratoria: $('#input_signos_vitales-frec_respiratoria').val(),
            formulario: $('#id_formulario').val(),
        }
        post_jquery_m('{{ url('mis_citas/store_signos_vitales') }}', datos, function() {
            getForm4();
        });
    }
</script>
