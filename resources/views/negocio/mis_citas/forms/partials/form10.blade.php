<div style="overflow-x: scroll;" class="contenedor">
    <table class="table-bordered" style="width: 100%; border-collapse: collapse;">
        <tr>
            <th class="bg-gradient-primary px-2 text-white" colspan="6">
                10 PLANES DE DIAGNOSTICO, TERAPEUTICO Y EDUCACIONAL
            </th>
            <th class="p-0 m-0 bg-primary" style="width: 100px; text-align: right" colspan="2">
                <div class="btn-group">
                    <button type="button" class="btn btn-success m-0" onclick="store_planes_diagnostico()"
                        title="Guardar Examen del Sistema Estomatognatico">
                        <i class="fa fa-save fa-lg"></i>
                    </button>
                    <button type="button" class="btn btn-dark m-0" onclick="getForm10()" title="Refrescar seccion">
                        <i class="fa fa-refresh fa-lg"></i>
                    </button>
                </div>
            </th>
        </tr>
        <tr style="font-size: 0.8em">
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_planes_diagnostico-biometria" class="mouse-hand">Biometria</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_planes_diagnostico-biometria"
                    {{ $model != '' && $model->biometria == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_planes_diagnostico-quimica_sanguinea" class="mouse-hand">Quimica Sanguinea</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_planes_diagnostico-quimica_sanguinea"
                    {{ $model != '' && $model->quimica_sanguinea == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_planes_diagnostico-rayos_x" class="mouse-hand">Rayos X</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_planes_diagnostico-rayos_x"
                    {{ $model != '' && $model->rayos_x == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_planes_diagnostico-otros" class="mouse-hand">Otros</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_planes_diagnostico-otros"
                    {{ $model != '' && $model->otros == 1 ? 'checked' : '' }}>
            </td>
        </tr>
        <tr>
            <th colspan="8" class="p-0">
                <textarea id="texto_planes_diagnostico" class="px-1" rows="2"
                    style="width: 100%; font-size: 0.8em; margin-bottom: -8px !important">{!! $model != '' ? $model->texto : '' !!}</textarea>
            </th>
        </tr>
    </table>
</div>

<script>
    function store_planes_diagnostico() {
        datos = {
            _token: '{{ csrf_token() }}',
            texto: $('#texto_planes_diagnostico').val(),
            biometria: $('#check_planes_diagnostico-biometria').prop('checked'),
            quimica_sanguinea: $('#check_planes_diagnostico-quimica_sanguinea').prop('checked'),
            rayos_x: $('#check_planes_diagnostico-rayos_x').prop('checked'),
            otros: $('#check_planes_diagnostico-otros').prop('checked'),
            formulario: $('#id_formulario').val(),
        }
        post_jquery_m('{{ url('mis_citas/store_planes_diagnostico') }}', datos, function() {
            getForm10();
        });
    }
</script>
