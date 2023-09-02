<div style="overflow-x: scroll;" class="contenedor">
    <table class="table-bordered" style="width: 100%; border-collapse: collapse;">
        <tr>
            <th class="bg-gradient-primary px-2 text-white" colspan="10">
                5 EXAMEN DEL SISTEMA ESTOMATOGNATICO
            </th>
            <th class="p-0 m-0 bg-primary" style="width: 100px; text-align: right" colspan="2">
                <div class="btn-group">
                    <button type="button" class="btn btn-success m-0" onclick="store_examen_sistema_est()"
                        title="Guardar Examen del Sistema Estomatognatico">
                        <i class="fa fa-save fa-lg"></i>
                    </button>
                    <button type="button" class="btn btn-dark m-0" onclick="getForm5()" title="Refrescar seccion">
                        <i class="fa fa-refresh fa-lg"></i>
                    </button>
                </div>
            </th>
        </tr>
        <tr style="font-size: 0.8em">
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-labios" class="mouse-hand">1. Labios</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-labios"
                    {{ $model != '' && $model->labios == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-mejillas" class="mouse-hand">2. Mejillas</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-mejillas"
                    {{ $model != '' && $model->mejillas == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-maxilar_superior" class="mouse-hand">3. Maxilar Superior</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-maxilar_superior"
                    {{ $model != '' && $model->maxilar_superior == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-maxilar_inferior" class="mouse-hand">4. Maxilar Inferior</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-maxilar_inferior"
                    {{ $model != '' && $model->maxilar_inferior == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-lengua" class="mouse-hand">5. Lengua</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-lengua"
                    {{ $model != '' && $model->lengua == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-paladar" class="mouse-hand">6. Paladar</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-paladar"
                    {{ $model != '' && $model->paladar == 1 ? 'checked' : '' }}>
            </td>
        </tr>
        <tr style="font-size: 0.8em">
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-piso" class="mouse-hand">7. Piso</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-piso"
                    {{ $model != '' && $model->piso == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-carrillos" class="mouse-hand">8. Carrillos</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-carrillos"
                    {{ $model != '' && $model->carrillos == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-glandulas_salivales" class="mouse-hand">9. Glandulas Salivales</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-glandulas_salivales"
                    {{ $model != '' && $model->glandulas_salivales == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-oro_faringe" class="mouse-hand">10. Oro Faringe</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-oro_faringe"
                    {{ $model != '' && $model->oro_faringe == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-atm" class="mouse-hand">11. A.T.M.</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-atm"
                    {{ $model != '' && $model->atm == 1 ? 'checked' : '' }}>
            </td>
            <th class="text-center" style="border-color: #9d9d9d">
                <label for="check_examen_sistema_est-ganglios" class="mouse-hand">12. Ganglios</label>
            </th>
            <td class="text-center" style="border-color: #9d9d9d">
                <input type="checkbox" id="check_examen_sistema_est-ganglios"
                    {{ $model != '' && $model->ganglios == 1 ? 'checked' : '' }}>
            </td>
        </tr>
        <tr>
            <th colspan="12" class="p-0">
                <textarea id="texto_examen_sistema_est" class="px-1" rows="2"
                    style="width: 100%; font-size: 0.8em; margin-bottom: -8px !important">{!! $model != '' ? $model->texto : '' !!}</textarea>
            </th>
        </tr>
    </table>
</div>

<script>
    function store_examen_sistema_est() {
        datos = {
            _token: '{{ csrf_token() }}',
            texto: $('#texto_examen_sistema_est').val(),
            labios: $('#check_examen_sistema_est-labios').prop('checked'),
            mejillas: $('#check_examen_sistema_est-mejillas').prop('checked'),
            maxilar_superior: $('#check_examen_sistema_est-maxilar_superior').prop('checked'),
            maxilar_inferior: $('#check_examen_sistema_est-maxilar_inferior').prop('checked'),
            lengua: $('#check_examen_sistema_est-lengua').prop('checked'),
            paladar: $('#check_examen_sistema_est-paladar').prop('checked'),
            piso: $('#check_examen_sistema_est-piso').prop('checked'),
            carrillos: $('#check_examen_sistema_est-carrillos').prop('checked'),
            glandulas_salivales: $('#check_examen_sistema_est-glandulas_salivales').prop('checked'),
            oro_faringe: $('#check_examen_sistema_est-oro_faringe').prop('checked'),
            atm: $('#check_examen_sistema_est-atm').prop('checked'),
            ganglios: $('#check_examen_sistema_est-ganglios').prop('checked'),
            formulario: $('#id_formulario').val(),
        }
        post_jquery_m('{{ url('mis_citas/store_examen_sistema_est') }}', datos, function() {
            getForm5();
        });
    }
</script>
