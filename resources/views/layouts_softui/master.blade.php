<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="softui/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ url('images/logo_app.png') }}">
    <title>
        Gedenty - @yield('titulo')
    </title>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ url('softui/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('softui/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ url('softui/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ url('softui/assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ url('overlay_minimal/loading-overlay.jquery.css') }}" />
    <script src="{{ url('overlay_minimal/loading-overlay.jquery.js') }}"></script>

    {{-- SweetAlert2 --}}
    <script src="{{ url('sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ url('sweetalert2/dist/sweetalert2.min.css') }}">

    <link href="{{ url('css/mis_estilos.css') }}" rel="stylesheet" />

    <!-- Enlaza el CSS de jQuery UI -->
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Enlaza jQuery -->
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Enlaza jQuery UI -->
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
</head>

<body class="g-sidenav-show bg-gray-100">
    @include('layouts_softui.partials.menu_izquierda')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts_softui.partials.menu_superior')

        <!-- End Navbar -->
        <div class="container-fluid">
            @yield('contenido')
        </div>
    </main>

    <div class="modal fade" id="modal-view1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="modal-content-view1">
                <div class="modal-header">
                    <h6 class="modal-title" id="title-modal_view1"></h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="body-modal_view1">
                </div>
                <div class="modal-footer" id="footer-modal_view1">
                    <button type="button" class="btn bg-gradient-secondary mb-0 mt-0"
                        data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-quest1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="modal-content-quest1">
                <div class="modal-header">
                    <h6 class="modal-title" id="title-modal_quest1">
                        <i class="fa fa-fw fa-exclamation-triangle"></i> Mensaje de confirmacion
                    </h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="body-modal_quest1">
                </div>
                <div class="modal-footer" id="footer-modal_quest1">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="title-modal_1"></h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="body-modal_1">
                </div>
                <div class="modal-footer" id="footer-modal_1">
                    <button type="button" class="btn bg-gradient-secondary mb-0 mt-0" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    @include('layouts_softui.partials.manual_usuario')

    <!--   Core JS Files   -->
    <script src="{{ url('softui/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('softui/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('softui/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('softui/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ url('softui/assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>

    <script src="{{ url('overlay_minimal/loading-overlay.jquery.js') }}"></script>

    <script>
        function overlayTrue(item = '') {
            item = item == '' ? 'body' : item;
            $(item).loadingOverlay(true, {
                backgroundColor: 'rgba(0,0,0,0.65)',
            });
        }

        function overlayFalse(item = '') {
            item = item == '' ? 'body' : item;
            $(item).loadingOverlay(false);
        }

        function cargar_url(url) {
            overlayTrue();
            location.href = '{{ url('') }}/' + url;
            overlayFalse();
        }

        function alerta(mensaje) {
            $('#modal-1').modal('show');
            $('#title-modal_1').html('Mensaje del sistema');
            $('#body-modal_1').html(mensaje);
        }

        function alerta_accion(mensaje, funcion) {
            $('#modal-1').modal('show');
            $('#title-modal_1').html('Mensaje del sistema');
            $('#body-modal_1').html(mensaje);
            $('#footer-modal_1').html(
                '<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>' +
                '<button type="button" class="btn btn-sm btn-primary" id="btn_aceptar_modal_1">Aceptar</button>'
            );
            $('#btn_aceptar_modal_1').on('click', function() {
                funcion();
            })
        }

        function modal_view1(mensaje, titulo, size = '100%') {
            $('#modal-view1').modal('show');
            $('#title-modal_view1').html(titulo);
            $('#body-modal_view1').html(mensaje);
            $('#modal-content-view1').css('width', size);
        }

        function modal_quest1(mensaje, size = '100%', success) {
            $('#modal-quest1').modal('show');
            $('#body-modal_quest1').html(mensaje);
            $('#modal-content-quest1').css('width', size);
            $('#footer-modal_quest1').html(
                '<button type="button" class="btn bg-gradient-secondary mb-0 mt-0" data-bs-dismiss="modal">Cancelar</button>' +
                '<button type="button" class="btn bg-gradient-primary mb-0 mt-0" id="btn-aceptar_quest1" data-bs-dismiss="modal">Aceptar</button>'
            );
            $('#btn-aceptar_quest1').on('click', function() {
                success();
            })
        }

        function mini_alerta(icon, texto, timer = '') {
            var MiniAlert = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showCloseButton: true,
                timer: timer
            });
            MiniAlert.fire({
                icon: icon,
                html: '<small class="text-center">' + texto + '</small>'
            });
        }

        function get_jquery(url, datos, funcion, div = false) {
            div == false ? overlayTrue() : overlayTrue('#' + div);
            $.get(url, datos, function(retorno) {
                funcion(retorno);
            }).always(function() {
                div == false ? overlayFalse() : overlayFalse('#' + div);
            });
        }

        function post_jquery_m(url, datos, success, div = false) {
            div == false ? overlayTrue() : overlayTrue('#' + div);
            $.post(url, datos, function(retorno) {
                if (retorno.success) {
                    mini_alerta('success', retorno.mensaje, 5000);
                    success();
                } else {
                    alerta(retorno.mensaje);
                }
            }, 'json').fail(function(retorno) {
                console.log(retorno);
                alerta(retorno.responseText);
                alert('Ha ocurrido un problema al enviar la información');
            }).always(function() {
                div == false ? overlayFalse() : overlayFalse('#' + div);
            });
        }

        function cerrar_modals() {
            $('#modal-quest1').modal('hide');
            $('#modal-view1').modal('hide');
            $('#modal-1').modal('hide');
            $('#title-modal_view1').html('');
            $('#body-modal_view1').html('');
            $('#title-modal_1').html('');
            $('#body-modal_1').html('');
            $('#footer-modal_1').html('');
            $('#footer-modal_quest1').html('');
        }

        // Función que realiza una operación matemática completa sobre un número
        function convertirNumero(numero) {
            let resultado = (numero * 2) + 8;
            return resultado;
        }

        // Función que deshace una operación matemática completa sobre un número
        function revertirConversion(resultado) {
            let numero = (resultado - 8) / 2;
            return numero;
        }
    </script>

    @yield('script_final')
</body>

</html>
