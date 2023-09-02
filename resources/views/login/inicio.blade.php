<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('images/logo_app.png') }}">
    <link rel="icon" type="image/png" href="{{ url('images/logo_app.png') }}">
    <title>
        Gedenty - Login
    </title>
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

    <script language="JavaScript" type="text/javascript" src="{{ url('js/rsa/jsbn.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ url('js/rsa/jsbn2.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ url('js/rsa/prng4.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ url('js/rsa/rng.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ url('js/rsa/rsa.js') }}"></script>
    <script language="JavaScript" type="text/javascript" src="{{ url('js/rsa/rsa2.js') }}"></script>

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ url('overlay_minimal/loading-overlay.jquery.css') }}" />
    <script src="{{ url('overlay_minimal/loading-overlay.jquery.js') }}"></script>
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="javascript:void(0)"
                            onclick="cargar_url('')" style="font-size: 2em">
                            <img src="{{ url('images/logo_app.png') }}" alt="" style="width: 50px"> Gedenty
                        </a>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-primary text-gradient">Bienvenido</h3>
                                    <p class="mb-0">Ingrese sus credenciales para comenzar</p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('login') }}" method="post" id="form_login">
                                        {!! csrf_field() !!}
                                        <label>Nombre de usuario</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Nombre de usuario"
                                                id="username" name="username" value="{{ old('username') }}" autofocus
                                                required autocomplete="off" style="text-transform: lowercase">
                                        </div>
                                        <label>Contraseña</label>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" placeholder="Contraseña"
                                                id="password" name="password" required>
                                        </div>
                                        {{-- <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe"
                                                checked="">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div> --}}
                                        <div class="text-center">
                                            <button type="button" class="btn bg-gradient-primary w-100 mt-4 mb-0"
                                                id="btn_login">
                                                Comenzar
                                            </button>
                                        </div>
                                        <input type="hidden" name="h_clave" id="h_clave" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url('{{ url('softui/assets/img/curved-images/curved6.jpg') }}')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4 mx-auto text-center">
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Company
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        About Us
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Team
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Products
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                        Pricing
                    </a>
                </div>
                <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-twitter"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-instagram"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-github"></span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> by Gedenty Team.
                    </p>
                </div>
            </div>
        </div>
    </footer>

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
                <div class="modal-footer justify-content-between" id="footer-modal_1">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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
        var password = $('#password');
        var formulario = $('#form_login');
        var h_clave = $('#h_clave');

        $('#btn_login').on('click', function() {
            overlayTrue();
            $('#username').val($('#username').val().toLowerCase());
            var publickey = "{{ $key }}";
            var rsakey = new RSAKey();
            rsakey.setPublic(publickey, "10001");
            console.log(rsakey);
            h_clave.val(rsakey.encrypt(password.val()));
            password.val('');

            //--------------------------------- post_ajax ----------------------------
            var formData = new FormData(formulario[0]);
            //hacemos la petición ajax
            $.ajax({
                url: formulario.attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                //necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,

                success: function(retorno) {
                    if (retorno.success) {
                        location.href = '{{ url('') }}';
                    } else {
                        alerta_accion(retorno.mensaje, function() {
                            cargar_url('');
                        });
                    }
                    overlayFlase();
                },
                //si ha ocurrido un error
                error: function(retorno) {
                    console.log(retorno);
                    alerta(retorno.responseText);
                    overlayFlase();
                }
            });
        });

        function overlayTrue(item = '') {
            item = item == '' ? 'body' : item;
            $(item).loadingOverlay(true, {
                backgroundColor: 'rgba(0,0,0,0.65)',
            });
        }

        function overlayFlase(item = '') {
            item = item == '' ? 'body' : item;
            $(item).loadingOverlay(false);
        }

        function cargar_url(url) {
            overlayTrue();
            location.href = '{{ url('') }}/' + url;
            overlayFlase();
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
    </script>
</body>

</html>
