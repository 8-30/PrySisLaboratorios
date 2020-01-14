<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Laboratorio;
use App\Periodo;
use App\Horario;
use App\Materia;
use App\Hora;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class HorarioController extends Controller {

	/**
	 * Despliega la vista principal del módulo carrera
	 *
	 * @return view "carrera.index" & $carreras
	 */
	public function index(Request $request) {
		$idempresa = $request->user()->empresa->EMP_CODIGO;
		$laboratorios = Laboratorio::where('EMP_CODIGO',$idempresa)->get();
		// la condicion es que se verifique si ya
		// hay un elemento con PER_CODIGO y LAB_CODIGO existente

		$periodo = Periodo::where('PER_ESTADO', 1)
			->select('PER_CODIGO')
			->first();

		$periodoId = $periodo->PER_CODIGO;
		foreach($laboratorios as $laboratorio) {
			$horario = Horario::where('LAB_CODIGO', $laboratorio->LAB_CODIGO)
				->where('PER_CODIGO','=',$periodoId)
				->count();

			// tomar el id del periodo activo
			$laboratorio->PER_CODIGO = $periodoId;
			if ($horario == 1) { // existe el registro
				// mostramos el lapiz
				$laboratorio->visible = 'lapiz';
			} elseif ($horario == 0) { // no existe el registro
				// mostramos el plus
				$laboratorio->visible = 'plus';
			}
		}

		return view('horario.index', compact('laboratorios','idempresa'));
	}

	/**
	 * Despliega el formulario para crear un nuevo Horario
	 *
	 * @return Response
	 */
	public function create($labId, $perId) {
		$ids = array($labId, $perId);
		$materias = Materia::select('MAT_CODIGO', 'MAT_ABREVIATURA')
			->orderby('MAT_ABREVIATURA')
			->where('PER_CODIGO', $perId)
			->where('MAT_OCACIONAL', 0)
			->get();
		$horas = Hora::select('HORA_NOMBRE')->get();
		return view('horario.create', ['horas' => $horas, 'materias' => $materias, 'ids' => $ids]);
	}

	/**
	 * Guarda un horario en la base de datos.
	 * El método recibe un objeto $request con los valores enviados del formulario.
	 * Guarda los datos con el método create.
	 * Redirecciona a la view "horario"
	 *
	 * @param  Request  $request
	 * @return redirect view "horario" & title & subtitle
	 */
	public function store(Request $request) {
		$HOR_LUNES1_OPC = 0;
		$HOR_LUNES2_OPC = 0;
		$HOR_LUNES3_OPC = 0;
		$HOR_LUNES4_OPC = 0;
		$HOR_LUNES5_OPC = 0;
		$HOR_LUNES6_OPC = 0;
		$HOR_LUNES7_OPC = 0;
		$HOR_LUNES8_OPC = 0;
		$HOR_LUNES9_OPC = 0;
		$HOR_LUNES10_OPC = 0;
		$HOR_LUNES11_OPC = 0;
		$HOR_LUNES12_OPC = 0;
		$HOR_LUNES13_OPC = 0;
		$HOR_MARTES1_OPC = 0;
		$HOR_MARTES2_OPC = 0;
		$HOR_MARTES3_OPC = 0;
		$HOR_MARTES4_OPC = 0;
		$HOR_MARTES5_OPC = 0;
		$HOR_MARTES6_OPC = 0;
		$HOR_MARTES7_OPC = 0;
		$HOR_MARTES8_OPC = 0;
		$HOR_MARTES9_OPC = 0;
		$HOR_MARTES10_OPC = 0;
		$HOR_MARTES11_OPC = 0;
		$HOR_MARTES12_OPC = 0;
		$HOR_MARTES13_OPC = 0;
		$HOR_MIERCOLES1_OPC = 0;
		$HOR_MIERCOLES2_OPC = 0;
		$HOR_MIERCOLES3_OPC = 0;
		$HOR_MIERCOLES4_OPC = 0;
		$HOR_MIERCOLES5_OPC = 0;
		$HOR_MIERCOLES6_OPC = 0;
		$HOR_MIERCOLES7_OPC = 0;
		$HOR_MIERCOLES8_OPC = 0;
		$HOR_MIERCOLES9_OPC = 0;
		$HOR_MIERCOLES10_OPC = 0;
		$HOR_MIERCOLES11_OPC = 0;
		$HOR_MIERCOLES12_OPC = 0;
		$HOR_MIERCOLES13_OPC = 0;
		$HOR_JUEVES1_OPC = 0;
		$HOR_JUEVES2_OPC = 0;
		$HOR_JUEVES3_OPC = 0;
		$HOR_JUEVES4_OPC = 0;
		$HOR_JUEVES5_OPC = 0;
		$HOR_JUEVES6_OPC = 0;
		$HOR_JUEVES7_OPC = 0;
		$HOR_JUEVES8_OPC = 0;
		$HOR_JUEVES9_OPC = 0;
		$HOR_JUEVES10_OPC = 0;
		$HOR_JUEVES11_OPC = 0;
		$HOR_JUEVES12_OPC = 0;
		$HOR_JUEVES13_OPC = 0;
		$HOR_VIERNES1_OPC = 0;
		$HOR_VIERNES2_OPC = 0;
		$HOR_VIERNES3_OPC = 0;
		$HOR_VIERNES4_OPC = 0;
		$HOR_VIERNES5_OPC = 0;
		$HOR_VIERNES6_OPC = 0;
		$HOR_VIERNES7_OPC = 0;
		$HOR_VIERNES8_OPC = 0;
		$HOR_VIERNES9_OPC = 0;
		$HOR_VIERNES10_OPC = 0;
		$HOR_VIERNES11_OPC = 0;
		$HOR_VIERNES12_OPC = 0;
		$HOR_VIERNES13_OPC = 0;

		if($request['HOR_LUNES1_OPC'] === 'on') {
			$HOR_LUNES1_OPC = 1;
		}
		if($request['HOR_LUNES2_OPC'] === 'on') {
			$HOR_LUNES2_OPC = 1;
		}
		if($request['HOR_LUNES3_OPC'] === 'on') {
			$HOR_LUNES3_OPC = 1;
		}
		if($request['HOR_LUNES4_OPC'] === 'on') {
			$HOR_LUNES4_OPC = 1;
		}
		if($request['HOR_LUNES5_OPC'] === 'on') {
			$HOR_LUNES5_OPC = 1;
		}
		if($request['HOR_LUNES6_OPC'] === 'on') {
			$HOR_LUNES6_OPC = 1;
		}
		if($request['HOR_LUNES7_OPC'] === 'on') {
			$HOR_LUNES7_OPC = 1;
		}
		if($request['HOR_LUNES8_OPC'] === 'on') {
			$HOR_LUNES8_OPC = 1;
		}
		if($request['HOR_LUNES9_OPC'] === 'on') {
			$HOR_LUNES9_OPC = 1;
		}
		if($request['HOR_LUNES10_OPC'] === 'on') {
			$HOR_LUNES10_OPC = 1;
		}
		if($request['HOR_LUNES11_OPC'] === 'on') {
			$HOR_LUNES11_OPC = 1;
		}
		if($request['HOR_LUNES12_OPC'] === 'on') {
			$HOR_LUNES12_OPC = 1;
		}
		if($request['HOR_LUNES13_OPC'] === 'on') {
			$HOR_LUNES13_OPC = 1;
		}
		if($request['HOR_MARTES1_OPC'] === 'on') {
			$HOR_MARTES1_OPC = 1;
		}
		if($request['HOR_MARTES2_OPC'] === 'on') {
			$HOR_MARTES2_OPC = 1;
		}
		if($request['HOR_MARTES3_OPC'] === 'on') {
			$HOR_MARTES3_OPC = 1;
		}
		if($request['HOR_MARTES4_OPC'] === 'on') {
			$HOR_MARTES4_OPC = 1;
		}
		if($request['HOR_MARTES5_OPC'] === 'on') {
			$HOR_MARTES5_OPC = 1;
		}
		if($request['HOR_MARTES6_OPC'] === 'on') {
			$HOR_MARTES6_OPC = 1;
		}
		if($request['HOR_MARTES7_OPC'] === 'on') {
			$HOR_MARTES7_OPC = 1;
		}
		if($request['HOR_MARTES8_OPC'] === 'on') {
			$HOR_MARTES8_OPC = 1;
		}
		if($request['HOR_MARTES9_OPC'] === 'on') {
			$HOR_MARTES9_OPC = 1;
		}
		if($request['HOR_MARTES10_OPC'] === 'on') {
			$HOR_MARTES10_OPC = 1;
		}
		if($request['HOR_MARTES11_OPC'] === 'on') {
			$HOR_MARTES11_OPC = 1;
		}
		if($request['HOR_MARTES12_OPC'] === 'on') {
			$HOR_MARTES12_OPC = 1;
		}
		if($request['HOR_MARTES13_OPC'] === 'on') {
			$HOR_MARTES13_OPC = 1;
		}
		if($request['HOR_MIERCOLES1_OPC'] === 'on') {
			$HOR_MIERCOLES1_OPC = 1;
		}
		if($request['HOR_MIERCOLES2_OPC'] === 'on') {
			$HOR_MIERCOLES2_OPC = 1;
		}
		if($request['HOR_MIERCOLES3_OPC'] === 'on') {
			$HOR_MIERCOLES3_OPC = 1;
		}
		if($request['HOR_MIERCOLES4_OPC'] === 'on') {
			$HOR_MIERCOLES4_OPC = 1;
		}
		if($request['HOR_MIERCOLES5_OPC'] === 'on') {
			$HOR_MIERCOLES5_OPC = 1;
		}
		if($request['HOR_MIERCOLES6_OPC'] === 'on') {
			$HOR_MIERCOLES6_OPC = 1;
		}
		if($request['HOR_MIERCOLES7_OPC'] === 'on') {
			$HOR_MIERCOLES7_OPC = 1;
		}
		if($request['HOR_MIERCOLES8_OPC'] === 'on') {
			$HOR_MIERCOLES8_OPC = 1;
		}
		if($request['HOR_MIERCOLES9_OPC'] === 'on') {
			$HOR_MIERCOLES9_OPC = 1;
		}
		if($request['HOR_MIERCOLES10_OPC'] === 'on') {
			$HOR_MIERCOLES10_OPC = 1;
		}
		if($request['HOR_MIERCOLES11_OPC'] === 'on') {
			$HOR_MIERCOLES11_OPC = 1;
		}
		if($request['HOR_MIERCOLES12_OPC'] === 'on') {
			$HOR_MIERCOLES12_OPC = 1;
		}
		if($request['HOR_MIERCOLES13_OPC'] === 'on') {
			$HOR_MIERCOLES13_OPC = 1;
		}
		if($request['HOR_JUEVES1_OPC'] === 'on') {
			$HOR_JUEVES1_OPC = 1;
		}
		if($request['HOR_JUEVES2_OPC'] === 'on') {
			$HOR_JUEVES2_OPC = 1;
		}
		if($request['HOR_JUEVES3_OPC'] === 'on') {
			$HOR_JUEVES3_OPC = 1;
		}
		if($request['HOR_JUEVES4_OPC'] === 'on') {
			$HOR_JUEVES4_OPC = 1;
		}
		if($request['HOR_JUEVES5_OPC'] === 'on') {
			$HOR_JUEVES5_OPC = 1;
		}
		if($request['HOR_JUEVES6_OPC'] === 'on') {
			$HOR_JUEVES6_OPC = 1;
		}
		if($request['HOR_JUEVES7_OPC'] === 'on') {
			$HOR_JUEVES7_OPC = 1;
		}
		if($request['HOR_JUEVES8_OPC'] === 'on') {
			$HOR_JUEVES8_OPC = 1;
		}
		if($request['HOR_JUEVES9_OPC'] === 'on') {
			$HOR_JUEVES9_OPC = 1;
		}
		if($request['HOR_JUEVES10_OPC'] === 'on') {
			$HOR_JUEVES10_OPC = 1;
		}
		if($request['HOR_JUEVES11_OPC'] === 'on') {
			$HOR_JUEVES11_OPC = 1;
		}
		if($request['HOR_JUEVES12_OPC'] === 'on') {
			$HOR_JUEVES12_OPC = 1;
		}
		if($request['HOR_JUEVES13_OPC'] === 'on') {
			$HOR_JUEVES13_OPC = 1;
		}
		if($request['HOR_VIERNES1_OPC'] === 'on') {
			$HOR_VIERNES1_OPC = 1;
		}
		if($request['HOR_VIERNES2_OPC'] === 'on') {
			$HOR_VIERNES2_OPC = 1;
		}
		if($request['HOR_VIERNES3_OPC'] === 'on') {
			$HOR_VIERNES3_OPC = 1;
		}
		if($request['HOR_VIERNES4_OPC'] === 'on') {
			$HOR_VIERNES4_OPC = 1;
		}
		if($request['HOR_VIERNES5_OPC'] === 'on') {
			$HOR_VIERNES5_OPC = 1;
		}
		if($request['HOR_VIERNES6_OPC'] === 'on') {
			$HOR_VIERNES6_OPC = 1;
		}
		if($request['HOR_VIERNES7_OPC'] === 'on') {
			$HOR_VIERNES7_OPC = 1;
		}
		if($request['HOR_VIERNES8_OPC'] === 'on') {
			$HOR_VIERNES8_OPC = 1;
		}
		if($request['HOR_VIERNES9_OPC'] === 'on') {
			$HOR_VIERNES9_OPC = 1;
		}
		if($request['HOR_VIERNES10_OPC'] === 'on') {
			$HOR_VIERNES10_OPC = 1;
		}
		if($request['HOR_VIERNES11_OPC'] === 'on') {
			$HOR_VIERNES11_OPC = 1;
		}
		if($request['HOR_VIERNES12_OPC'] === 'on') {
			$HOR_VIERNES12_OPC = 1;
		}
		if($request['HOR_VIERNES13_OPC'] === 'on') {
			$HOR_VIERNES13_OPC = 1;
		}

		Horario::create([
			'LAB_CODIGO' => $request['LAB_CODIGO'],
			'PER_CODIGO' => $request['PER_CODIGO'],
			'HOR_HORA1' => $request['HOR_HORA1'],
			'HOR_HORA2' => $request['HOR_HORA2'],
			'HOR_HORA3' => $request['HOR_HORA3'],
			'HOR_HORA4' => $request['HOR_HORA4'],
			'HOR_HORA5' => $request['HOR_HORA5'],
			'HOR_HORA6' => $request['HOR_HORA6'],
			'HOR_HORA7' => $request['HOR_HORA7'],
			'HOR_HORA8' => $request['HOR_HORA8'],
			'HOR_HORA9' => $request['HOR_HORA9'],
			'HOR_HORA10' => $request['HOR_HORA10'],
			'HOR_HORA11' => $request['HOR_HORA11'],
			'HOR_HORA12' => $request['HOR_HORA12'],
			'HOR_HORA13' => $request['HOR_HORA13'],
			'HOR_LUNES1' => $request['HOR_LUNES1'],
			'HOR_LUNES2' => $request['HOR_LUNES2'],
			'HOR_LUNES3' => $request['HOR_LUNES3'],
			'HOR_LUNES4' => $request['HOR_LUNES4'],
			'HOR_LUNES5' => $request['HOR_LUNES5'],
			'HOR_LUNES6' => $request['HOR_LUNES6'],
			'HOR_LUNES7' => $request['HOR_LUNES7'],
			'HOR_LUNES8' => $request['HOR_LUNES8'],
			'HOR_LUNES9' => $request['HOR_LUNES9'],
			'HOR_LUNES10' => $request['HOR_LUNES10'],
			'HOR_LUNES11' => $request['HOR_LUNES11'],
			'HOR_LUNES12' => $request['HOR_LUNES12'],
			'HOR_LUNES13' => $request['HOR_LUNES13'],
			'HOR_MATES1' => $request['HOR_MATES1'],
			'HOR_MATES2' => $request['HOR_MATES2'],
			'HOR_MATES3' => $request['HOR_MATES3'],
			'HOR_MATES4' => $request['HOR_MATES4'],
			'HOR_MATES5' => $request['HOR_MATES5'],
			'HOR_MATES6' => $request['HOR_MATES6'],
			'HOR_MATES7' => $request['HOR_MATES7'],
			'HOR_MATES8' => $request['HOR_MATES8'],
			'HOR_MATES9' => $request['HOR_MATES9'],
			'HOR_MATES10' => $request['HOR_MATES10'],
			'HOR_MATES11' => $request['HOR_MATES11'],
			'HOR_MATES12' => $request['HOR_MATES12'],
			'HOR_MATES13' => $request['HOR_MATES13'],
			'HOR_MIERCOLES1' => $request['HOR_MIERCOLES1'],
			'HOR_MIERCOLES2' => $request['HOR_MIERCOLES2'],
			'HOR_MIERCOLES3' => $request['HOR_MIERCOLES3'],
			'HOR_MIERCOLES4' => $request['HOR_MIERCOLES4'],
			'HOR_MIERCOLES5' => $request['HOR_MIERCOLES5'],
			'HOR_MIERCOLES6' => $request['HOR_MIERCOLES6'],
			'HOR_MIERCOLES7' => $request['HOR_MIERCOLES7'],
			'HOR_MIERCOLES8' => $request['HOR_MIERCOLES8'],
			'HOR_MIERCOLES9' => $request['HOR_MIERCOLES9'],
			'HOR_MIERCOLES10' => $request['HOR_MIERCOLES10'],
			'HOR_MIERCOLES11' => $request['HOR_MIERCOLES11'],
			'HOR_MIERCOLES12' => $request['HOR_MIERCOLES12'],
			'HOR_MIERCOLES13' => $request['HOR_MIERCOLES13'],
			'HOR_JUEVES1' => $request['HOR_JUEVES1'],
			'HOR_JUEVES2' => $request['HOR_JUEVES2'],
			'HOR_JUEVES3' => $request['HOR_JUEVES3'],
			'HOR_JUEVES4' => $request['HOR_JUEVES4'],
			'HOR_JUEVES5' => $request['HOR_JUEVES5'],
			'HOR_JUEVES6' => $request['HOR_JUEVES6'],
			'HOR_JUEVES7' => $request['HOR_JUEVES7'],
			'HOR_JUEVES8' => $request['HOR_JUEVES8'],
			'HOR_JUEVES9' => $request['HOR_JUEVES9'],
			'HOR_JUEVES10' => $request['HOR_JUEVES10'],
			'HOR_JUEVES11' => $request['HOR_JUEVES11'],
			'HOR_JUEVES12' => $request['HOR_JUEVES12'],
			'HOR_JUEVES13' => $request['HOR_JUEVES13'],
			'HOR_VIERNES1' => $request['HOR_VIERNES1'],
			'HOR_VIERNES2' => $request['HOR_VIERNES2'],
			'HOR_VIERNES3' => $request['HOR_VIERNES3'],
			'HOR_VIERNES4' => $request['HOR_VIERNES4'],
			'HOR_VIERNES5' => $request['HOR_VIERNES5'],
			'HOR_VIERNES6' => $request['HOR_VIERNES6'],
			'HOR_VIERNES7' => $request['HOR_VIERNES7'],
			'HOR_VIERNES8' => $request['HOR_VIERNES8'],
			'HOR_VIERNES9' => $request['HOR_VIERNES9'],
			'HOR_VIERNES10' => $request['HOR_VIERNES10'],
			'HOR_VIERNES11' => $request['HOR_VIERNES11'],
			'HOR_VIERNES12' => $request['HOR_VIERNES12'],
			'HOR_VIERNES13' => $request['HOR_VIERNES13'],
			'HOR_LUNES1_OPC' => $HOR_LUNES1_OPC,
			'HOR_LUNES2_OPC' => $HOR_LUNES2_OPC,
			'HOR_LUNES3_OPC' => $HOR_LUNES3_OPC,
			'HOR_LUNES4_OPC' => $HOR_LUNES4_OPC,
			'HOR_LUNES5_OPC' => $HOR_LUNES5_OPC,
			'HOR_LUNES6_OPC' => $HOR_LUNES6_OPC,
			'HOR_LUNES7_OPC' => $HOR_LUNES7_OPC,
			'HOR_LUNES8_OPC' => $HOR_LUNES8_OPC,
			'HOR_LUNES9_OPC' => $HOR_LUNES9_OPC,
			'HOR_LUNES10_OPC' => $HOR_LUNES10_OPC,
			'HOR_LUNES11_OPC' => $HOR_LUNES11_OPC,
			'HOR_LUNES12_OPC' => $HOR_LUNES12_OPC,
			'HOR_LUNES13_OPC' => $HOR_LUNES13_OPC,
			'HOR_MARTES1_OPC' => $HOR_MARTES1_OPC,
			'HOR_MARTES2_OPC' => $HOR_MARTES2_OPC,
			'HOR_MARTES3_OPC' => $HOR_MARTES3_OPC,
			'HOR_MARTES4_OPC' => $HOR_MARTES4_OPC,
			'HOR_MARTES5_OPC' => $HOR_MARTES5_OPC,
			'HOR_MARTES6_OPC' => $HOR_MARTES6_OPC,
			'HOR_MARTES7_OPC' => $HOR_MARTES7_OPC,
			'HOR_MARTES8_OPC' => $HOR_MARTES8_OPC,
			'HOR_MARTES9_OPC' => $HOR_MARTES9_OPC,
			'HOR_MARTES10_OPC' => $HOR_MARTES10_OPC,
			'HOR_MARTES11_OPC' => $HOR_MARTES11_OPC,
			'HOR_MARTES12_OPC' => $HOR_MARTES12_OPC,
			'HOR_MARTES13_OPC' => $HOR_MARTES13_OPC,
			'HOR_MIERCOLES1_OPC' => $HOR_MIERCOLES1_OPC,
			'HOR_MIERCOLES2_OPC' => $HOR_MIERCOLES2_OPC,
			'HOR_MIERCOLES3_OPC' => $HOR_MIERCOLES3_OPC,
			'HOR_MIERCOLES4_OPC' => $HOR_MIERCOLES4_OPC,
			'HOR_MIERCOLES5_OPC' => $HOR_MIERCOLES5_OPC,
			'HOR_MIERCOLES6_OPC' => $HOR_MIERCOLES6_OPC,
			'HOR_MIERCOLES7_OPC' => $HOR_MIERCOLES7_OPC,
			'HOR_MIERCOLES8_OPC' => $HOR_MIERCOLES8_OPC,
			'HOR_MIERCOLES9_OPC' => $HOR_MIERCOLES9_OPC,
			'HOR_MIERCOLES10_OPC' => $HOR_MIERCOLES10_OPC,
			'HOR_MIERCOLES11_OPC' => $HOR_MIERCOLES11_OPC,
			'HOR_MIERCOLES12_OPC' => $HOR_MIERCOLES12_OPC,
			'HOR_MIERCOLES13_OPC' => $HOR_MIERCOLES13_OPC,
			'HOR_JUEVES1_OPC' => $HOR_JUEVES1_OPC,
			'HOR_JUEVES2_OPC' => $HOR_JUEVES2_OPC,
			'HOR_JUEVES3_OPC' => $HOR_JUEVES3_OPC,
			'HOR_JUEVES4_OPC' => $HOR_JUEVES4_OPC,
			'HOR_JUEVES5_OPC' => $HOR_JUEVES5_OPC,
			'HOR_JUEVES6_OPC' => $HOR_JUEVES6_OPC,
			'HOR_JUEVES7_OPC' => $HOR_JUEVES7_OPC,
			'HOR_JUEVES8_OPC' => $HOR_JUEVES8_OPC,
			'HOR_JUEVES9_OPC' => $HOR_JUEVES9_OPC,
			'HOR_JUEVES10_OPC' => $HOR_JUEVES10_OPC,
			'HOR_JUEVES11_OPC' => $HOR_JUEVES11_OPC,
			'HOR_JUEVES12_OPC' => $HOR_JUEVES12_OPC,
			'HOR_JUEVES13_OPC' => $HOR_JUEVES13_OPC,
			'HOR_VIERNES1_OPC' => $HOR_VIERNES1_OPC,
			'HOR_VIERNES2_OPC' => $HOR_VIERNES2_OPC,
			'HOR_VIERNES3_OPC' => $HOR_VIERNES3_OPC,
			'HOR_VIERNES4_OPC' => $HOR_VIERNES4_OPC,
			'HOR_VIERNES5_OPC' => $HOR_VIERNES5_OPC,
			'HOR_VIERNES6_OPC' => $HOR_VIERNES6_OPC,
			'HOR_VIERNES7_OPC' => $HOR_VIERNES7_OPC,
			'HOR_VIERNES8_OPC' => $HOR_VIERNES8_OPC,
			'HOR_VIERNES9_OPC' => $HOR_VIERNES9_OPC,
			'HOR_VIERNES10_OPC' => $HOR_VIERNES10_OPC,
			'HOR_VIERNES11_OPC' => $HOR_VIERNES11_OPC,
			'HOR_VIERNES12_OPC' => $HOR_VIERNES12_OPC,
			'HOR_VIERNES13_OPC' => $HOR_VIERNES13_OPC
		]);

		return redirect('horario')
			->with('title', 'Horario registrado!')
			->with('subtitle', 'El registro del horario para el periodo acádemico actual se ha realizado con éxito.');
	}
	/**
	 * Despliega el formulario para editar Horario y materias
	 *
	 * @return Response
	 */
	public function edit($labId, $perId) {
		$horario = Horario::where('LAB_CODIGO', $labId)
			->where('PER_CODIGO', $perId)
			->first();

		$materias = Materia::select('MAT_CODIGO', 'MAT_ABREVIATURA')
			->orderby('MAT_ABREVIATURA')
			->where('PER_CODIGO', $perId)
			->where('MAT_OCACIONAL', 0)
			->get();
		return view('horario.update', ['horario' => $horario, 'materias' => $materias]);
	}

	/**
	 * Edita un horario en la base de datos.
	 * El método recibe un objeto $request con los valores enviados del formulario.
	 * Guarda los datos con el método update.
	 * Redirecciona a la view "horario"
	 *
	 * @param  Request  $request
	 * @return redirect view "horario" & title & subtitle
	 */
	public function update(Request $request) {
		if($request['HOR_LUNES1_OPC'] === 'on') {
			$request['HOR_LUNES1_OPC'] = 1;
		} else {
			$request['HOR_LUNES1_OPC'] = 0;
		}
		if($request['HOR_LUNES2_OPC'] === 'on') {
			$request['HOR_LUNES2_OPC'] = 1;
		} else {
			$request['HOR_LUNES2_OPC'] = 0;
		}
		if($request['HOR_LUNES3_OPC'] === 'on') {
			$request['HOR_LUNES3_OPC'] = 1;
		} else {
			$request['HOR_LUNES3_OPC'] = 0;
		}
		if($request['HOR_LUNES4_OPC'] === 'on') {
			$request['HOR_LUNES4_OPC'] = 1;
		} else {
			$request['HOR_LUNES4_OPC'] = 0;
		}
		if($request['HOR_LUNES5_OPC'] === 'on') {
			$request['HOR_LUNES5_OPC'] = 1;
		} else {
			$request['HOR_LUNES5_OPC'] = 0;
		}
		if($request['HOR_LUNES6_OPC'] === 'on') {
			$request['HOR_LUNES6_OPC'] = 1;
		} else {
			$request['HOR_LUNES6_OPC'] = 0;
		}
		if($request['HOR_LUNES7_OPC'] === 'on') {
			$request['HOR_LUNES7_OPC'] = 1;
		} else {
			$request['HOR_LUNES7_OPC'] = 0;
		}
		if($request['HOR_LUNES8_OPC'] === 'on') {
			$request['HOR_LUNES8_OPC'] = 1;
		} else {
			$request['HOR_LUNES8_OPC'] = 0;
		}
		if($request['HOR_LUNES9_OPC'] === 'on') {
			$request['HOR_LUNES9_OPC'] = 1;
		} else {
			$request['HOR_LUNES9_OPC'] = 0;
		}
		if($request['HOR_LUNES10_OPC'] === 'on') {
			$request['HOR_LUNES10_OPC'] = 1;
		} else {
			$request['HOR_LUNES10_OPC'] = 0;
		}
		if($request['HOR_LUNES11_OPC'] === 'on') {
			$request['HOR_LUNES11_OPC'] = 1;
		} else {
			$request['HOR_LUNES11_OPC'] = 0;
		}
		if($request['HOR_LUNES12_OPC'] === 'on') {
			$request['HOR_LUNES12_OPC'] = 1;
		} else {
			$request['HOR_LUNES12_OPC'] = 0;
		}
		if($request['HOR_LUNES13_OPC'] === 'on') {
			$request['HOR_LUNES13_OPC'] = 1;
		} else {
			$request['HOR_LUNES13_OPC'] = 0;
		}
		if($request['HOR_MARTES1_OPC'] === 'on') {
			$request['HOR_MARTES1_OPC'] = 1;
		} else {
			$request['HOR_MARTES1_OPC'] = 0;
		}
		if($request['HOR_MARTES2_OPC'] === 'on') {
			$request['HOR_MARTES2_OPC'] = 1;
		} else {
			$request['HOR_MARTES2_OPC'] = 0;
		}
		if($request['HOR_MARTES3_OPC'] === 'on') {
			$request['HOR_MARTES3_OPC'] = 1;
		} else {
			$request['HOR_MARTES3_OPC'] = 0;
		}
		if($request['HOR_MARTES4_OPC'] === 'on') {
			$request['HOR_MARTES4_OPC'] = 1;
		} else {
			$request['HOR_MARTES4_OPC'] = 0;
		}
		if($request['HOR_MARTES5_OPC'] === 'on') {
			$request['HOR_MARTES5_OPC'] = 1;
		} else {
			$request['HOR_MARTES5_OPC'] = 0;
		}
		if($request['HOR_MARTES6_OPC'] === 'on') {
			$request['HOR_MARTES6_OPC'] = 1;
		} else {
			$request['HOR_MARTES6_OPC'] = 0;
		}
		if($request['HOR_MARTES7_OPC'] === 'on') {
			$request['HOR_MARTES7_OPC'] = 1;
		} else {
			$request['HOR_MARTES7_OPC'] = 0;
		}
		if($request['HOR_MARTES8_OPC'] === 'on') {
			$request['HOR_MARTES8_OPC'] = 1;
		} else {
			$request['HOR_MARTES8_OPC'] = 0;
		}
		if($request['HOR_MARTES9_OPC'] === 'on') {
			$request['HOR_MARTES9_OPC'] = 1;
		} else {
			$request['HOR_MARTES9_OPC'] = 0;
		}
		if($request['HOR_MARTES10_OPC'] === 'on') {
			$request['HOR_MARTES10_OPC'] = 1;
		} else {
			$request['HOR_MARTES10_OPC'] = 0;
		}
		if($request['HOR_MARTES11_OPC'] === 'on') {
			$request['HOR_MARTES11_OPC'] = 1;
		} else {
			$request['HOR_MARTES11_OPC'] = 0;
		}
		if($request['HOR_MARTES12_OPC'] === 'on') {
			$request['HOR_MARTES12_OPC'] = 1;
		} else {
			$request['HOR_MARTES12_OPC'] = 0;
		}
		if($request['HOR_MARTES13_OPC'] === 'on') {
			$request['HOR_MARTES13_OPC'] = 1;
		} else {
			$request['HOR_MARTES13_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES1_OPC'] === 'on') {
			$request['HOR_MIERCOLES1_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES1_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES2_OPC'] === 'on') {
			$request['HOR_MIERCOLES2_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES2_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES3_OPC'] === 'on') {
			$request['HOR_MIERCOLES3_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES3_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES4_OPC'] === 'on') {
			$request['HOR_MIERCOLES4_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES4_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES5_OPC'] === 'on') {
			$request['HOR_MIERCOLES5_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES5_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES6_OPC'] === 'on') {
			$request['HOR_MIERCOLES6_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES6_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES7_OPC'] === 'on') {
			$request['HOR_MIERCOLES7_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES7_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES8_OPC'] === 'on') {
			$request['HOR_MIERCOLES8_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES8_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES9_OPC'] === 'on') {
			$request['HOR_MIERCOLES9_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES9_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES10_OPC'] === 'on') {
			$request['HOR_MIERCOLES10_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES10_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES11_OPC'] === 'on') {
			$request['HOR_MIERCOLES11_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES11_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES12_OPC'] === 'on') {
			$request['HOR_MIERCOLES12_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES12_OPC'] = 0;
		}
		if($request['HOR_MIERCOLES13_OPC'] === 'on') {
			$request['HOR_MIERCOLES13_OPC'] = 1;
		} else {
			$request['HOR_MIERCOLES13_OPC'] = 0;
		}
		if($request['HOR_JUEVES1_OPC'] === 'on') {
			$request['HOR_JUEVES1_OPC'] = 1;
		} else {
			$request['HOR_JUEVES1_OPC'] = 0;
		}
		if($request['HOR_JUEVES2_OPC'] === 'on') {
			$request['HOR_JUEVES2_OPC'] = 1;
		} else {
			$request['HOR_JUEVES2_OPC'] = 0;
		}
		if($request['HOR_JUEVES3_OPC'] === 'on') {
			$request['HOR_JUEVES3_OPC'] = 1;
		} else {
			$request['HOR_JUEVES3_OPC'] = 0;
		}
		if($request['HOR_JUEVES4_OPC'] === 'on') {
			$request['HOR_JUEVES4_OPC'] = 1;
		} else {
			$request['HOR_JUEVES4_OPC'] = 0;
		}
		if($request['HOR_JUEVES5_OPC'] === 'on') {
			$request['HOR_JUEVES5_OPC'] = 1;
		} else {
			$request['HOR_JUEVES5_OPC'] = 0;
		}
		if($request['HOR_JUEVES6_OPC'] === 'on') {
			$request['HOR_JUEVES6_OPC'] = 1;
		} else {
			$request['HOR_JUEVES6_OPC'] = 0;
		}
		if($request['HOR_JUEVES7_OPC'] === 'on') {
			$request['HOR_JUEVES7_OPC'] = 1;
		} else {
			$request['HOR_JUEVES7_OPC'] = 0;
		}
		if($request['HOR_JUEVES8_OPC'] === 'on') {
			$request['HOR_JUEVES8_OPC'] = 1;
		} else {
			$request['HOR_JUEVES8_OPC'] = 0;
		}
		if($request['HOR_JUEVES9_OPC'] === 'on') {
			$request['HOR_JUEVES9_OPC'] = 1;
		} else {
			$request['HOR_JUEVES9_OPC'] = 0;
		}
		if($request['HOR_JUEVES10_OPC'] === 'on') {
			$request['HOR_JUEVES10_OPC'] = 1;
		} else {
			$request['HOR_JUEVES10_OPC'] = 0;
		}
		if($request['HOR_JUEVES11_OPC'] === 'on') {
			$request['HOR_JUEVES11_OPC'] = 1;
		} else {
			$request['HOR_JUEVES11_OPC'] = 0;
		}
		if($request['HOR_JUEVES12_OPC'] === 'on') {
			$request['HOR_JUEVES12_OPC'] = 1;
		} else {
			$request['HOR_JUEVES12_OPC'] = 0;
		}
		if($request['HOR_JUEVES13_OPC'] === 'on') {
			$request['HOR_JUEVES13_OPC'] = 1;
		} else {
			$request['HOR_JUEVES13_OPC'] = 0;
		}
		if($request['HOR_VIERNES1_OPC'] === 'on') {
			$request['HOR_VIERNES1_OPC'] = 1;
		} else {
			$request['HOR_VIERNES1_OPC'] = 0;
		}
		if($request['HOR_VIERNES2_OPC'] === 'on') {
			$request['HOR_VIERNES2_OPC'] = 1;
		} else {
			$request['HOR_VIERNES2_OPC'] = 0;
		}
		if($request['HOR_VIERNES3_OPC'] === 'on') {
			$request['HOR_VIERNES3_OPC'] = 1;
		} else {
			$request['HOR_VIERNES3_OPC'] = 0;
		}
		if($request['HOR_VIERNES4_OPC'] === 'on') {
			$request['HOR_VIERNES4_OPC'] = 1;
		} else {
			$request['HOR_VIERNES4_OPC'] = 0;
		}
		if($request['HOR_VIERNES5_OPC'] === 'on') {
			$request['HOR_VIERNES5_OPC'] = 1;
		} else {
			$request['HOR_VIERNES5_OPC'] = 0;
		}
		if($request['HOR_VIERNES6_OPC'] === 'on') {
			$request['HOR_VIERNES6_OPC'] = 1;
		} else {
			$request['HOR_VIERNES6_OPC'] = 0;
		}
		if($request['HOR_VIERNES7_OPC'] === 'on') {
			$request['HOR_VIERNES7_OPC'] = 1;
		} else {
			$request['HOR_VIERNES7_OPC'] = 0;
		}
		if($request['HOR_VIERNES8_OPC'] === 'on') {
			$request['HOR_VIERNES8_OPC'] = 1;
		} else {
			$request['HOR_VIERNES8_OPC'] = 0;
		}
		if($request['HOR_VIERNES9_OPC'] === 'on') {
			$request['HOR_VIERNES9_OPC'] = 1;
		} else {
			$request['HOR_VIERNES9_OPC'] = 0;
		}
		if($request['HOR_VIERNES10_OPC'] === 'on') {
			$request['HOR_VIERNES10_OPC'] = 1;
		} else {
			$request['HOR_VIERNES10_OPC'] = 0;
		}
		if($request['HOR_VIERNES11_OPC'] === 'on') {
			$request['HOR_VIERNES11_OPC'] = 1;
		} else {
			$request['HOR_VIERNES11_OPC'] = 0;
		}
		if($request['HOR_VIERNES12_OPC'] === 'on') {
			$request['HOR_VIERNES12_OPC'] = 1;
		} else {
			$request['HOR_VIERNES12_OPC'] = 0;
		}
		if($request['HOR_VIERNES13_OPC'] === 'on') {
			$request['HOR_VIERNES13_OPC'] = 1;
		} else {
			$request['HOR_VIERNES13_OPC'] = 0;
		}

		$horario = Horario::find($request['HOR_CODIGO']);
		$horario->fill($request->all());
		$horario->save();
		return redirect('horario')
			->with('title', 'Horario actualizado!')
			->with('subtitle', 'La actualización del horario en el periodo acádemico actual se ha realizado con éxito.');
	}

	/**
	 * Eliminar un horario especificado de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Horario::destroy($id);
		return redirect('horario')
			->with('title', 'Horario eliminado!')
			->with('subtitle', 'La eliminación del horario se ha realizado con éxito.');
	}

	//valida que este autenticado para acceder al controlador
	public function __construct()
    {
        $this->middleware('auth');
    }

}
