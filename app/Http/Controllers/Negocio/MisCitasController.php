<?php

namespace App\Http\Controllers\Negocio;

use App\Http\Controllers\Controller;
use App\Models\Modelos\Cita;
use App\Models\Modelos\HistoriaClinica;
use App\Models\Modelos\Horario;
use App\Models\Modelos\Labor;
use App\Models\Modelos\Menu;
use App\Models\Modelos\Paciente;
use App\Models\Modelos\Formulario;
use App\Models\Modelos\MotivoConsulta;
use App\Models\Modelos\EnfermedadActual;
use App\Models\Modelos\Antecedentes;
use App\Models\Modelos\ExamenSistemaEst;
use App\Models\Modelos\PlanesDiagnostico;
use App\Models\Modelos\SignosVitales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MisCitasController extends Controller
{
    public function inicio(Request $request)
    {
        $usuario_logeado = getUsuario(session('id_usuario'));
        $mis_sucursales = DB::table('usuario_sucursal as us')
            ->join('sucursal as s', 's.id_sucursal', '=', 'us.id_sucursal')
            ->join('empresa as e', 'e.id_empresa', '=', 's.id_empresa')
            ->select('us.id_sucursal', 's.nombre as nombre_sucursal', 'e.nombre as nombre_empresa')->distinct()
            ->where('us.id_usuario', session('id_usuario'))
            ->orderBy('s.id_empresa')
            ->orderBy('e.nombre')
            ->orderBy('s.nombre')
            ->get();
        return view('negocio.mis_citas.inicio', [
            'url' => substr($request->getRequestUri(), 1),
            'menu' => Menu::Where('url', '=', substr($request->getRequestUri(), 1))->get()[0],
            'mis_sucursales' => $mis_sucursales,
            'usuario_logeado' => $usuario_logeado,
        ]);
    }

    public function listar_reporte(Request $request)
    {
        $dia = date('N', strtotime($request->fecha)) - 1;
        $id_usuario = isset($request->especialista) ? $request->especialista : session('id_usuario');
        $horarios = Horario::join('horario_dia as hd', 'hd.id_horario', '=', 'horario.id_horario')
            ->select('horario.*')->distinct()
            ->where('hd.dia', $dia)
            ->where('horario.id_usuario', $id_usuario)
            ->where('horario.id_sucursal', $request->sucursal)
            ->orderBy('horario.desde')
            ->get();
        $listado = [];
        foreach ($horarios as $h) {
            $cita = Cita::All()
                ->where('estado', 1)
                ->where('desde', $h->desde)
                ->where('hasta', $h->hasta)
                ->where('fecha', $request->fecha)
                ->where('id_sucursal', $h->id_sucursal)
                ->where('id_usuario', $id_usuario)
                ->first();
            $listado[] = [
                'horario' => $h,
                'cita' => $cita,
            ];
        }
        return view('negocio.mis_citas.partials.listado', [
            'listado' => $listado,
            'fecha' => $request->fecha,
        ]);
    }

    public function agendar_cita(Request $request)
    {
        $horario = Horario::find($request->horario);
        $especialidades = Labor::where('id_usuario', $horario->id_usuario)
            ->orderBy('nombre')
            ->get();
        return view('negocio.mis_citas.forms.agendar_cita', [
            'horario' => $horario,
            'fecha' => $request->fecha,
            'especialidades' => $especialidades,
        ]);
    }

    public function buscar_paciente(Request $request)
    {
        $paciente = Paciente::All()
            ->where('identificacion', '=', $request->cedula)
            ->where('estado', 1)
            ->first();
        $id_paciente = $paciente != '' ? $paciente->id_paciente : '';
        $nombres = $paciente != '' ? $paciente->nombres : '';
        $apellidos = $paciente != '' ? $paciente->apellidos : '';
        return [
            'id_paciente' => $id_paciente,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
        ];
    }

    public function store_cita(Request $request)
    {
        $valida = Validator::make($request->all(), [
            'cedula_paciente' => 'required',
            'nombres_paciente' => 'required',
            'apellidos_paciente' => 'required',
            'id_especialidad' => 'required',
        ], [
            'id_especialidad.required' => 'La especialidad es obligatoria',
            'cedula_paciente.required' => 'La cedula del paciente es obligatoria',
            'nombres_paciente.required' => 'Los nombres del paciente son obligatorio',
            'apellidos_paciente.required' => 'Los apellidos del paciente son obligatorio',
        ]);
        if (!$valida->fails()) {
            DB::beginTransaction();
            try {
                $id_usuario = isset($request->especialista) ? $request->especialista : session('id_usuario');
                if ($request->id_paciente == '') {
                    $paciente = new Paciente();
                    $paciente->nombres = espacios(mb_strtoupper($request->nombres_paciente));
                    $paciente->apellidos = espacios(mb_strtoupper($request->apellidos_paciente));
                    $paciente->identificacion = espacios(mb_strtoupper($request->cedula_paciente));
                    $paciente->save();
                    $paciente = Paciente::All()
                        ->where('identificacion', espacios(mb_strtoupper($request->cedula_paciente)))
                        ->first();
                } else {
                    $paciente = Paciente::find($request->id_paciente);
                }

                $horario = Horario::find($request->horario);

                $cita = new Cita();
                $cita->fecha = $request->fecha;
                $cita->desde = $horario->desde;
                $cita->hasta = $horario->hasta;
                $cita->id_sucursal = $horario->id_sucursal;
                $cita->id_paciente = $paciente->id_paciente;
                $cita->id_labor = $request->id_especialidad;
                $cita->id_usuario = $id_usuario;
                $cita->save();

                $success = true;
                $msg = 'Se ha <b>AGENDADO</b> la cita correctamente';

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $success = false;
                $msg = '<div class="alert alert-danger text-center text-white">' .
                    '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                    '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                    . '</div>';
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

    public function cancelar_cita(Request $request)
    {
        DB::beginTransaction();
        try {
            $cita = Cita::find($request->id);
            $cita->estado = 0;
            $cita->save();

            $success = true;
            $msg = 'Se ha <b>CANCELADO</b> la cita correctamente';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $msg = '<div class="alert alert-danger text-center text-white">' .
                '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                . '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    public function confirmar_cita(Request $request)
    {
        $id = revertirConversion($request->id);
        $cita = Cita::find($id);
        $paciente = $cita->paciente;
        $historia = $paciente->historia_clinica;
        if ($historia != '') {
            $formulario = Formulario::All()
                ->where('id_cita', $cita->id_cita)
                ->where('id_historia_clinica', $historia->id_historia_clinica)
                ->first();
            if ($formulario == '') {
                $formulario = new Formulario();
                $formulario->id_cita = $cita->id_cita;
                $formulario->fecha = $cita->fecha;
                $formulario->id_historia_clinica = $historia->id_historia_clinica;
                $formulario->save();
                $formulario = Formulario::All()
                    ->where('id_cita', $cita->id_cita)
                    ->where('id_historia_clinica', $historia->id_historia_clinica)
                    ->first();
            }
        }
        return view('negocio.mis_citas.forms.confirmar_cita', [
            'cita' => $cita,
            'paciente' => $paciente,
            'historia' => $historia,
            'formulario' => isset($formulario) ? $formulario : '',
        ]);
    }

    public function store_historia(Request $request)
    {
        $valida = Validator::make($request->all(), [
            'codigo_historia' => 'required',
            'fecha_historia' => 'required',
            'fecha_nacimiento' => 'required',
        ], [
            'codigo_historia.required' => 'El numero de la historia es obligatorio',
            'fecha_historia.required' => 'La fecha de registro es obligatoria',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
        ]);
        if (!$valida->fails()) {
            DB::beginTransaction();
            try {
                $model = HistoriaClinica::find($request->id_historia);
                if ($model == '') {
                    $existe = HistoriaClinica::All()
                        ->where('codigo', mb_strtoupper($request->codigo_historia))
                        ->first();
                    if ($existe == '') {
                        $model = new HistoriaClinica();
                        $model->id_paciente = $request->id_paciente;
                        $model->fecha_nacimiento = $request->fecha_nacimiento;
                        $model->sexo = $request->sexo;
                        $model->fecha_registro = hoy();
                        $model->codigo = mb_strtoupper($request->codigo_historia);
                        $model->save();
                    } else {
                        $success = false;
                        $msg = '<div class="alert alert-danger text-center border_radius-gedenty text-white">' .
                            'El numero de historia ya existe' .
                            '</div>';
                        return [
                            'success' => $success,
                            'mensaje' => $msg,
                        ];
                    }
                } else {
                    $existe = HistoriaClinica::All()
                        ->where('codigo', mb_strtoupper($request->codigo_historia))
                        ->where('id_historia_clinica', '!=', $request->id_historia)
                        ->first();
                    if ($existe == '') {
                        $model->fecha_nacimiento = $request->fecha_nacimiento;
                        $model->sexo = $request->sexo;
                        $model->codigo = mb_strtoupper($request->codigo_historia);
                        $model->save();
                    } else {
                        $success = false;
                        $msg = '<div class="alert alert-danger text-center border_radius-gedenty text-white">' .
                            'El numero de historia ya existe' .
                            '</div>';
                        return [
                            'success' => $success,
                            'mensaje' => $msg,
                        ];
                    }
                }

                $success = true;
                $msg = 'Se ha <b>GUARDADO</b> la historia correctamente';

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $success = false;
                $msg = '<div class="alert alert-danger text-center text-white">' .
                    '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                    '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                    . '</div>';
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

    /* CONTENIDO DEL FORMULARIO */
    public function getForm1(Request $request)
    {
        $model = MotivoConsulta::All()
            ->where('id_formulario', $request->formulario)
            ->first();
        return view('negocio.mis_citas.forms.partials.form1', [
            'model' => $model
        ]);
    }

    public function getForm2(Request $request)
    {
        $model = EnfermedadActual::All()
            ->where('id_formulario', $request->formulario)
            ->first();
        return view('negocio.mis_citas.forms.partials.form2', [
            'model' => $model
        ]);
    }

    public function getForm3(Request $request)
    {
        $model = Antecedentes::All()
            ->where('id_formulario', $request->formulario)
            ->first();
        if ($model == '') {
            $formulario = Formulario::find($request->formulario);
            $model = Antecedentes::join('formulario as f', 'f.id_formulario', '=', 'antecedentes.id_formulario')
                ->select('antecedentes.*')->distinct()
                ->where('f.id_historia_clinica', $formulario->id_historia_clinica)
                ->orderBy('f.fecha', 'desc')
                ->get()->first();
        }
        return view('negocio.mis_citas.forms.partials.form3', [
            'model' => $model
        ]);
    }

    public function getForm4(Request $request)
    {
        $model = SignosVitales::All()
            ->where('id_formulario', $request->formulario)
            ->first();
        return view('negocio.mis_citas.forms.partials.form4', [
            'model' => $model
        ]);
    }

    public function getForm5(Request $request)
    {
        $model = ExamenSistemaEst::All()
            ->where('id_formulario', $request->formulario)
            ->first();
        return view('negocio.mis_citas.forms.partials.form5', [
            'model' => $model
        ]);
    }

    public function getForm6(Request $request)
    {
        $array_vestibular_top_left = [18, 17, 16, 15, 14, 13, 12, 11];
        $array_vestibular_top_right = [21, 22, 23, 24, 25, 26, 27, 28];
        $array_lingual_top_left = [55, 54, 53, 52, 51];
        $array_lingual_top_right = [61, 62, 63, 64, 65];
        $array_lingual_bottom_left = [85, 84, 83, 82, 81];
        $array_lingual_bottom_right = [71, 72, 73, 74, 75];
        $array_vestibular_bottom_left = [48, 47, 46, 45, 44, 43, 42, 41];
        $array_vestibular_bottom_right = [31, 32, 33, 34, 35, 36, 37, 38];

        return view('negocio.mis_citas.forms.partials.form6', [
            'array_vestibular_top_left' => $array_vestibular_top_left,
            'array_vestibular_top_right' => $array_vestibular_top_right,
            'array_lingual_top_left' => $array_lingual_top_left,
            'array_lingual_top_right' => $array_lingual_top_right,
            'array_lingual_bottom_left' => $array_lingual_bottom_left,
            'array_lingual_bottom_right' => $array_lingual_bottom_right,
            'array_vestibular_bottom_left' => $array_vestibular_bottom_left,
            'array_vestibular_bottom_right' => $array_vestibular_bottom_right,
        ]);
    }

    public function getForm10(Request $request)
    {
        $model = PlanesDiagnostico::All()
            ->where('id_formulario', $request->formulario)
            ->first();
        return view('negocio.mis_citas.forms.partials.form10', [
            'model' => $model
        ]);
    }

    public function getForm11(Request $request)
    {
        return view('negocio.mis_citas.forms.partials.form11', []);
    }

    public function store_motivo_consulta(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = MotivoConsulta::All()
                ->where('id_formulario', $request->formulario)
                ->first();
            if ($model == '') {
                $model = new MotivoConsulta();
                $model->id_formulario = $request->formulario;
            }
            $model->texto = substr($request->texto, 0, 5000);
            $model->save();

            $success = true;
            $msg = 'Se ha <b>GUARDADO</b> el motivo correctamente';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $msg = '<div class="alert alert-danger text-center text-white">' .
                '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                . '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    public function store_enfermedad_actual(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = EnfermedadActual::All()
                ->where('id_formulario', $request->formulario)
                ->first();
            if ($model == '') {
                $model = new EnfermedadActual();
                $model->id_formulario = $request->formulario;
            }
            $model->texto = substr($request->texto, 0, 5000);
            $model->save();

            $success = true;
            $msg = 'Se ha <b>GUARDADO</b> la enfermedad correctamente';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $msg = '<div class="alert alert-danger text-center text-white">' .
                '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                . '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    public function store_antecedentes(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = Antecedentes::All()
                ->where('id_formulario', $request->formulario)
                ->first();
            if ($model == '') {
                $model = new Antecedentes();
                $model->id_formulario = $request->formulario;
            }
            $model->texto = substr($request->texto, 0, 5000);
            $model->alergia_antibiotico = $request->alergia_antibiotico == 'true' ? 1 : 0;
            $model->alergia_anestesia = $request->alergia_anestesia == 'true' ? 1 : 0;
            $model->hemorragias = $request->hemorragias == 'true' ? 1 : 0;
            $model->vih = $request->vih == 'true' ? 1 : 0;
            $model->tuberculosis = $request->tuberculosis == 'true' ? 1 : 0;
            $model->asma = $request->asma == 'true' ? 1 : 0;
            $model->diabetes = $request->diabetes == 'true' ? 1 : 0;
            $model->hipertension = $request->hipertension == 'true' ? 1 : 0;
            $model->enf_cardiaca = $request->enf_cardiaca == 'true' ? 1 : 0;
            $model->otro = $request->otro == 'true' ? 1 : 0;
            $model->save();

            $success = true;
            $msg = 'Se han <b>GUARDADO</b> los antecedentes correctamente';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $msg = '<div class="alert alert-danger text-center text-white">' .
                '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                . '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    public function store_signos_vitales(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = SignosVitales::All()
                ->where('id_formulario', $request->formulario)
                ->first();
            if ($model == '') {
                $model = new SignosVitales();
                $model->id_formulario = $request->formulario;
            }
            $model->texto = substr($request->texto, 0, 5000);
            $model->presion_arterial = $request->presion_arterial;
            $model->frec_cardiaca = $request->frec_cardiaca;
            $model->temperatura = $request->temperatura;
            $model->frec_respiratoria = $request->frec_respiratoria;
            $model->save();

            $success = true;
            $msg = 'Se han <b>GUARDADO</b> los signos vitales correctamente';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $msg = '<div class="alert alert-danger text-center text-white">' .
                '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                . '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    public function store_examen_sistema_est(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = ExamenSistemaEst::All()
                ->where('id_formulario', $request->formulario)
                ->first();
            if ($model == '') {
                $model = new ExamenSistemaEst();
                $model->id_formulario = $request->formulario;
            }
            $model->texto = substr($request->texto, 0, 5000);
            $model->labios = $request->labios == 'true' ? 1 : 0;
            $model->mejillas = $request->mejillas == 'true' ? 1 : 0;
            $model->maxilar_superior = $request->maxilar_superior == 'true' ? 1 : 0;
            $model->maxilar_inferior = $request->maxilar_inferior == 'true' ? 1 : 0;
            $model->lengua = $request->lengua == 'true' ? 1 : 0;
            $model->paladar = $request->paladar == 'true' ? 1 : 0;
            $model->piso = $request->piso == 'true' ? 1 : 0;
            $model->carrillos = $request->carrillos == 'true' ? 1 : 0;
            $model->glandulas_salivales = $request->glandulas_salivales == 'true' ? 1 : 0;
            $model->oro_faringe = $request->oro_faringe == 'true' ? 1 : 0;
            $model->atm = $request->atm == 'true' ? 1 : 0;
            $model->ganglios = $request->ganglios == 'true' ? 1 : 0;
            $model->save();

            $success = true;
            $msg = 'Se ha <b>GUARDADO</b> el examen correctamente';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $msg = '<div class="alert alert-danger text-center text-white">' .
                '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                . '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    public function store_planes_diagnostico(Request $request)
    {
        DB::beginTransaction();
        try {
            $model = PlanesDiagnostico::All()
                ->where('id_formulario', $request->formulario)
                ->first();
            if ($model == '') {
                $model = new PlanesDiagnostico();
                $model->id_formulario = $request->formulario;
            }
            $model->texto = substr($request->texto, 0, 5000);
            $model->biometria = $request->biometria == 'true' ? 1 : 0;
            $model->quimica_sanguinea = $request->quimica_sanguinea == 'true' ? 1 : 0;
            $model->rayos_x = $request->rayos_x == 'true' ? 1 : 0;
            $model->otros = $request->otros == 'true' ? 1 : 0;
            $model->save();

            $success = true;
            $msg = 'Se ha <b>GUARDADO</b> el plan de diagnostico correctamente';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $success = false;
            $msg = '<div class="alert alert-danger text-center text-white">' .
                '<p> Ha ocurrido un problema al guardar la informacion al sistema</p>' .
                '<p>' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . '</p>'
                . '</div>';
        }
        return [
            'success' => $success,
            'mensaje' => $msg,
        ];
    }

    public function seleccionar_diente(Request $request)
    {
        return view('negocio.mis_citas.forms.partials._seleccionar_diente', [
            'campo' => $request->campo,
            'diente' => $request->diente,
        ]);
    }
}
