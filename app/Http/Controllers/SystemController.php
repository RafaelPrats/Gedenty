<?php

namespace App\Http\Controllers;

use App\Models\Modelos\Usuario;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpseclib\Crypt\RSA;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SystemController extends Controller
{
    public function login(Request $request)
    {
        $rsa = new RSA();
        $rsa->setPublicKeyFormat(RSA::PUBLIC_FORMAT_RAW);
        $k = $rsa->createKey();

        Session::put('key_publica', $k['publickey']);
        Session::put('key_privada', $k['privatekey']);

        if (!$request->session()->has('logeado')) { // Si no tiene variable logeado la session? logeado = false;
            Session::put('logeado', false);
        };

        if (!$request->session()->get('logeado')) { // Si no está logeado

            $rsa->loadKey(Session::get('key_privada'));
            $raw = $rsa->getPublicKey(RSA::PUBLIC_FORMAT_RAW);

            return view('login.inicio', [
                'key' => $raw['n']->toHex(),
            ]);
        };

        return redirect('/');   // Si está logeado redirect a inicio
    }

    public function verificaUsuario(Request $request)
    {
        $valida = Validator::make($request->all(), [
            'username' => 'required|max:250',
            'h_clave' => 'required',
            //'g-recaptcha-response' => 'required|captcha'
            //'captcha' => 'required|captcha',
        ], [
            'username.max' => 'El nombre de usuario es muy grande',
            'username.required' => 'El nombre de usuario es obligatorio',
            'h_clave.required' => 'La contraseña es obligatoria',
            'g-recaptcha-response.required' => 'Haga clic en el captcha de seguridad y espere a que verifique que no es un robot',
            'g-recaptcha-response.captcha' => 'El código de verificación es incorrecto',
            //'captcha.required' => 'El código de verificación es obligatorio',
            //'captcha.captcha' => 'El código de verificación es incorrecto',
        ]);
        $msg = '';
        $success = true;
        if (!$valida->fails()) {
            $clave = $this->decrypt(Session::get('key_privada'), $request->h_clave);
            $usuario = Usuario::All()->where('username', '=', $request->username)->first();
            $err_usr = true;
            $err_pss = true;

            if ($usuario != '') {
                $err_usr = false;
                if ($usuario->estado == 1) {
                    if (Hash::check($clave, $usuario->password)) {
                        $err_pss = false;
                        Session::put('logeado', true);
                        Session::put('last_quest', date('Y-m-d H:i:s'));
                        Session::put('id_usuario', $usuario->id_usuario);
                        Session::put('tipo_usuario', $usuario->tipo);
                        Session::put('id_rol', $usuario->id_rol);
                    }
                } else {
                    $err_usr = false;
                    $err_pss = false;
                    $msg = '<div class="alert alert-danger text-center border_radius-gedenty text-white">Su usario ha sido desactivado.
                            Póngase en contacto con el administrador al correo <strong>' . env('MAIL_ADMIN') . '</strong></div>';
                    $success = false;
                }
            }
            if ($err_usr) {
                $msg = 'Fallo de inicio de sesión con el usuario . Error de contraseña o de usuario';
                $success = false;
            } elseif ($err_pss) {
                $msg = 'Fallo de inicio de sesión con el usuario . Error de contraseña o de usuario';
                $success = false;
            }
        } else {
            $success = false;
            $errores = '';
            foreach ($valida->errors()->all() as $mi_error) {
                if ($errores == '') {
                    $errores = '<li>' . $mi_error . '</li>';
                } else {
                    $errores .= '<li>' . $mi_error . '</li>';
                }
            }
            $msg = '<div class="alert alert-danger border_radius-gedenty text-white">' .
                '<p class="text-center">¡Por favor corrija los siguientes errores!</p>' .
                '<ul>' .
                $errores .
                '</ul>' .
                '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    function decrypt($privatekey, $encrypted)
    {
        $rsa = new RSA();

        $encrypted = pack('H*', $encrypted);

        $rsa->loadKey($privatekey);
        $rsa->setEncryptionMode(RSA::ENCRYPTION_PKCS1);
        return $rsa->decrypt($encrypted);
    }

    public function logout(Request $request)
    {
        if (!$request->session()->has('logeado')) {
            Session::put('logeado', false);
        };
        Session::put('logeado', false);
        Session::flush();
        DB::disconnect();
        return redirect('');
    }
}
