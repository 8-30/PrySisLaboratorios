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
use App\MaterialLaboratorio;
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
		$solicitud = null;
		$solicitudes=Solicitud::where('DOC_CODIGO', $docente)->where('MAT_CODIGO', $materia)->get()->sortByDesc('SOL_NUMERO');
		$guias_pendientes = DB::select('select materia.MAT_ABREVIATURA, control.CON_DIA,control.CON_EXTRA,control.CON_HORA_ENTRADA, control.CON_HORA_SALIDA,control.CON_NUMERO_HORAS,control.CON_GUIA,control.CON_REG_FIRMA_ENTRADA from control, materia where control.MAT_CODIGO='.$materia.' and materia.MAT_CODIGO=control.MAT_CODIGO');
		$materia_guia = DB::select('select materia.MAT_ABREVIATURA, materia.DOC_CODIGO from materia where materia.MAT_CODIGO='.$materia);
		$j=sizeof($solicitudes);
		$j--;
		for($i=0;$i<sizeof($solicitudes);$i++){
			$solicitud[$i]=$solicitudes[$j];
			$j--;
		}
		return view('solicitud.index', [
			'solicitud' => $solicitud,
			'guias_pendientes' => $guias_pendientes,
			'materia_guia' => $materia_guia
		]);
	}

	public function edit($id) {
				
		$solicitud = Solicitud::find($id);
		$materia = Materia::find(session('MAT_CODIGO'));
		$detalleSolicitud = DetalleSolicitud::all();

		return view("solicitud.edit", [
			"solicitud" => $solicitud,
			"detalleSolicitud" => $detalleSolicitud,
			"materia" => $materia
		]);
	}

	public function update(Request $request) {
		$docente = session('DOC_CODIGO');
		$materia = session('MAT_CODIGO');

       $datossolicitud = collect([
       		'DOC_CODIGO' => $docente, 
       		'MAT_CODIGO' => $materia, 
       		'SOL_CODIGO' => $request['SOL_CODIGO'],
       		'SOL_FECHA' => $request['SOL_FECHA'],
       		'SOL_FECHA_USO' => $request['SOL_FECHA_USO'],
       		'SOL_TEMA_PRACTICA' => $request['SOL_TEMA_PRACTICA']       		
       	]);      
       	$datosdetalle = collect([
       		'SOL_CODIGO' => $request['SOL_CODIGO'],
       		'DETSOL_CANTIDAD' => $request['DETSOL_CANTIDAD'],
       		'DETSOL_DETALLE' => $request['DETSOL_DETALLE'],
       		'DETSOL_OBSERVACION' => $request['DETSOL_OBSERVACION']       		
       	]);   

       	$solicitud = Solicitud::find($request['SOL_CODIGO']);
		$solicitud->fill($datossolicitud->all());
		$solicitud->save();
		
		$detalle=DB::table('detalle_solicitud')->where('SOL_CODIGO', $request->SOL_CODIGO)->first();
		$detalleSolicitud = DetalleSolicitud::find($detalle->DETSOL_CODIGO);
		$detalleSolicitud->fill($datosdetalle->all());
		$detalleSolicitud->save();


       
       $datossolicitud->SOL_FECHA_USO=$request['SOL_FECHA_USO'];
       $datossolicitud->SOL_TEMA_PRACTICA=$request['SOL_TEMA_PRACTICA'];
       $datossolicitud->SOL_HORARIO_USO=$request['SOL_HORARIO_USO'];

		$docente = session('DOC_CODIGO');
		$solicitud = null;
		$solicitudes=Solicitud::where('DOC_CODIGO', $docente)->where('MAT_CODIGO', $materia)->get()->sortByDesc('SOL_NUMERO');
		$guias_pendientes = DB::select('select materia.MAT_ABREVIATURA, control.CON_DIA,control.CON_EXTRA,control.CON_HORA_ENTRADA, control.CON_HORA_SALIDA,control.CON_NUMERO_HORAS,control.CON_GUIA,control.CON_REG_FIRMA_ENTRADA from control, materia where control.MAT_CODIGO='.$materia.' and materia.MAT_CODIGO=control.MAT_CODIGO');
		$materia_guia = DB::select('select materia.MAT_ABREVIATURA, materia.DOC_CODIGO from materia where materia.MAT_CODIGO='.$materia);
		$j=sizeof($solicitudes);
		$j--;
		for($i=0;$i<sizeof($solicitudes);$i++){
			$solicitud[$i]=$solicitudes[$j];
			$j--;
		}
		return redirect('solicitud/'.$materia.'/index/')
	        ->with('solicitudes',$solicitud)
	        ->with('guias_pendientes',$guias_pendientes)
	        ->with('materia_guia',$materia_guia)	        
			->with('title', 'Solicitud actualizada!')
			->with('subtitle', 'La actualización de la solicitud se ha realizado con éxito.');	
	}

	public function destroy($id) {


        $detalle=null;
    	$detalle=DB::table('detalle_solicitud')->where('SOL_CODIGO', $id)->get();
       
    	if ($detalle!=null) {
    		foreach ($detalle as $det) {
        		DetalleSolicitud::destroy($det->DETSOL_CODIGO);
    		}
    	}

	

		$docenteId = session('DOC_CODIGO');
		$materia = session('MAT_CODIGO');
		solicitud::destroy($id);

		$docente = session('DOC_CODIGO');
		$solicitud = null;
		$solicitudes=Solicitud::where('DOC_CODIGO', $docente)->where('MAT_CODIGO', $materia)->get()->sortByDesc('SOL_NUMERO');
		$guias_pendientes = DB::select('select materia.MAT_ABREVIATURA, control.CON_DIA,control.CON_EXTRA,control.CON_HORA_ENTRADA, control.CON_HORA_SALIDA,control.CON_NUMERO_HORAS,control.CON_GUIA,control.CON_REG_FIRMA_ENTRADA from control, materia where control.MAT_CODIGO='.$materia.' and materia.MAT_CODIGO=control.MAT_CODIGO');
		$materia_guia = DB::select('select materia.MAT_ABREVIATURA, materia.DOC_CODIGO from materia where materia.MAT_CODIGO='.$materia);
		$j=sizeof($solicitudes);
		$j--;
		for($i=0;$i<sizeof($solicitudes);$i++){
			$solicitud[$i]=$solicitudes[$j];
			$j--;
		}
		return redirect('solicitud/'.$materia.'/index/')
	        ->with('solicitudes',$solicitud)
	        ->with('guias_pendientes',$guias_pendientes)
	        ->with('materia_guia',$materia_guia)->with('title', 'Solicitud Eliminada!')
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
		$horario=explode("-", $request->SOL_HORARIO_USO);
		$controlHorario=$horario[0].':00';
		$control=DB::table('control')->where('CON_DIA', $request->SOL_FECHA_USO)->where('CON_HORA_ENTRADA', $controlHorario)->where('LAB_CODIGO', $request->LAB_CODIGO)->whereNotNull('CON_LAB_ABRE')->get();
		$solicitud=DB::table('solicitud')->where('SOL_FECHA_USO', $request->SOL_FECHA_USO)->where('MAT_CODIGO', $materia)->where('SOL_HORARIO_USO', $request->SOL_HORARIO_USO)->get();
		if (count($solicitud) === 0) {
		}else{
			return redirect('solicitud/'.$materia.'/index')
				->with('title', 'Solicitud NO Creada!')
				->with('subtitle', 'La solicitud ya se ha creado anteriormente.');
		}
		if (count($control) === 0) {
			//asigna las variables a la guia y guarda
            $materiales=null;
            $materiales=MaterialLaboratorio::where('LAB_CODIGO', $request['LAB_CODIGO'])->get();



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

		 	if($materiales!=null){
			foreach ($materiales as $material) {
				$detalle = DetalleSolicitud::create([
					'SOL_CODIGO' => $solicitud->SOL_CODIGO,
					'DETSOL_CANTIDAD' => $material->MATLAB_CANTIDAD,
					'DETSOL_DETALLE' => $material->MATLAB_DETALLE,
					'DETSOL_OBSERVACION' => $material->MATLAB_OBSERVACION,
					
				]);# code...
			}
		}
			
			$control = Control::create([
				'CON_DIA' =>  $request['SOL_FECHA_USO'],
				'CON_HORA_ENTRADA' => $horario[0].':00',
				'CON_HORA_SALIDA' => $horario[1].':00',
				'CON_NUMERO_HORAS' => 2,
				'CON_EXTRA' => 1,
				'LAB_CODIGO' => $request['LAB_CODIGO'],
				'DOC_CODIGO' => $docenteId,
				'MAT_CODIGO' => $materia,
			]);
			return redirect('solicitud/'.$materia.'/index')
				->with('title', 'Solicitud Creada!')
				->with('subtitle', 'El registro de la solicitud se creo satisfactoriamente.');
		}else{
			return redirect('solicitud/'.$materia.'/index')
				->with('title', 'Solicitud NO Creada!')
				->with('subtitle', 'La solicitud no se ha podido crear, acercate al administrador.');
		}		
	}
}