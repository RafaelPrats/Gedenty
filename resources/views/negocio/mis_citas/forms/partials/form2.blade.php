<table style="width: 100%;">
    <tr>
        <th class="bg-gradient-primary px-2 text-white">
            2 ENFERMEDAD O PROBLEMA ACTUAL
        </th>
        <th class="text-center p-0 m-0 bg-primary" style="width: 100px">
            <div class="btn-group">
                <button type="button" class="btn btn-success m-0" onclick="store_enfermedad_actual()"
                    title="Guardar Enfermedad Actual">
                    <i class="fa fa-save fa-lg"></i>
                </button>
                <button type="button" class="btn btn-dark m-0" onclick="getForm2()" title="Refrescar seccion">
                    <i class="fa fa-refresh fa-lg"></i>
                </button>
            </div>
        </th>
    </tr>
    <tr>
        <th style="border-color: #9d9d9d" colspan="2">
            <textarea id="texto_enfermedad_actual" rows="2" style="width: 100%; font-size: 0.8em">{!! $model != '' ? $model->texto : '' !!}</textarea>
        </th>
    </tr>
</table>

<script>
    function store_enfermedad_actual() {
        datos = {
            _token: '{{ csrf_token() }}',
            texto: $('#texto_enfermedad_actual').val(),
            formulario: $('#id_formulario').val(),
        }
        post_jquery_m('{{ url('mis_citas/store_enfermedad_actual') }}', datos, function() {
            getForm2();
        });
    }
</script>
