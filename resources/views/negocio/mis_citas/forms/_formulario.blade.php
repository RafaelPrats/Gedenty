@if ($historia != '')
    <legend style="font-size: 1em" class="text-center">
        <i class="fa fa-fw fa-refresh mouse-hand" id="icon_cargando_formulario"
            onclick="recargar_formulario_completo()"></i>
        Formulario de consulta, paciente: "<b>{{ $paciente->nombres . ' ' . $paciente->apellidos }}</b>"
    </legend>
    <input type="hidden" id="id_formulario" value="{{ $formulario->id_formulario }}">

    <div class="div_content_formulario" id="div_form_1"></div>
    <div class="div_content_formulario" id="div_form_2"></div>
    <div class="div_content_formulario" id="div_form_3"></div>
    <div class="div_content_formulario" id="div_form_4"></div>
    <div class="div_content_formulario" id="div_form_5"></div>
    <div class="div_content_formulario mb-2" id="div_form_6"></div>
    <div class="div_content_formulario" id="div_form_10"></div>
    <div class="div_content_formulario" id="div_form_11"></div>

    <style>
        .girando {
            animation: girando 1s linear infinite;
        }

        @keyframes girando {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <script>
        recargar_formulario_completo();

        function recargar_formulario_completo() {
            $('#icon_cargando_formulario').addClass('girando');
            $('.div_content_formulario').html('');
            setTimeout(() => {
                getForm1();
                setTimeout(() => {
                    getForm2();
                    setTimeout(() => {
                        getForm3();
                        setTimeout(() => {
                            getForm4();
                            setTimeout(() => {
                                getForm5();
                                setTimeout(() => {
                                    getForm6();
                                    setTimeout(() => {
                                        getForm10();
                                        setTimeout(() => {
                                            getForm11();
                                            setTimeout(
                                                () => {
                                                    $('#icon_cargando_formulario')
                                                        .removeClass(
                                                            'girando'
                                                        );
                                                }, 500);
                                        }, 500);
                                    }, 500);
                                }, 500);
                            }, 500);
                        }, 500);
                    }, 500);
                }, 500);
            }, 500);
        }

        function getForm1() {
            datos = {
                formulario: $('#id_formulario').val(),
            }
            get_jquery('{{ url('mis_citas/getForm1') }}', datos, function(retorno) {
                $('#div_form_1').html(retorno)
            }, 'tab-formulariox');
        }

        function getForm2() {
            datos = {
                formulario: $('#id_formulario').val(),
            }
            get_jquery('{{ url('mis_citas/getForm2') }}', datos, function(retorno) {
                $('#div_form_2').html(retorno)
            }, 'tab-formulariox');
        }

        function getForm3() {
            datos = {
                formulario: $('#id_formulario').val(),
            }
            get_jquery('{{ url('mis_citas/getForm3') }}', datos, function(retorno) {
                $('#div_form_3').html(retorno)
            }, 'tab-formulariox');
        }

        function getForm4() {
            datos = {
                formulario: $('#id_formulario').val(),
            }
            get_jquery('{{ url('mis_citas/getForm4') }}', datos, function(retorno) {
                $('#div_form_4').html(retorno)
            }, 'tab-formulariox');
        }

        function getForm5() {
            datos = {
                formulario: $('#id_formulario').val(),
            }
            get_jquery('{{ url('mis_citas/getForm5') }}', datos, function(retorno) {
                $('#div_form_5').html(retorno)
            }, 'tab-formulariox');
        }

        function getForm6() {
            datos = {
                formulario: $('#id_formulario').val(),
            }
            get_jquery('{{ url('mis_citas/getForm6') }}', datos, function(retorno) {
                $('#div_form_6').html(retorno)
            }, 'div_form_6');
        }

        function getForm10() {
            datos = {
                formulario: $('#id_formulario').val(),
            }
            get_jquery('{{ url('mis_citas/getForm10') }}', datos, function(retorno) {
                $('#div_form_10').html(retorno)
            }, 'tab-formulariox');
        }

        function getForm11() {
            datos = {
                formulario: $('#id_formulario').val(),
            }
            get_jquery('{{ url('mis_citas/getForm11') }}', datos, function(retorno) {
                $('#div_form_11').html(retorno)
            }, 'tab-formulariox');
        }
    </script>
@endif
