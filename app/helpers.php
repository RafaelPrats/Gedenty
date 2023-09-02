<?php

use App\Models\Modelos\Usuario;
use Illuminate\Support\Facades\DB;

define('FR_CONSULTA', 0);
define('FR_ARREGLO', 1);
define('FR_JSON', 2);
define('FR_OPTION', 3);
define('FR_COMAS', 3);

define('TP_COMPLETO', 0);
define('TP_ABREVIADO', 1);
define('TP_MUY_ABREVIADO', 2);
define('TP_LETRA', 3);
define('TP_NUMERO', 4);

define('DIAS_SEMANA', serialize(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo']));
define('DIAS_SEMANA_ABREVIADOS', serialize(['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb', 'Dom']));
define('DIAS_SEMANA_MUY_ABREVIADOS', serialize(['Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do']));
define('DIAS_SEMANA_LETRA', serialize(['L', 'M', 'M', 'J', 'V', 'S', 'D']));
define('MESES', serialize(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']));
define('MESES_ABREVIADOS', serialize(['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sept', 'Oct', 'Nov', 'Dic']));
define('MESES_MUY_ABREVIADOS', serialize(['En', 'Fb', 'Mz', 'Ab', 'My', 'Jn', 'Jl', 'Ag', 'Sp', 'Oc', 'Nv', 'Dc']));
define('MESES_LETRA', serialize(['E', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D']));
define('MESES_NUMERO', serialize(['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']));
define('A_Z', serialize(range('A', 'Z')));

function getUsuario($usuario)
{
    $r = Usuario::find($usuario);
    return $r;
}

function espacios($texto) //---- Elimina espacios de los extremos de la cadena y deja un solo espacio entre palabras
{
    $txt = trim($texto);
    $arr_variantes = [
        '  ' => ' ', ' ,' => ',', ' .' => '.', ' :' => ':', ' ?' => '?', '¿ ' => '¿', ' !' => '!', '¡ ' => '¡',
        '( ' => '(', ' )' => ')', '[ ' => '[', ' ]' => ']', '{ ' => '{', ' }' => '}', '" ' => '"', ' "' => '"'
    ];
    foreach ($arr_variantes as $variante => $substituto) {
        while ($txt != str_replace($variante, $substituto, $txt)) $txt = str_replace($variante, $substituto, $txt);
    }

    return $txt;
}

function getGruposMenuByUsuario($user)
{
    return DB::table('rol_menu as rm')
        ->join('usuario as u', 'u.id_rol', '=', 'rm.id_rol')
        ->join('menu as m', 'm.id_menu', '=', 'rm.id_menu')
        ->join('grupo_menu as g', 'g.id_grupo_menu', '=', 'm.id_grupo_menu')
        ->select('g.nombre', 'm.id_grupo_menu')->distinct()
        ->where('u.id_usuario', $user)
        ->where('g.estado', 1)
        ->where('m.estado', 1)
        ->orderBy('g.nombre')
        ->get();
}

function getMenuByUsuarioGrupo($user, $grupo)
{
    return DB::table('rol_menu as rm')
        ->join('usuario as u', 'u.id_rol', '=', 'rm.id_rol')
        ->join('menu as m', 'm.id_menu', '=', 'rm.id_menu')
        ->select('m.nombre', 'rm.id_menu', 'm.url', 'm.icono')->distinct()
        ->where('u.id_usuario', $user)
        ->where('m.id_grupo_menu', $grupo)
        ->where('m.estado', 1)
        ->orderBy('m.nombre')
        ->get();
}

function getDias($tipo = TP_COMPLETO, $formato = FR_ARREGLO, $primeroDomingo = false)
{ //Devuelve los días de la semanas o como arreglo o como cadena para formar arreglo
    $resultado = '';
    switch ($tipo) {
        case TP_ABREVIADO:
            $valor = unserialize(DIAS_SEMANA_ABREVIADOS);
            break;

        case TP_MUY_ABREVIADO:
            $valor = unserialize(DIAS_SEMANA_MUY_ABREVIADOS);
            break;

        case TP_LETRA:
            $valor = unserialize(DIAS_SEMANA_LETRA);
            break;
        default:
            $valor = unserialize(DIAS_SEMANA);
            break;
    }
    if ($primeroDomingo) {
        $valor = array_merge([array_last($valor)], $valor);
        array_pop($valor);
    }
    switch ($formato) {
        case FR_COMAS:
            foreach ($valor as $item) {
                $resultado .= (($resultado == '') ? '\'' . $item : ',' . '\'' . $item) . '\'';
            }
            $resultado = '[' . $resultado . ']';
            break;

        default:
            $resultado = $valor;
            break;
    }
    return $resultado;
}

function getDiaSemanaByFecha($fecha)
{
    $dias = array('Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom');
    $dia = $dias[(date('N', strtotime($fecha))) - 1];
    return $dia;
}

function convertDatetimeToText($fecha)
{
    $dia = substr($fecha, 8, 2);
    $mes = substr($fecha, 5, 2);
    $anno = substr($fecha, 0, 4);
    $hora = substr($fecha, 11, 5);

    return $dia . ' de ' . getMeses(TP_COMPLETO, FR_ARREGLO)[intval($mes - 1)] . ' del ' . $anno . ' a las ' . $hora;
}

function convertDateToText($fecha)
{
    $dia = substr($fecha, 8, 2);
    $mes = substr($fecha, 5, 2);
    $anno = substr($fecha, 0, 4);

    return $dia . ' de ' . getMeses(TP_ABREVIADO, FR_ARREGLO)[intval($mes - 1)] . ' del ' . $anno;
}


function getMeses($tipo = TP_COMPLETO, $formato = FR_ARREGLO)
{  //Devuelve los meses del año o como arreglo o como cadena para formar arreglo
    $resultado = '';
    switch ($tipo) {
        case TP_ABREVIADO:
            $valor = unserialize(MESES_ABREVIADOS);
            break;

        case TP_MUY_ABREVIADO:
            $valor = unserialize(MESES_MUY_ABREVIADOS);
            break;

        case TP_LETRA:
            $valor = unserialize(MESES_LETRA);
            break;

        case TP_NUMERO:
            $valor = unserialize(MESES_NUMERO);
            break;
        default:
            $valor = unserialize(MESES);
            break;
    }
    switch ($formato) {
        case FR_COMAS:
            foreach ($valor as $item) {
                $resultado .= (($resultado == '') ? '\'' . $item : ',' . '\'' . $item) . '\'';
            }
            $resultado = '[' . $resultado . ']';
            break;

        default:
            $resultado = $valor;
            break;
    }

    return $resultado;
}

function hoy()
{
    return date('Y-m-d');
}

function opHorasFecha($operador, $horas, $fecha)
{
    $r = strtotime('' . $operador . '' . $horas . ' hour', strtotime($fecha));
    return date('Y-m-d H:i', $r);
}

function difFechas($max, $min)
{
    $datetime1 = date_create($min);
    $datetime2 = date_create($max);

    return date_diff($datetime1, $datetime2);
}

function opDiasFecha($operador, $dias, $fecha)
{
    $r = strtotime('' . $operador . '' . $dias . ' day', strtotime($fecha));
    return date('Y-m-d', $r);
}

/* ================ LA FUNCION date('w', fecha) DE PHP DEVUELVE 0=>DOMINGO, 6=>SABADO =====================*/
function transformDiaPhp($dia)
{
    if ($dia == 0)
        return 6;
    else if ($dia == 1)
        return 0;
    else if ($dia == 2)
        return 1;
    else if ($dia == 3)
        return 2;
    else if ($dia == 4)
        return 3;
    else if ($dia == 5)
        return 4;
    else
        return 5;
}

// Función que realiza una operación matemática completa sobre un número
function convertirNumero($numero)
{
    $resultado = ($numero * 2) + 8;
    return $resultado;
}

// Función que deshace una operación matemática completa sobre un número
function revertirConversion($resultado)
{
    $numero = ($resultado - 8) / 2;
    return $numero;
}
