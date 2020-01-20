<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Guia;
use App\Docente;
use App\Laboratorio;
use App\Materia;
use App\Carrera;
use App\Periodo;
use App\Session;
use App\Horario;
use App\Control;
use App\Empresa;
use App\Quotation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use PDF;

class GuiaController extends Controller {
	//listar las guias de la materia de Docente logeado
	public function listarGuias($id) {
			session(['MAT_CODIGO' => $id]);
			$materia = $id;
			$guias_terminadas = DB::select('select guia.GUI_REGISTRADO, guia.GUI_CODIGO,materia.MAT_ABREVIATURA, guia.GUI_NUMERO,guia.GUI_FECHA, guia.GUI_TEMA, laboratorio.LAB_NOMBRE from laboratorio,guia,materia where materia.MAT_CODIGO=guia.MAT_CODIGO and laboratorio.LAB_CODIGO=guia.LAB_CODIGO and guia.MAT_CODIGO='.$materia );
			$guias_pendientes = DB::select('select materia.MAT_ABREVIATURA, control.CON_DIA,control.CON_EXTRA,control.CON_HORA_ENTRADA, control.CON_HORA_SALIDA,control.CON_NUMERO_HORAS,control.CON_GUIA,control.CON_REG_FIRMA_ENTRADA from control, materia where control.MAT_CODIGO='.$materia.' and materia.MAT_CODIGO=control.MAT_CODIGO');
			$materia_guia = DB::select('select materia.MAT_ABREVIATURA, materia.DOC_CODIGO from materia where materia.MAT_CODIGO='.$materia);
			$pendietes = 0;
			$creadas = 0;
			foreach ($guias_terminadas as $ter ) {
				if ($ter->GUI_REGISTRADO != 1) {
					$creadas++;
				}
			}
			foreach ($guias_pendientes as $pen) {
				if ($pen->CON_GUIA != 1 & $pen->CON_EXTRA != 1 & $pen->CON_REG_FIRMA_ENTRADA != null) {
					$pendietes++;
				}
			}
			$por_crear = $pendietes-$creadas;
			return view('guia.guiaControl')
				->with('guias_terminadas', $guias_terminadas)
				->with('guias_pendientes', $guias_pendientes)
				->with('pendientes',$pendietes)
				->with('por_crear',$por_crear)
				->with('materia_guia',$materia_guia);
	}

	public function edit($id) {
		$guia = Guia::find($id);

		return view('guia.updateGuia', ['guia' => $guia]);
	}

	public function update(Request $request) {
		$materia = session('MAT_CODIGO');
		$guia = Guia::find($request['GUI_CODIGO']);
		$guia->fill($request->all());
		$guia->save();

		return redirect('guia/listarGuias/'.$materia)
			->with('title', 'Guia actualizada!')
			->with('subtitle', 'La actualización de la guía se ha realizado con éxito.');
	}

	public function destroy($id) {
		$materia = session('MAT_CODIGO');

		Guia::destroy($id);

		return redirect('guia/listarGuias/'.$materia)
			->with('title', 'Guia Eliminada!')
			->with('subtitle', 'El registro de la guía se ha eliminado con éxito.');
	}

	public function login() {
		return view('guias.login');
	}

	public function index(Request $request) {
		$docentes = Docente::where('DOC_MIESPE', $request['usuario'])
			->where('DOC_CLAVE',$request['clave'])->first();

		if(count($docentes) == 0) {
			return redirect('guias_y_solicitudes/login')
				->with('title', 'Auntenticación incorrecta!')
				->with('subtitle', 'Ingrese el usuario y clave correctas.');
		} else {
			$periodo = Periodo::where('PER_ESTADO', 1)->first();
			session(['DOC_CODIGO' => $docentes->DOC_CODIGO]);
			session(['PER_CODIGO' => $periodo->PER_CODIGO]);

			$materias = Materia::where('DOC_CODIGO', $docentes ->DOC_CODIGO)
				->where('PER_CODIGO', $periodo->PER_CODIGO)->get();
			$count = Horario::obtenerHorarioPorPeriodo($periodo->PER_CODIGO)->count();
			$horario = Horario::obtenerHorarioPorPeriodo($periodo->PER_CODIGO)->get();
			$horario_docente = new Horario;

			for ($ind=0; $ind<=$count-1;$ind++) {
				for ($x = 1; $x <= 13; $x++) {
					foreach ($materias as $mat) {
						$horario_docente['HOR_HORA'.$x] = $horario[$ind]['HOR_HORA'.$x];
						if ($horario[$ind]['HOR_LUNES'.$x] == $mat->MAT_CODIGO) {
							$horario_docente['HOR_LUNES'.$x] = $mat->MAT_ABREVIATURA;
							$horario_docente['LAB_LUNES'.$x] = $horario[$ind]->laboratorio->LAB_NOMBRE;
							$horario_docente["HOR_LUNES".$x."_OPC"] = $horario[$ind]["HOR_LUNES".$x."_OPC"];
						}
						if ($horario[$ind]['HOR_MATES'.$x] == $mat->MAT_CODIGO) {
							$horario_docente['HOR_MATES'.$x] = $mat->MAT_ABREVIATURA;
							$horario_docente['LAB_MATES'.$x] = $horario[$ind]->laboratorio->LAB_NOMBRE;
							$horario_docente["HOR_MATES".$x."_OPC"] = $horario[$ind]["HOR_MATES".$x."_OPC"];
						}

						if ($horario[$ind]['HOR_MIERCOLES'.$x] == $mat->MAT_CODIGO) {
							$horario_docente['HOR_MIERCOLES'.$x] = $mat->MAT_ABREVIATURA;
							$horario_docente['LAB_MIERCOLES'.$x] = $horario[$ind]->laboratorio->LAB_NOMBRE;
							$horario_docente["HOR_MIERCOLES".$x."_OPC"] = $horario[$ind]["HOR_MIERCOLES".$x."_OPC"];
						}
						if ($horario[$ind]['HOR_JUEVES'.$x] == $mat->MAT_CODIGO) {
							$horario_docente['HOR_JUEVES'.$x] = $mat->MAT_ABREVIATURA;
							$horario_docente['LAB_JUEVES'.$x] = $horario[$ind]->laboratorio->LAB_NOMBRE;
							$horario_docente["HOR_JUEVES".$x."_OPC"] = $horario[$ind]["HOR_JUEVES".$x."_OPC"];
						}

						if ($horario[$ind]['HOR_VIERNES'.$x] == $mat->MAT_CODIGO) {
							$horario_docente['HOR_VIERNES'.$x] = $mat->MAT_ABREVIATURA;
							$horario_docente['LAB_VIERNES'.$x] = $horario[$ind]->laboratorio->LAB_NOMBRE;
							$horario_docente["HOR_VIERNES".$x."_OPC"] = $horario[$ind]["HOR_VIERNES".$x."_OPC"];
						}
					}
				}
			}

			return view('guias.index', [
				'periodo' => $periodo,
				'docente' => $docentes,
				'count' => $count
			])->with('materias',$materias)
				->with('horario_docente',$horario_docente);
		}
	}

	public function regresarListarGuia($doc_id) {
		$docente = Docente::where('DOC_CODIGO',$doc_id)->first();
		$requestObj = new Request(array('usuario' => $docente->DOC_MIESPE, 'clave' => $docente->DOC_CLAVE));
		return $this->index($requestObj);
	}

	public function logout() {
		session()->forget('DOC_CODIGO');
		return view('guias.login');
	}

	public function crearGuiaIndex() {
		$periodos = Periodo::codigoNombre()->get();
		$materia_guia = DB::select('select materia.MAT_ABREVIATURA from materia where materia.MAT_CODIGO='.session('MAT_CODIGO'));
		return view('guia.crearGuia', [
			'periodos' => $periodos,
			'materia' => $materia_guia[0]->MAT_ABREVIATURA
		]);
	}

/**Obtines las materias del docente del periodo seleccionado */
	public function byPeriodoGet(Request $request,$id) {
		if($request->ajax()){
			$idDocente = session('DOC_CODIGO');
			$data = Materia::obtenerMateriaPorDocente($id, $idDocente)->get();
			return response()->json($data);
		}
	}

	/*Obtienes guias de materia seleccionada */
	public function byGuiaGet(Request $request,$id) {

		if($request->ajax()){
			$data = Guia::reporte($id)->get();
			return response()->json($data);
		}
	}

	/*crea la guia de CERO*/
	public function controlGuiaLaboratoriocreate() {
		/*obtener el codigo de la materia y buscar la primera guia que falte dentro de control*/
		$materia = session('MAT_CODIGO');
		$guias = new Guia;

		//obtener el horario de la materia
		$laboratorio = Horario::horarioMateria($materia)->first();
		$last = Guia::lastGuia($materia)->first();

		/**Verifica si existe una guia anterior
		* Si existe Asigna el coordinador y el numero de guia (incrementa 1 del anterior), asigna el codigo de laboratorio
		* No coordinador asigna vacio, empieza numero de guia 1 y asigna el codigo de laboratorio
			*/
		if (empty($last)) {
			$guias->GUI_COORDINADOR = "";
			$guias->GUI_NUMERO = 1;
			$control = Control::fechaGuiaSin($materia)->first();
		} else {
			$guias->GUI_COORDINADOR = $last->GUI_COORDINADOR;
			$guias->GUI_NUMERO = $last->GUI_NUMERO+1;
			$control = Control::fechaGuia($materia,$last->GUI_FECHA)->first();
		}
		$guias->LAB_CODIGO = $laboratorio->laboratorio->LAB_CODIGO;

		return view('guia.controlGuiaLaboratoriocreate',[
			'guia' => $guias,
			'fecha'=>$control,
			'last'=> $last,
		]);
	}
   /**Crea la guia Apartir de una Guia anterior */
   public function createGuiaSeleccion(Request $request) {
		//obtener el id de la guia
		$guiaId = $request->input('guiaCombo');

		/*obtener el codigo de la materia y buscar la primera guia que falte dentro de control*/
		$materia = session('MAT_CODIGO');

		/*obtener el los datos de la guia anterior*/
		$guias = Guia::codigoNombre($guiaId)->first();

		//obtener el horario de la materia
		$laboratorio = Horario::horarioMateria($materia)->first();
		$last = Guia::lastGuia($materia)->first();

		/**Verifica si existe una guia anterior
		* Si existe Asigna el coordinador y el numero de guia (incrementa 1 del anterior), asigna el codigo de laboratorio
		* No coordinador asigna vacio, empieza numero de guia 1 y asigna el codigo de laboratorio
		*/
		if (empty($last)) {
		 	// $guias->GUI_COORDINADOR = "";
			$guias->GUI_NUMERO=1;
			$control=Control::fechaGuiaSin($materia)->first();
		} else {
			//$guias->GUI_COORDINADOR = $last->GUI_COORDINADOR;
			$guias->GUI_NUMERO = $last->GUI_NUMERO + 1;
			$control = Control::fechaGuia($materia, $last->GUI_FECHA)->first();
		}

		$guias->LAB_CODIGO = $laboratorio->laboratorio->LAB_CODIGO;

		return view('guia.controlGuiaLaboratoriocreate', [
			'guia' => $guias,
			'fecha'=>$control,
		]);
	}

   /*Guardar GUIA*/
   public function guardarGuia(Request $request) {
		//obtiene el id de docente
		$docenteId = session('DOC_CODIGO');

		//busca el docente y crea el nombre con el titulo
		$docente = Docente::find($docenteId);
		$nombreDocente=$docente->DOC_TITULO." ".$docente->DOC_NOMBRES." ".$docente->DOC_APELLIDOS;

		//obtiene materia y periodo id
		$materia = session('MAT_CODIGO');
		$periodo = session('PER_CODIGO');

		//asigna las variables a la guia y guarda
		$guia = Guia::create([
			'DOC_CODIGO' => $docenteId,
			'MAT_CODIGO' => $materia,
			'LAB_CODIGO' => $request['LAB_CODIGO'],
			'PER_CODIGO' => $periodo,
			'GUI_NUMERO' => $request['GUI_NUMERO'],
			'GUI_FECHA' => $request['GUI_FECHA'],
			'GUI_TEMA' => $request['GUI_TEMA'],
			'GUI_DURACION' => $request['GUI_DURACION'],
			'GUI_OBJETIVO' => $request['GUI_OBJETIVO'],
			'GUI_EQUIPO_MATERIALES' => $request['GUI_EQUIPO_MATERIALES'],
			'GUI_TRABAJO_PREPARATORIO' => $request['GUI_TRABAJO_PREPARATORIO'],
			'GUI_ACTIVIDADES' => $request['GUI_ACTIVIDADES'],
			'GUI_RESULTADOS' => $request['GUI_RESULTADOS'],
			'GUI_CONCLUSIONES' => $request['GUI_CONCLUSIONES'],
			'GUI_RECOMENDACIONES' => $request['GUI_RECOMENDACIONES'],
			'GUI_REFERENCIAS_BIBLIOGRAFICAS' => $request['GUI_REFERENCIAS_BIBLIOGRAFICAS'],
			'GUI_ELABORADO' => $nombreDocente,
			'GUI_COORDINADOR' => $request['GUI_COORDINADOR'],
			'GUI_REGISTRADO' => 0,
			'GUI_INTRODUCCION' => $request['GUI_INTRODUCCION'],
			'GUI_APROBADO' => 0,
		]);

		return redirect('guia/listarGuias/'.$materia);
	}

	public function pdfGuia($id) {
		$guia = Guia::find($id);
		$materia = Materia::find($guia->MAT_CODIGO);
		$periodo = Periodo::find($guia->PER_CODIGO);
		$laboratorio = Laboratorio::find($guia->LAB_CODIGO);
		$docente = Docente::find($guia->DOC_CODIGO);
		$empresa = Empresa::find($laboratorio->EMP_CODIGO);
		$carrera = Carrera::find($materia->CAR_CODIGO);
		$guia["CAR_NOMBRE"] = $carrera->CAR_NOMBRE;
		$guia["MAT_NOMBRE"] = $materia->MAT_NOMBRE;
		$guia["MAT_CODIGO"]= $materia->MAT_CODIGO_BANNER;
		$guia["MAT_NRC"] = $materia->MAT_NRC;
		$guia["MAT_NIVEL"]= $materia->MAT_NIVEL;
		$guia["PER_NOMBRE"] = $periodo->PER_NOMBRE;
		$guia["EMP_NOMBRE"] = $empresa->EMP_NOMBRE;
		$guia["LAB_NOMBRE"] = $laboratorio->LAB_NOMBRE;
		$guia["DOC_NOMBRE"] = $docente->DOC_TITULO." ".$docente->DOC_NOMBRES." ".$docente->DOC_APELLIDOS;
		$pdf = PDF::loadView('reportes.pdfguia',compact('guia'))->setPaper('a4');
		return $pdf->stream('Reporte.pdf');
	}
}