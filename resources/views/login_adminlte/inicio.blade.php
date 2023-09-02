<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gedenty | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('adminlte/dist/css/adminlte.min.css') }}">

    <link href="{{ url('css/bootstrapValidator.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/mis_estilos.css') }}" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.6.3.slim.js"
        integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>

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

<body class="hold-transition login-page dark-mode">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('') }}"><b>Gedenty</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Ingrese sus credenciales para comezar</p>

                <form action="{{ url('login') }}" method="post" id="form_login">
                    {!! csrf_field() !!}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" id="username"
                            name="username" value="{{ old('username') }}" autofocus required autocomplete="off"
                            style="text-transform: lowercase">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" id="password"
                            name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" id="btn_login"
                            class="btn btn-primary btn-block btn-flat border_radius-gedenty">Comenzar</button>
                    </div>
                    <input type="hidden" name="h_clave" id="h_clave" value="">
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


    <div class="modal fade" id="modal-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="title-modal_1"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="body-modal_1">
                </div>
                <div class="modal-footer justify-content-between" id="footer-modal_1">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- jQuery -->
    <script src="{{ url('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('adminlte/dist/js/adminlte.min.js') }}"></script>

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
