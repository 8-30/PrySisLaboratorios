<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Solicitud;
use App\DetalleSolicitud;
use App\Docente;
use App\Laboratorio;
use App\Materia;
use App\Periodo;
use App\Session;
use App\Horario;
use App\Control;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Quotation;
class SolicitudController extends Controller {
	public function index() {
		$solicitud = Solicitud::all();
		return view("solicitud.index", compact('solicitud'));
	}

	//listar las Solicitudes de la materia de Docente logeado
	public function listRequests($id) {
		session(['MAT_CODIGO' => $id]);
		$materia = $id;
		$docente = session('DOC_CODIGO');
		$solicitudes = Solicitud::allSolicitudes($docente,$materia)->get();
		$guias_pendientes = DB::select('select materia.MAT_ABREVIATURA, control.CON_DIA,control.CON_EXTRA,control.CON_HORA_ENTRADA, control.CON_HORA_SALIDA,control.CON_NUMERO_HORAS,control.CON_GUIA,control.CON_REG_FIRMA_ENTRADA from control, materia where control.MAT_CODIGO='.$materia.' and materia.MAT_CODIGO=control.MAT_CODIGO');
		$materia_guia = DB::select('select materia.MAT_ABREVIATURA, materia.DOC_CODIGO from materia where materia.MAT_CODIGO='.$materia);

		return view('solicitud.index', [
			'solicitudes' => $solicitudes,
			'guias_pendientes' => $guias_pendientes,
			'materia_guia' => $materia_guia
		]);
	}

	public function edit($id) {
		$solicitud = Solicitud::find($id);
		$laboratorio = Laboratorio::all();
		$detalleSolicitud = DetalleSolicitud::all();
		$materia = Materia::all();

		return view("solicitud.edit", [
			"solicitud" => $solicitud,
			"laboratorio" => $laboratorio,
			"detalleSolicitud" => $detalleSolicitud,
			"materia" => $materia
		]);
	}

	public function update(Request $request) {
		$solicitud = solicitud::find($request['SOL_CODIGO']);
		$solicitud->fill($request->all());
		$solicitud->save();

		return redirect('solicitud');
	}

	public function destroy($id) {
		$solicitud = Solicitud::destroy($id);
		DB::update('UPDATE CONTROL SET control.CON_SOLICITUD=NULL WHERE control.CON_SOLICITUD='.$id);

		return redirect('solicitud.index')
			->with('title', 'Solicitud Eliminada!')
			->with('subtitle', 'El registro de la solicitud se ha eliminado con éxito.');
	}

	/**Obtines las materias del docente del periodo seleccionado */
	public function obtenerHorario(Request $request,$fecha) {
		if($request->ajax()) {
			$horaUso = "";
			$materia = session('MAT_CODIGO');
			$dias = array("DOMINGO","LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO");
			$fecha = Carbon::parse($fecha);
			$dia = date('w', strtotime($fecha));
			if ($dia == 0 || $dia == 6) {
				$datos = null;
			} else {
				$nombreDia = $dias[$dia];
				$opcional = $nombreDia;

				if ($nombreDia == "MARTES") {
					$nombreDia = "MATES";
				}

				$datos = Horario::scopeObtenerHorarioOcasionalMateria($materia,$nombreDia,$opcional)->first();

				if (!empty($datos)) {
					$datos->laboratorio;
					for ($i=1; $i<=13 ; $i++) {
						if ($datos['HOR_'.$nombreDia.$i] == $materia && $datos['HOR_'.$nombreDia.$i.'_OPC'] == 1) {
							$hora = $datos['HOR_HORA'.$i];
							$splitHora = explode('-', $hora, 2);
							$horaUso = $splitHora[0]."-";
							$x = $i + 1;
							$hora = $datos['HOR_HORA'.$x];
							$splitHora = explode('-', $hora, 2);
							$horaUso .= $splitHora[1];
							$i = 14;
						}
					}
					$datos->horaUso = $horaUso;
				}
			}

			return response()->json($datos);
		}
	}

	public function create() {
		/*obtener fecha actual del sistema*/
		$fechaSistema = Carbon::now()->toDateString();
		$materia = Materia::find(session('MAT_CODIGO'));

		return view('solicitud.create', [
			'fecha' => $fechaSistema,
			'materia'=> $materia,
		]);
	}

	/*Guardar Solicitud*/
  public function store(Request $request) {
		//obtiene el id de docente
		$numero = 1;
		$docenteId = session('DOC_CODIGO');

		//obtiene materia y periodo id
		$materia = session('MAT_CODIGO');

		//asigna el numero de solicitud
		$last = Solicitud::allSolicitudes($docenteId,$materia)->first();

		/** Verifica si existe una solicitud anterior
			* Si existe Asigna el numero de solicitud (incrementa 1 del anterior)
			* No empieza numero de solicitud 1
			*/
		if (!empty($last)) {
			$numero = $last->SOL_NUMERO + 1;
		}
		//asigna las variables a la guia y guarda
		$solicitud = Solicitud::create([
			'DOC_CODIGO' => $docenteId,
			'MAT_CODIGO' => $materia,
			'LAB_CODIGO' => $request['LAB_CODIGO'],
			'SOL_FECHA' => $request['SOL_FECHA'],
			'SOL_FECHA_USO' => $request['SOL_FECHA_USO'],
			'SOL_TEMA_PRACTICA' => $request['SOL_TEMA_PRACTICA'],
			'SOL_NUMERO' => $numero,
			'SOL_HORARIO_USO' => $request['SOL_HORARIO_USO'],
			'SOL_ESTADO' => 0,
		]);

		if ($solicitud->SOL_CODIGO != null) {
			$detalle = DetalleSolicitud::create([
				'SOL_CODIGO' => $solicitud->SOL_CODIGO,
				'DETSOL_CANTIDAD' => $request['DETSOL_CANTIDAD'],
				'DETSOL_DETALLE' => $request['DETSOL_DETALLE'],
				'DETSOL_OBSERVACION' => $request['DETSOL_OBSERVACION'],
			]);
	 	}

		return redirect('solicitud/'.$materia.'/index');
	}
}