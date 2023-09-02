<table style="width: 100%; border: 1px solid #9d9d9d">
    <tr>
        <th class="bg-gradient-primary px-2 text-white">
            6 ODONTOGRAMA
        </th>
        <th class="text-center p-0 m-0 bg-primary" style="width: 100px">
            <div class="btn-group">
                <button type="button" class="btn btn-success m-0" onclick="store_odontograma()"
                    title="Guardar Odontograma">
                    <i class="fa fa-save fa-lg"></i>
                </button>
                <button type="button" class="btn btn-dark m-0" onclick="getForm6()" title="Refrescar seccion">
                    <i class="fa fa-refresh fa-lg"></i>
                </button>
            </div>
        </th>
    </tr>
    <tr>
        <th style="border-color: #9d9d9d" colspan="2">
            <div class="contenedor" style="display: nonex; overflow-x: scroll; position: relative;">
                <table class="w-100 mt-3 mx-3">
                    {{-- RESECION TOP --}}
                    <tr>
                        @foreach ($array_vestibular_top_left as $item)
                            <td class="pb-1 text-center">
                                <input type="hidden" id="resecion_top_{{ $item }}">
                                <div class="rectangular mouse-hand mouse-over_light"
                                    onclick="alert('RESECION: {{ $item }}')">
                                </div>
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_vestibular_top_right as $item)
                            <td class="pb-1 text-center">
                                <input type="hidden" id="resecion_top_{{ $item }}">
                                <div class="rectangular mouse-hand mouse-over_light"
                                    onclick="alert('RESECION: {{ $item }}')">
                                </div>
                            </td>
                        @endforeach
                    </tr>
                    {{-- MOVILIDAD TOP --}}
                    <tr>
                        @foreach ($array_vestibular_top_left as $item)
                            <td class="text-center">
                                <input type="hidden" id="movilidad_top_{{ $item }}">
                                <div class="rectangular mouse-hand mouse-over_light"
                                    onclick="alert('MOVILIDAD: {{ $item }}')"></div>
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_vestibular_top_right as $item)
                            <td class="text-center">
                                <input type="hidden" id="movilidad_top_{{ $item }}">
                                <div class="rectangular mouse-hand mouse-over_light"
                                    onclick="alert('MOVILIDAD: {{ $item }}')"></div>
                            </td>
                        @endforeach
                    </tr>
                    {{-- VESTIBULAR TOP (numeros) --}}
                    <tr>
                        @foreach ($array_vestibular_top_left as $item)
                            <td class="text-xxs text-center">
                                {{ $item }}
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_vestibular_top_right as $item)
                            <td class="text-xxs text-center">
                                {{ $item }}
                            </td>
                        @endforeach
                    </tr>
                    {{-- VESTIBULAR TOP (dientes) --}}
                    <tr>
                        @foreach ($array_vestibular_top_left as $item)
                            <td style="position: relative">
                                <div class="menu-diente menu-right-top-diente hidden shadow blur shadow-blur"
                                    id="menu-diente_{{ $item }}"></div>
                                <input type="hidden" id="diente_{{ $item }}">
                                <input type="hidden" id="centro_{{ $item }}">
                                <input type="hidden" id="arriba_{{ $item }}">
                                <input type="hidden" id="izquierda_{{ $item }}">
                                <input type="hidden" id="derecha_{{ $item }}">
                                <input type="hidden" id="abajo_{{ $item }}">
                                <div class="div_container mt-2">
                                    <div class="center mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('centro', '{{ $item }}')"></div>
                                    <div class="top mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('arriba', '{{ $item }}')"></div>
                                    <div class="left mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('izquierda', '{{ $item }}')"></div>
                                    <div class="right mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('derecha', '{{ $item }}')"></div>
                                    <div class="bottom mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('abajo', '{{ $item }}')"></div>
                                </div>
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_vestibular_top_right as $item)
                            <td style="position: relative">
                                <div class="menu-diente menu-left-top-diente hidden shadow blur shadow-blur"
                                    id="menu-diente_{{ $item }}"></div>
                                <input type="hidden" id="diente_{{ $item }}">
                                <input type="hidden" id="centro_{{ $item }}">
                                <input type="hidden" id="arriba_{{ $item }}">
                                <input type="hidden" id="izquierda_{{ $item }}">
                                <input type="hidden" id="derecha_{{ $item }}">
                                <input type="hidden" id="abajo_{{ $item }}">
                                <div class="div_container mt-2">
                                    <div class="center mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('centro', '{{ $item }}')"></div>
                                    <div class="top mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('arriba', '{{ $item }}')"></div>
                                    <div class="left mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('izquierda', '{{ $item }}')"></div>
                                    <div class="right mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('derecha', '{{ $item }}')"></div>
                                    <div class="bottom mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('abajo', '{{ $item }}')"></div>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                    {{-- LINGUAL TOP (numeros) --}}
                    <tr>
                        <td colspan="3">
                        </td>
                        @foreach ($array_lingual_top_left as $item)
                            <td class="text-xxs text-center">
                                {{ $item }}
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_lingual_top_right as $item)
                            <td class="text-xxs text-center">
                                {{ $item }}
                            </td>
                        @endforeach
                        <td colspan="3">
                        </td>
                    </tr>
                    {{-- LINGUAL TOP (dientes) --}}
                    <tr>
                        <td colspan="3">
                        </td>
                        @foreach ($array_lingual_top_left as $item)
                            <td style="position: relative">
                                <div class="menu-diente menu-right-center-top-diente hidden shadow blur shadow-blur"
                                    id="menu-diente_{{ $item }}"></div>
                                <input type="hidden" id="diente_{{ $item }}">
                                <input type="hidden" id="centro_{{ $item }}">
                                <input type="hidden" id="arriba_{{ $item }}">
                                <input type="hidden" id="izquierda_{{ $item }}">
                                <input type="hidden" id="derecha_{{ $item }}">
                                <input type="hidden" id="abajo_{{ $item }}">
                                <div class="div_container mt-2">
                                    <div class="center-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('centro', '{{ $item }}')"></div>
                                    <div class="top-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('arriba', '{{ $item }}')"></div>
                                    <div class="left-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('izquierda', '{{ $item }}')"></div>
                                    <div class="right-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('derecha', '{{ $item }}')"></div>
                                    <div class="bottom-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('abajo', '{{ $item }}')"></div>
                                </div>
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_lingual_top_right as $item)
                            <td style="position: relative">
                                <div class="menu-diente menu-left-center-top-diente hidden shadow blur shadow-blur"
                                    id="menu-diente_{{ $item }}"></div>
                                <input type="hidden" id="diente_{{ $item }}">
                                <input type="hidden" id="centro_{{ $item }}">
                                <input type="hidden" id="arriba_{{ $item }}">
                                <input type="hidden" id="izquierda_{{ $item }}">
                                <input type="hidden" id="derecha_{{ $item }}">
                                <input type="hidden" id="abajo_{{ $item }}">
                                <div class="div_container mt-2">
                                    <div class="center-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('centro', '{{ $item }}')"></div>
                                    <div class="top-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('arriba', '{{ $item }}')"></div>
                                    <div class="left-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('izquierda', '{{ $item }}')"></div>
                                    <div class="right-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('derecha', '{{ $item }}')"></div>
                                    <div class="bottom-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('abajo', '{{ $item }}')"></div>
                                </div>
                            </td>
                        @endforeach
                        <td colspan="3">
                        </td>
                    </tr>
                    {{-- LINGUAL BOTTOM (numeros) --}}
                    <tr>
                        <td colspan="3">
                        </td>
                        @foreach ($array_lingual_bottom_left as $item)
                            <td class="text-xxs text-center">
                                {{ $item }}
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_lingual_bottom_right as $item)
                            <td class="text-xxs text-center">
                                {{ $item }}
                            </td>
                        @endforeach
                        <td colspan="3">
                        </td>
                    </tr>
                    {{-- LINGUAL BOTTOM (dientes) --}}
                    <tr>
                        <td colspan="3">
                        </td>
                        @foreach ($array_lingual_bottom_left as $item)
                            <td style="position: relative">
                                <div class="menu-diente menu-right-center-bottom-diente hidden shadow blur shadow-blur"
                                    id="menu-diente_{{ $item }}"></div>
                                <input type="hidden" id="diente_{{ $item }}">
                                <input type="hidden" id="centro_{{ $item }}">
                                <input type="hidden" id="arriba_{{ $item }}">
                                <input type="hidden" id="izquierda_{{ $item }}">
                                <input type="hidden" id="derecha_{{ $item }}">
                                <input type="hidden" id="abajo_{{ $item }}">
                                <div class="div_container mt-2">
                                    <div class="center-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('centro', '{{ $item }}')"></div>
                                    <div class="top-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('arriba', '{{ $item }}')"></div>
                                    <div class="left-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('izquierda', '{{ $item }}')"></div>
                                    <div class="right-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('derecha', '{{ $item }}')"></div>
                                    <div class="bottom-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('abajo', '{{ $item }}')"></div>
                                </div>
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_lingual_bottom_right as $item)
                            <td style="position: relative">
                                <div class="menu-diente menu-left-center-bottom-diente hidden shadow blur shadow-blur"
                                    id="menu-diente_{{ $item }}"></div>
                                <input type="hidden" id="diente_{{ $item }}">
                                <input type="hidden" id="centro_{{ $item }}">
                                <input type="hidden" id="arriba_{{ $item }}">
                                <input type="hidden" id="izquierda_{{ $item }}">
                                <input type="hidden" id="derecha_{{ $item }}">
                                <input type="hidden" id="abajo_{{ $item }}">
                                <div class="div_container mt-2">
                                    <div class="center-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('centro', '{{ $item }}')"></div>
                                    <div class="top-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('arriba', '{{ $item }}')"></div>
                                    <div class="left-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('izquierda', '{{ $item }}')"></div>
                                    <div class="right-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('derecha', '{{ $item }}')"></div>
                                    <div class="bottom-circular mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('abajo', '{{ $item }}')"></div>
                                </div>
                            </td>
                        @endforeach
                        <td colspan="3">
                        </td>
                    </tr>
                    {{-- VESTIBULAR BOTTOM (numeros) --}}
                    <tr>
                        @foreach ($array_vestibular_bottom_left as $item)
                            <td class="text-xxs text-center">
                                {{ $item }}
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_vestibular_bottom_right as $item)
                            <td class="text-xxs text-center">
                                {{ $item }}
                            </td>
                        @endforeach
                    </tr>
                    {{-- VESTIBULAR BOTTOM (dientes) --}}
                    <tr>
                        @foreach ($array_vestibular_bottom_left as $item)
                            <td style="position: relative">
                                <div class="menu-diente menu-right-bottom-diente hidden shadow blur shadow-blur"
                                    id="menu-diente_{{ $item }}"></div>
                                <input type="hidden" id="diente_{{ $item }}">
                                <input type="hidden" id="centro_{{ $item }}">
                                <input type="hidden" id="arriba_{{ $item }}">
                                <input type="hidden" id="izquierda_{{ $item }}">
                                <input type="hidden" id="derecha_{{ $item }}">
                                <input type="hidden" id="abajo_{{ $item }}">
                                <div class="div_container mt-2">
                                    <div class="center mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('centro', '{{ $item }}')"></div>
                                    <div class="top mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('arriba', '{{ $item }}')"></div>
                                    <div class="left mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('izquierda', '{{ $item }}')"></div>
                                    <div class="right mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('derecha', '{{ $item }}')"></div>
                                    <div class="bottom mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('abajo', '{{ $item }}')"></div>
                                </div>
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_vestibular_bottom_right as $item)
                            <td style="position: relative">
                                <div class="menu-diente menu-left-bottom-diente hidden shadow blur shadow-blur"
                                    id="menu-diente_{{ $item }}"></div>
                                <input type="hidden" id="diente_{{ $item }}">
                                <input type="hidden" id="centro_{{ $item }}">
                                <input type="hidden" id="arriba_{{ $item }}">
                                <input type="hidden" id="izquierda_{{ $item }}">
                                <input type="hidden" id="derecha_{{ $item }}">
                                <input type="hidden" id="abajo_{{ $item }}">
                                <div class="div_container mt-2">
                                    <div class="center mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('centro', '{{ $item }}')"></div>
                                    <div class="top mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('arriba', '{{ $item }}')"></div>
                                    <div class="left mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('izquierda', '{{ $item }}')"></div>
                                    <div class="right mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('derecha', '{{ $item }}')"></div>
                                    <div class="bottom mouse-hand mouse-over_light"
                                        onclick="seleccionar_diente('abajo', '{{ $item }}')"></div>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                    {{-- RESECION BOTTOM --}}
                    <tr>
                        @foreach ($array_vestibular_bottom_left as $item)
                            <td class="pb-1 text-center">
                                <input type="hidden" id="resecion_bottom_{{ $item }}">
                                <div class="rectangular mouse-hand mouse-over_light"
                                    onclick="alert('RESECION: {{ $item }}')"></div>
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_vestibular_bottom_right as $item)
                            <td class="pb-1 text-center">
                                <input type="hidden" id="resecion_bottom_{{ $item }}">
                                <div class="rectangular mouse-hand mouse-over_light"
                                    onclick="alert('RESECION: {{ $item }}')"></div>
                            </td>
                        @endforeach
                    </tr>
                    {{-- MOVILIDAD BOTTOM --}}
                    <tr>
                        @foreach ($array_vestibular_bottom_left as $item)
                            <td class="text-center">
                                <input type="hidden" id="movilidad_bottom_{{ $item }}">
                                <div class="rectangular mouse-hand mouse-over_light"
                                    onclick="alert('MOVILIDAD: {{ $item }}')"></div>
                            </td>
                        @endforeach
                        <td>
                            <div class="mx-3"></div>
                        </td>
                        @foreach ($array_vestibular_bottom_right as $item)
                            <td class="text-center">
                                <input type="hidden" id="movilidad_bottom_{{ $item }}">
                                <div class="rectangular mouse-hand mouse-over_light"
                                    onclick="alert('MOVILIDAD: {{ $item }}')"></div>
                            </td>
                        @endforeach
                    </tr>
                </table>
            </div>
        </th>
    </tr>
</table>

<style>
    .celda_numeros_left {
        padding-left: 38px;
    }

    .celda_numeros_right {
        padding-left: 35px;
    }

    .rectangular {
        width: 50px;
        height: 20px;
        background-color: white;
        border: 1px solid black;
        margin-right: 0px;
        padding-right: 0px;
        margin-left: 0px;
        padding-left: 0px;
        /* ojo, estilos solo para centrar el div con respecto al td */
        position: relative;
        top: 10px;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .div_container {
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        /* ojo, estilos solo para centrar el div con respecto al td */
        top: 18px;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .center-circular {
        background-color: white;
        border: 1px solid black;
        width: 26px;
        height: 26px;
        border-radius: 50%
    }

    .center {
        background-color: white;
        border: 1px solid black;
        width: 26px;
        height: 26px;
    }

    .left {
        background-color: white;
        border: 1px solid black;
        width: 12px;
        height: 25px;
        position: absolute;
        left: 0;
        border-radius: 12px 0px 0px 12px
    }

    .left-circular {
        background-color: white;
        border: 1px solid black;
        width: 12px;
        height: 25px;
        position: absolute;
        left: 0;
        border-radius: 18px 18px 18px 18px
    }

    .right {
        background-color: white;
        border: 1px solid black;
        width: 12px;
        height: 25px;
        position: absolute;
        right: 0;
        border-radius: 0px 12px 12px 0px
    }

    .right-circular {
        background-color: white;
        border: 1px solid black;
        width: 12px;
        height: 25px;
        position: absolute;
        right: 0;
        border-radius: 18px 18px 18px 18px
    }

    .top {
        background-color: white;
        border: 1px solid black;
        width: 25px;
        height: 12px;
        position: absolute;
        top: 0;
        border-radius: 12px 12px 0px 0px
    }

    .top-circular {
        background-color: white;
        border: 1px solid black;
        width: 25px;
        height: 12px;
        position: absolute;
        top: 0;
        border-radius: 18px 18px 18px 18px
    }

    .bottom {
        background-color: white;
        border: 1px solid black;
        width: 25px;
        height: 12px;
        position: absolute;
        bottom: 0;
        border-radius: 0px 0px 12px 12px
    }

    .bottom-circular {
        background-color: white;
        border: 1px solid black;
        width: 25px;
        height: 12px;
        position: absolute;
        bottom: 0;
        border-radius: 18px 18px 18px 18px
    }

    .menu-right-top-diente {
        border: 1px solid black;
        width: 460px;
        height: 233px;
        position: absolute;
        top: -50px;
        left: 0;
        border-radius: 6px 6px 6px 6px;
        z-index: 9999;
        vertical-align: top;
        text-align: center;
    }

    .menu-left-top-diente {
        border: 1px solid black;
        width: 460px;
        height: 233px;
        position: absolute;
        top: -50px;
        right: 0;
        border-radius: 6px 6px 6px 6px;
        z-index: 9999;
        vertical-align: top;
        text-align: center;
    }

    .menu-right-center-top-diente {
        border: 1px solid black;
        width: 460px;
        height: 233px;
        position: absolute;
        top: -100px;
        left: 0;
        border-radius: 6px 6px 6px 6px;
        z-index: 9999;
        vertical-align: top;
        text-align: center;
    }

    .menu-left-center-top-diente {
        border: 1px solid black;
        width: 460px;
        height: 233px;
        position: absolute;
        top: -100px;
        right: 0;
        border-radius: 6px 6px 6px 6px;
        z-index: 9999;
        vertical-align: top;
        text-align: center;
    }

    .menu-right-center-bottom-diente {
        border: 1px solid black;
        width: 460px;
        height: 233px;
        position: absolute;
        top: -178px;
        left: 0;
        border-radius: 6px 6px 6px 6px;
        z-index: 9999;
        vertical-align: top;
        text-align: center;
    }

    .menu-left-center-bottom-diente {
        border: 1px solid black;
        width: 460px;
        height: 233px;
        position: absolute;
        top: -178px;
        right: 0;
        border-radius: 6px 6px 6px 6px;
        z-index: 9999;
        vertical-align: top;
        text-align: center;
    }

    .menu-right-bottom-diente {
        border: 1px solid black;
        width: 460px;
        height: 233px;
        position: absolute;
        top: -230px;
        left: 0;
        border-radius: 6px 6px 6px 6px;
        z-index: 9999;
        vertical-align: top;
        text-align: center;
    }

    .menu-left-bottom-diente {
        border: 1px solid black;
        width: 460px;
        height: 233px;
        position: absolute;
        top: -230px;
        right: 0;
        border-radius: 6px 6px 6px 6px;
        z-index: 9999;
        vertical-align: top;
        text-align: center;
    }

    /* clase del triangulo rojo q se agregara al div, cuando se haga click sobre él */
    .triangle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        border-color: transparent transparent red transparent;
    }
</style>

<script>
    $('.mouse-over_light').on('mouseover', function() {
        $(this).addClass('bg-light')
    })
    $('.mouse-over_light').on('mouseleave', function() {
        $(this).removeClass('bg-light')
    })

    $(document).click(function(event) {
        // Si el evento se originó fuera del div con id "mi-div"
        if (!$(event.target).closest('.menu-diente').length) {
            // Código a ejecutar cuando se hace clic fuera del div
            $('.menu-diente').addClass('hidden');
        }
    });

    function seleccionar_diente(campo, diente) {
        datos = {
            campo: campo,
            diente: diente,
        }
        $('.menu-diente').addClass('hidden');

        $.get('{{ url('mis_citas/seleccionar_diente') }}', datos, function(retorno) {
            $('#menu-diente_' + diente).removeClass('hidden');
            $('#menu-diente_' + diente).html(retorno);
        });
    }

    function store_odontograma() {
        datos = {
            _token: '{{ csrf_token() }}',
            formulario: $('#id_formulario').val(),
        }
        post_jquery_m('{{ url('mis_citas/store_odontograma') }}', datos, function() {
            getForm6();
        });
    }
</script>
