@extends('layouts_softui.master')

@section('titulo')
    Consulta
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item text-sm text-dark" aria-current="page">
        Negocio
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
        <a href="javascript:void(0)" onclick="cargar_url('mis_citas')">
            Citas
        </a>
    </li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
        <a href="javascript:void(0)" onclick="location.reload()">
            <i class="fa fa-fw fa-refresh"></i> Registro de la Consulta
        </a>
    </li>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header pb-0">
                    <div class="row mb-0 p-0">
                        <div class="col-md-12 mt-0 mb-0">
                            <h6 class="mt-0 mb-0"><i class="fa fa-fw fa-tooth"></i> Registro de la Consulta
                                <em>{{ convertDateToText($cita->fecha) }}</em>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-1 mt-0" id="div_listado">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#tab-historia"
                                    role="tab" aria-controls="profile" aria-selected="true">
                                    Historia Clinica
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#tab-formulario"
                                    role="tab" aria-controls="dashboard" aria-selected="false">
                                    Formulario
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="div_tab">
                            <div class="tab-pane fade show active p-2" id="tab-historia" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                @include('negocio.mis_citas.forms._historia_clinica')
                            </div>
                            <div class="tab-pane fade p-2" id="tab-formulario" role="tabpanel" aria-labelledby="profile-tab"
                                tabindex="0">
                                @include('negocio.mis_citas.forms._formulario')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $array_vestibular_top_left = [18, 17, 16, 15, 14, 13, 12, 11];
        $array_vestibular_top_right = [21, 22, 23, 24, 25, 26, 27, 28];
        $array_lingual_top_left = [55, 54, 53, 52, 51];
        $array_lingual_top_right = [61, 62, 63, 64, 65];
        $array_lingual_bottom_left = [85, 84, 83, 82, 81];
        $array_lingual_bottom_right = [71, 72, 73, 74, 75];
        $array_vestibular_bottom_left = [48, 47, 46, 45, 44, 43, 42, 41];
        $array_vestibular_bottom_right = [31, 32, 33, 34, 35, 36, 37, 38];
    @endphp
    <div class="contenedor" style="display: none; overflow-x: scroll">
        <table class="w-100 mt-3 mx-3">
            {{-- RESECION TOP --}}
            <tr>
                @foreach ($array_vestibular_top_left as $item)
                    <td class="pb-1 text-center">
                        <div class="rectangular mouse-hand mouse-over_light"
                            onclick="alert('RESECION: {{ $item }}')"></div>
                    </td>
                @endforeach
                <td>
                    <div class="mx-3"></div>
                </td>
                @foreach ($array_vestibular_top_right as $item)
                    <td class="pb-1 text-center">
                        <div class="rectangular mouse-hand mouse-over_light"
                            onclick="alert('RESECION: {{ $item }}')"></div>
                    </td>
                @endforeach
            </tr>
            {{-- MOVILIDAD TOP --}}
            <tr>
                @foreach ($array_vestibular_top_left as $item)
                    <td class="text-center">
                        <div class="rectangular mouse-hand mouse-over_light"
                            onclick="alert('MOVILIDAD: {{ $item }}')"></div>
                    </td>
                @endforeach
                <td>
                    <div class="mx-3"></div>
                </td>
                @foreach ($array_vestibular_top_right as $item)
                    <td class="text-center">
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
                    <td>
                        <div class="div_container mt-2">
                            <div class="center mouse-hand mouse-over_light" onclick="alert('centro: {{ $item }}')">
                            </div>
                            <div class="top mouse-hand mouse-over_light" onclick="alert('arriba: {{ $item }}')">
                            </div>
                            <div class="left mouse-hand mouse-over_light" onclick="alert('izquierda: {{ $item }}')">
                            </div>
                            <div class="right mouse-hand mouse-over_light" onclick="alert('derecha: {{ $item }}')">
                            </div>
                            <div class="bottom mouse-hand mouse-over_light" onclick="alert('abajo: {{ $item }}')">
                            </div>
                        </div>
                    </td>
                @endforeach
                <td>
                    <div class="mx-3"></div>
                </td>
                @foreach ($array_vestibular_top_right as $item)
                    <td>
                        <div class="div_container mt-2">
                            <div class="center mouse-hand mouse-over_light" onclick="alert('centro: {{ $item }}')">
                            </div>
                            <div class="top mouse-hand mouse-over_light" onclick="alert('arriba: {{ $item }}')">
                            </div>
                            <div class="left mouse-hand mouse-over_light"
                                onclick="alert('izquierda: {{ $item }}')">
                            </div>
                            <div class="right mouse-hand mouse-over_light" onclick="alert('derecha: {{ $item }}')">
                            </div>
                            <div class="bottom mouse-hand mouse-over_light" onclick="alert('abajo: {{ $item }}')">
                            </div>
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
                    <td>
                        <div class="div_container mt-2">
                            <div class="center-circular mouse-hand mouse-over_light"
                                onclick="alert('centro: {{ $item }}')"></div>
                            <div class="top-circular mouse-hand mouse-over_light"
                                onclick="alert('arriba: {{ $item }}')"></div>
                            <div class="left-circular mouse-hand mouse-over_light"
                                onclick="alert('izquierda: {{ $item }}')"></div>
                            <div class="right-circular mouse-hand mouse-over_light"
                                onclick="alert('derecha: {{ $item }}')"></div>
                            <div class="bottom-circular mouse-hand mouse-over_light"
                                onclick="alert('abajo: {{ $item }}')"></div>
                        </div>
                    </td>
                @endforeach
                <td>
                    <div class="mx-3"></div>
                </td>
                @foreach ($array_lingual_top_right as $item)
                    <td>
                        <div class="div_container mt-2">
                            <div class="center-circular mouse-hand mouse-over_light"
                                onclick="alert('centro: {{ $item }}')"></div>
                            <div class="top-circular mouse-hand mouse-over_light"
                                onclick="alert('arriba: {{ $item }}')"></div>
                            <div class="left-circular mouse-hand mouse-over_light"
                                onclick="alert('izquierda: {{ $item }}')"></div>
                            <div class="right-circular mouse-hand mouse-over_light"
                                onclick="alert('derecha: {{ $item }}')"></div>
                            <div class="bottom-circular mouse-hand mouse-over_light"
                                onclick="alert('abajo: {{ $item }}')"></div>
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
                    <td>
                        <div class="div_container mt-2">
                            <div class="center-circular mouse-hand mouse-over_light"
                                onclick="alert('centro: {{ $item }}')"></div>
                            <div class="top-circular mouse-hand mouse-over_light"
                                onclick="alert('arriba: {{ $item }}')"></div>
                            <div class="left-circular mouse-hand mouse-over_light"
                                onclick="alert('izquierda: {{ $item }}')"></div>
                            <div class="right-circular mouse-hand mouse-over_light"
                                onclick="alert('derecha: {{ $item }}')"></div>
                            <div class="bottom-circular mouse-hand mouse-over_light"
                                onclick="alert('abajo: {{ $item }}')"></div>
                        </div>
                    </td>
                @endforeach
                <td>
                    <div class="mx-3"></div>
                </td>
                @foreach ($array_lingual_bottom_right as $item)
                    <td>
                        <div class="div_container mt-2">
                            <div class="center-circular mouse-hand mouse-over_light"
                                onclick="alert('centro: {{ $item }}')"></div>
                            <div class="top-circular mouse-hand mouse-over_light"
                                onclick="alert('arriba: {{ $item }}')"></div>
                            <div class="left-circular mouse-hand mouse-over_light"
                                onclick="alert('izquierda: {{ $item }}')"></div>
                            <div class="right-circular mouse-hand mouse-over_light"
                                onclick="alert('derecha: {{ $item }}')"></div>
                            <div class="bottom-circular mouse-hand mouse-over_light"
                                onclick="alert('abajo: {{ $item }}')"></div>
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
                    <td>
                        <div class="div_container mt-2">
                            <div class="center mouse-hand mouse-over_light"
                                onclick="alert('centro: {{ $item }}')"></div>
                            <div class="top mouse-hand mouse-over_light" onclick="alert('arriba: {{ $item }}')">
                            </div>
                            <div class="left mouse-hand mouse-over_light"
                                onclick="alert('izquierda: {{ $item }}')">
                            </div>
                            <div class="right mouse-hand mouse-over_light"
                                onclick="alert('derecha: {{ $item }}')">
                            </div>
                            <div class="bottom mouse-hand mouse-over_light"
                                onclick="alert('abajo: {{ $item }}')"></div>
                        </div>
                    </td>
                @endforeach
                <td>
                    <div class="mx-3"></div>
                </td>
                @foreach ($array_vestibular_bottom_right as $item)
                    <td>
                        <div class="div_container mt-2">
                            <div class="center mouse-hand mouse-over_light"
                                onclick="alert('centro: {{ $item }}')"></div>
                            <div class="top mouse-hand mouse-over_light" onclick="alert('arriba: {{ $item }}')">
                            </div>
                            <div class="left mouse-hand mouse-over_light"
                                onclick="alert('izquierda: {{ $item }}')">
                            </div>
                            <div class="right mouse-hand mouse-over_light"
                                onclick="alert('derecha: {{ $item }}')">
                            </div>
                            <div class="bottom mouse-hand mouse-over_light"
                                onclick="alert('abajo: {{ $item }}')"></div>
                        </div>
                    </td>
                @endforeach
            </tr>
            {{-- RESECION TOP --}}
            <tr>
                @foreach ($array_vestibular_bottom_left as $item)
                    <td class="pb-1 text-center">
                        <div class="rectangular mouse-hand mouse-over_light"
                            onclick="alert('RESECION: {{ $item }}')"></div>
                    </td>
                @endforeach
                <td>
                    <div class="mx-3"></div>
                </td>
                @foreach ($array_vestibular_bottom_right as $item)
                    <td class="pb-1 text-center">
                        <div class="rectangular mouse-hand mouse-over_light"
                            onclick="alert('RESECION: {{ $item }}')"></div>
                    </td>
                @endforeach
            </tr>
            {{-- MOVILIDAD TOP --}}
            <tr>
                @foreach ($array_vestibular_bottom_left as $item)
                    <td class="text-center">
                        <div class="rectangular mouse-hand mouse-over_light"
                            onclick="alert('MOVILIDAD: {{ $item }}')"></div>
                    </td>
                @endforeach
                <td>
                    <div class="mx-3"></div>
                </td>
                @foreach ($array_vestibular_bottom_right as $item)
                    <td class="text-center">
                        <div class="rectangular mouse-hand mouse-over_light"
                            onclick="alert('MOVILIDAD: {{ $item }}')"></div>
                    </td>
                @endforeach
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

            // codigo para agregar un triangulo rojo al div class="rectangular", con el evento onClick
            $(document).ready(function() {
                $('.rectangular').click(function() {
                    $(this).html('<div class="triangle"></div>');
                });
            });
        </script>
    </div>
@endsection

@section('script_final')
    <script></script>
@endsection
