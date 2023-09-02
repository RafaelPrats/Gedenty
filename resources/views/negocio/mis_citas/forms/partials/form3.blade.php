<div style="overflow-x: scroll;" class="contenedor">
    <table class="table-bordered" style="width: 100%; border-collapse: collapse;">
        <tr>
            <th class="bg-gradient-primary px-2 text-white" colspan="18">
                3 ANTECEDENTES PERSONALS Y FAMILIARES
            </th>
            <th class="text-center p-0 m-0 bg-primary" style="width: 100px" colspan="2">
                <div class="btn-group">
                    <button type="button" class="btn btn-success m-0" onclick="store_antecedentes()"
                        title="Guardar Antecedentes">
                        <i class="fa fa-save fa-lg"></i>
                    </button>
                    <button type="button" class="btn btn-dark m-0" onclick="getForm3()" title="Refrescar seccion">
                        <i class="fa fa-refresh fa-lg"></i>
                    </button>
                </div>
            </th>
        </tr>
        <tr style="font-size: 0.8em">
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_antecedente-alergia_antibiotico" class="mouse-hand">1. Alergia Antibiotico</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_antecedente-alergia_antibiotico"
                    {{ $model != '' && $model->alergia_antibiotico == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_antecedente-alergia_anestesia" class="mouse-hand">2. Alergia Anestesia</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_antecedente-alergia_anestesia"
                    {{ $model != '' && $model->alergia_anestesia == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_antecedente-hemorragias" class="mouse-hand">3. Hemorragias</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_antecedente-hemorragias"
                    {{ $model != '' && $model->hemorragias == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_antecedente-vih" class="mouse-hand">4. VIH/SIDA</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_antecedente-vih"
                    {{ $model != '' && $model->vih == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_antecedente-tuberculosis" class="mouse-hand">5. Tuberculosis</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_antecedente-tuberculosis"
                    {{ $model != '' && $model->tuberculosis == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_antecedente-asma" class="mouse-hand">6. Asma</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_antecedente-asma"
                    {{ $model != '' && $model->asma == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_antecedente-diabetes" class="mouse-hand">7. Diabetes</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_antecedente-diabetes"
                    {{ $model != '' && $model->diabetes == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_antecedente-hipertension" class="mouse-hand">8. Hipertension</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_antecedente-hipertension"
                    {{ $model != '' && $model->hipertension == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_antecedente-enf_cardiaca" class="mouse-hand">9. Enf. Cardiaca</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_antecedente-enf_cardiaca"
                    {{ $model != '' && $model->enf_cardiaca == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_antecedente-otro" class="mouse-hand">10. Otro</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_antecedente-otro"
                    {{ $model != '' && $model->otro == 1 ? 'checked' : '' }}>
            </td>
        </tr>
        <tr>
            <th colspan="20" class="p-0">
                <textarea id="texto_antecedentes" class="px-1" rows="2"
                    style="width: 100%; font-size: 0.8em; margin-bottom: -8px !important">{!! $model != '' ? $model->texto : '' !!}</textarea>
            </th>
        </tr>
    </table>
</div>

<script>
    function store_antecedentes() {
        datos = {
            _token: '{{ csrf_token() }}',
            texto: $('#texto_antecedentes').val(),
            alergia_antibiotico: $('#check_antecedente-alergia_antibiotico').prop('checked'),
            alergia_anestesia: $('#check_antecedente-alergia_anestesia').prop('checked'),
            hemorragias: $('#check_antecedente-hemorragias').prop('checked'),
            vih: $('#check_antecedente-vih').prop('checked'),
            tuberculosis: $('#check_antecedente-tuberculosis').prop('checked'),
            asma: $('#check_antecedente-asma').prop('checked'),
            diabetes: $('#check_antecedente-diabetes').prop('checked'),
            hipertension: $('#check_antecedente-hipertension').prop('checked'),
            enf_cardiaca: $('#check_antecedente-enf_cardiaca').prop('checked'),
            otro: $('#check_antecedente-otro').prop('checked'),
            formulario: $('#id_formulario').val(),
        }
        post_jquery_m('{{ url('mis_citas/store_antecedentes') }}', datos, function() {
            getForm3();
        });
    }
</script>
