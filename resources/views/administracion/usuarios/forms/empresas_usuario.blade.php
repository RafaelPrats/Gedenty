<input type="hidden" id="usuario_selected" value="{{ $usuario }}">
<div class="card">
    <div class="card-body px-0 py-0">
        <div class="table-responsive p-0 mt-0 contenedor"
            style="overflow-x: scroll; overflow-y: scroll; max-height: 500px">
            <table class="w-100 table-bordered">
                <thead>
                    <tr class="tr_fija_top_0 bg-gradient-info text-white" style="height: 34px">
                        <th class="text-center" style="">
                            Nombre
                        </th>
                        <th class="text-center" style="">
                            Sucursal
                        </th>
                        <th class="text-center" style=" width: 80px">
                            <i class="fa fa-fw fa-gears"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $pos_e => $item)
                        @foreach ($item->sucursales as $pos_s => $suc)
                            <tr class="p-0">
                                @if ($pos_s == 0)
                                    <td class="text-center" rowspan="{{ count($item->sucursales) }}">
                                        <div
                                            style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                            {{ $item->nombre }}
                                        </div>
                                    </td>
                                @endif
                                <td class="p-0 text-center" id="td_check_sucursal_{{ $suc->id_sucursal }}">
                                    <label for="check_sucursal_{{ $suc->id_sucursal }}" class="mouse-hand">
                                        {{ $suc->nombre }}
                                    </label>
                                </td>
                                <td class="text-center text-xs p-0">
                                    <input type="checkbox" id="check_sucursal_{{ $suc->id_sucursal }}"
                                        {{ in_array($suc->id_sucursal, $mis_sucursales) ? 'checked' : '' }} class="mouse-hand"
                                        onchange="seleccionar_sucursal('{{ $suc->id_sucursal }}')">
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function seleccionar_sucursal(id) {
        datos = {
            _token: '{{ csrf_token() }}',
            sucursal: id,
            usuario: $('#usuario_selected').val()
        }
        post_jquery_m('{{ url('usuarios/seleccionar_sucursal') }}', datos, function() {},
            'td_check_sucursal_' + id);
    }
</script>
