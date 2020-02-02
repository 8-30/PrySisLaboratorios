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

	//CRUD NUEVO GUIAS 
	public function index()
	{
		$guia = Guia::all();
		$docentes = Docente::all();
		$materias=Materia::all();
		$laboratorios=Laboratorio::all();
		$periodos=Periodo::all();
		return view("CrudGuia.index", ["guias" => $guia,
		"docentes" => $docentes,
		"materias"=>$materias,
		"laboratorios"=>$laboratorios,
		"periodos"=>$periodos]);
	}
	public function create()
	{
		$docentes = Docente::all();
		$materias=Materia::all();
		$laboratorios=Laboratorio::all();
		$periodos=Periodo::all();
		return view('CrudGuia.create', ["docentes" => $docentes,
		"materias"=>$materias,
		"laboratorios"=>$laboratorios,
		"periodos"=>$periodos]);
	}
	public function store(Request $request)
	{

		Guia::create([
			'DOC_CODIGO' => 				$request['DOC_CODIGO'],
			'MAT_CODIGO' => 				$request['MAT_CODIGO'],
			'LAB_CODIGO' => 				$request['LAB_CODIGO'],
			'PER_CODIGO' => 				$request['PER_CODIGO'],
			'GUI_NUMERO' => 				$request['GUI_NUMERO'],
            'GUI_FECHA' => 				    $request['GUI_FECHA'],
            'GUI_TEMA' => 				    $request['GUI_TEMA'],
			'GUI_DURACION' => 			    $request['GUI_DURACION'],
			'GUI_OBJETIVO' => 				$request['GUI_OBJETIVO'],
			'GUI_EQUIPO_MATERIALES' => 	    $request['GUI_EQUIPO_MATERIALES'],
			'GUI_TRABAJO_PREPARATORIO' => 	$request['GUI_TRABAJO_PREPARATORIO'],
			'GUI_ACTIVIDADES' => 	        $request['GUI_ACTIVIDADES'],
			'GUI_RESULTADOS' => 		    $request['GUI_RESULTADOS'],
			'GUI_CONCLUSIONES' => 	        $request['GUI_CONCLUSIONES'],
			'GUI_RECOMENDACIONES' => 		$request['GUI_RECOMENDACIONES'],
			'GUI_REFERENCIAS_BIBLIOGRAFICAS' => $request['GUI_REFERENCIAS_BIBLIOGRAFICAS'],
			'GUI_ELABORADO' => 				$request['GUI_ELABORADO'],
			'GUI_APROBADO' => 				$request['GUI_APROBADO'],
			'GUI_REGISTRADO' => 				$request['GUI_REGISTRADO'],
			'GUI_INTRODUCCION' => 				$request['GUI_INTRODUCCION'],
			'GUI_COORDINADOR' => 				$request['GUI_COORDINADOR'],
		]);

		return redirect('guia');
	}
	public function edit($id)
	{
		$guia =	Guia::find($id);
		$docentes = Docente::all();
		$materias=Materia::all();
		$laboratorios=Laboratorio::all();
		$periodos=Periodo::all();
		
		return view("CrudGuia.edit", [
			"guia" => $guia,
			"docentes" => $docentes,
			"materias"=>$materias,
			"laboratorios"=>$laboratorios,
			"periodos"=>$periodos
		]);
	}
	public function update(Request $request)
	{
		$guia =	guia::find( $request['GUI_CODIGO']);
		$guia->fill([
			'DOC_CODIGO' => 				$request['DOC_CODIGO'],
			'MAT_CODIGO' => 				$request['MAT_CODIGO'],
			'LAB_CODIGO' => 				$request['LAB_CODIGO'],
			'PER_CODIGO' => 				$request['PER_CODIGO'],
			'GUI_NUMERO' => 				$request['GUI_NUMERO'],
            'GUI_FECHA' => 				    $request['GUI_FECHA'],
            'GUI_TEMA' => 				    $request['GUI_TEMA'],
			'GUI_DURACION' => 			    $request['GUI_DURACION'],
			'GUI_OBJETIVO' => 				$request['GUI_OBJETIVO'],
			'GUI_EQUIPO_MATERIALES' => 	    $request['GUI_EQUIPO_MATERIALES'],
			'GUI_TRABAJO_PREPARATORIO' => 	$request['GUI_TRABAJO_PREPARATORIO'],
			'GUI_ACTIVIDADES' => 	        $request['GUI_ACTIVIDADES'],
			'GUI_RESULTADOS' => 		    $request['GUI_RESULTADOS'],
			'GUI_CONCLUSIONES' => 	        $request['GUI_CONCLUSIONES'],
			'GUI_RECOMENDACIONES' => 		$request['GUI_RECOMENDACIONES'],
			'GUI_REFERENCIAS_BIBLIOGRAFICAS' => $request['GUI_REFERENCIAS_BIBLIOGRAFICAS'],
			'GUI_ELABORADO' => 				$request['GUI_ELABORADO'],
			'GUI_APROBADO' => 				$request['GUI_APROBADO'],
			'GUI_REGISTRADO' => 				$request['GUI_REGISTRADO'],
			'GUI_INTRODUCCION' => 				$request['GUI_INTRODUCCION'],
			'GUI_COORDINADOR' => 				$request['GUI_COORDINADOR'],
		]);
		$guia->save();
		return redirect('guia');
	}


	public function destroy($id) {
		Guia::destroy($id);
		return redirect('guia');
	}


	////FIN DE CRUD ACTUALIZADO

	public function login() {
		return view('guias.login');
	}

	public function indexActual(Request $request) {
		$docentes = Docente::where('DOC_MIESPE', $request['usuario'])
			->where('DOC_CLAVE',$request['clave'])->first();

		if(count($docentes) == 0) {
			return redirect('guia/login')
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

			return view('guias.indexActual', [
				'periodo' => $periodo,
				'docente' => $docentes,
				'count' => $count
			])->with('materias',$materias)
				->with('horario_docente',$horario_docente);
		}
	}

	public function logout() {
		session()->forget('DOC_CODIGO');
		return view('guias.login');
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