<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Control;
use App\Docente;
use App\Guia;
use App\Laboratorio;
use App\Carrera;
use App\Periodo;
use App\Materia;
use App\Solicitud;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Quotation;

use Carbon\Carbon; 

class ControlController extends Controller {


	//CRUD CONTROL ACTUALIZADO
	public function index()
	{
		$guias = Guia::all();
		$docentes = Docente::all();
		$materias=Materia::all();
		$laboratorios=Laboratorio::all();
		$controles = Control::all();
		return view("control.index", ["controles"=>$controles,
		"guias" => $guias,
		"docentes" => $docentes,
		"materias"=>$materias,
		"laboratorios"=>$laboratorios]);
	}
	

	public function create()
	{
		$docentes = Docente::all();
		$materias=Materia::all();
		$laboratorios=Laboratorio::all();
		$guias=Guia::all();
		return view('control.create', ["docentes" => $docentes,
		"materias"=>$materias,
		"laboratorios"=>$laboratorios,
		"guias"=>$guias]);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		Control::create([
            'CON_DIA' => $request['CON_DIA'],
			'CON_HORA_ENTRADA' => $request['CON_HORA_ENTRADA'],
			'CON_HORA_SALIDA' => $request['CON_HORA_SALIDA'],
			'CON_LAB_ABRE' => $request['CON_LAB_ABRE'],
			'CON_HORA_ENTRADA_R' => $request['CON_HORA_ENTRADA_R'],
			'CON_REG_FIRMA_ENTRADA' => $request['CON_REG_FIRMA_ENTRADA'],
			'CON_HORA_SALIDA_R' =>  $request['CON_HORA_SALIDA_R'],
			'CON_REG_FIRMA_SALIDA' => $request['CON_REG_FIRMA_SALIDA'],
			'CON_LAB_CIERRA' => $request['CON_LAB_CIERRA'],
			'CON_OBSERVACIONES' => $request['CON_OBSERVACIONES'],
			'CON_NUMERO_HORAS' => $request['CON_NUMERO_HORAS'],
			'CON_NOTA' => $request['CON_NOTA'],
			'CON_EXTRA' => $request['CON_EXTRA'],
			'CON_GUIA' => $request['CON_GUIA'],
			'GUI_CODIGO' => $request['GUI_CODIGO'],
			'LAB_CODIGO' => $request['LAB_CODIGO'],
			'MAT_CODIGO' => $request['MAT_CODIGO'],
			'DOC_CODIGO' => $request['DOC_CODIGO'],
		]);

		return redirect('control');
	}
	public function edit($id)
	{
		//
		$control = Control::find($id);
		$laboratorios = Laboratorio::all();
		$materias = Materia::all();
		$docentes = Docente::all();
		$guias=Guia::all();
		return view("control.edit", ["control"=>$control,
		"laboratorios"=>$laboratorios,
		"materias"=>$materias,
		"docentes"=>$docentes,
		"guias"=>$guias]);
		//return view('control.edit')->with('control', $control)->with('laboratorios', $laboratorios)->with('materias', $materias)->with('docentes', $docentes);
	}
	public function update(Request $request)
	{
		$control =	control::find( $request['CON_CODIGO']);
		$control->fill([
            'CON_DIA' => $request['CON_DIA'],
			'CON_HORA_ENTRADA' => $request['CON_HORA_ENTRADA'],
			'CON_HORA_SALIDA' => $request['CON_HORA_SALIDA'],
			'CON_LAB_ABRE' => $request['CON_LAB_ABRE'],
			'CON_HORA_ENTRADA_R' => $request['CON_HORA_ENTRADA_R'],
			'CON_REG_FIRMA_ENTRADA' => $request['CON_REG_FIRMA_ENTRADA'],
			'CON_HORA_SALIDA_R' =>  $request['CON_HORA_SALIDA_R'],
			'CON_REG_FIRMA_SALIDA' => $request['CON_REG_FIRMA_SALIDA'],
			'CON_LAB_CIERRA' => $request['CON_LAB_CIERRA'],
			'CON_OBSERVACIONES' => $request['CON_OBSERVACIONES'],
			'CON_NUMERO_HORAS' => $request['CON_NUMERO_HORAS'],
			'CON_NOTA' => $request['CON_NOTA'],
			'CON_EXTRA' => $request['CON_EXTRA'],
			'CON_GUIA' => $request['CON_GUIA'],
			'GUI_CODIGO' => $request['GUI_CODIGO'],
			'LAB_CODIGO' => $request['LAB_CODIGO'],
			'MAT_CODIGO' => $request['MAT_CODIGO'],
			'DOC_CODIGO' => $request['DOC_CODIGO'],
		]);
		$guia->save();
		return redirect('control');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Control::destroy($id);
		return redirect('control');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */



	public function docente($id){
		$date = Carbon::now();
		$date = $date->format('Y-m-d');
		$control = Control::where('CON_DIA', $date)->get();
		return view("control.consola", ["controles"=>$control]);
	}




	public function consola(Request $request)
	{
		//
		$date = Carbon::now();
		$empresa = $request->user()->empresa->EMP_CODIGO;
	
		$date = $date->format('Y-m-d');
		//$control = Control::where('CON_DIA', $date)->get();
		$control = Control::filtroEmpresa($date,$empresa)->get();
		return view("control.consola", ["controles"=>$control]);
		
	}
	//GUIA ANTERIOR
	public function Guia_Anterior(Request $request)
	{
		$idempresa = $request->user()->empresa->EMP_CODIGO;
		$periodos = Periodo::where('EMP_CODIGO', $idempresa)->codigoNombre()->get();
		$docentes = docente::codigoNombre()->get();
		$date = Carbon::now();
		$date = $date->format('Y-m-d');
		$guiaSearch = guia::codigoNombre()->get();
		$controles=Control::filtroEmpresa($date,$idempresa)->get();
		$docentesOrdenados=$docentes->sortBy('DOC_APELLIDOS');
		$materias= materia::All();
		return view("control.Guia_Anterior",["controles"=>$controles,
			"periodos"=>$periodos,
			"docentes"=>$docentesOrdenados,
			"materias"=>$materias,
			"guias"=>$guiaSearch]);	
	}
	public function updateD(Request $request)
	{
		//
		$control = Control::find( $request['CON_CODIGO']);
		$doc = Docente::find($control->DOC_CODIGO);
		$firma = $request->user()->name;
		$time = time();
		$hora = date("H:i:s", $time);
		if ($control->CON_REG_FIRMA_ENTRADA == null) {
				 	# code...
			$control->CON_REG_FIRMA_ENTRADA = $firma;
			$control->CON_HORA_ENTRADA_R = $hora;
		}else{
			$control->CON_HORA_SALIDA_R = $hora;
			$control->CON_REG_FIRMA_SALIDA = $firma;
		} 

		$control->save();
		
		return redirect("control/consola");
	}

	public function updateDocente(Request $request)
	{
		//
		$control = Control::find( $request['CON_CODIGO']);
		$doc = Docente::find($control->DOC_CODIGO);
		$firma = $request->user()->name;
		$time = time();
		$hora = date("H:i:s", $time);
		if ($control->CON_REG_FIRMA_ENTRADA == null) {
				 	# code...
			$control->CON_REG_FIRMA_ENTRADA = $firma;
			$control->CON_HORA_ENTRADA_R = $hora;
		}else{
			$control->CON_HORA_SALIDA_R = $hora;
			$control->CON_REG_FIRMA_SALIDA = $firma;
		} 

		$control->save();
		
		return redirect("control/Guia_Anterior");
	}


	public function updateL(Request $request)
	{
		//
		$name = $request->name;
		$control = Control::find( $request['CON_CODIGO']);
		$doc = Docente::find($control->DOC_CODIGO);
		$firma = $request->user()->name;
		if ($control->CON_LAB_ABRE ==null) {
					# code...
			$control->CON_LAB_ABRE = $firma;
		}else{
			$control->CON_LAB_CIERRA = $firma;
		}

		$control->save();
		
		return redirect("control/consola");
	}
	public function updateLab(Request $request)
	{
		//
		$name = $request->name;
		$control = Control::find( $request['CON_CODIGO']);
		$doc = Docente::find($control->DOC_CODIGO);
		$firma = $request->user()->name;
		if ($control->CON_LAB_ABRE ==null) {
					# code...
			$control->CON_LAB_ABRE = $firma;
		}else{
			$control->CON_LAB_CIERRA = $firma;
		}

		$control->save();
		
		return redirect("control/Guia_Anterior");
	}
	public function filtroCampus(Request $request){
		$campus = $request->input('campus');
		$laboratorios = Laboratorio::filtrarCampus($campus)->get();
		$date = Carbon::now();
		$date = $date->format('Y-m-d');
		$controles =  array();
		
		for ($j=0; $j <sizeof($laboratorios) ; $j++) {
			# code...
			
			$control = Control::where('CON_DIA', $date)->where('LAB_CODIGO', $laboratorios[$j]->LAB_CODIGO)->first();
			
			if ($control != null) {
				# code...
				array_push ( $controles , $control );
			}else{
				
			}
			
		}
		
		echo sizeof($controles);
		
		return view("control.consola", ["controles"=>$controles]);
	}
	
		
	//valida que este autenticado para acceder al controlador
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function updatePorGuia(Request $request)
	{
		//
		$control = Control::find( $request['CON_CODIGO']);
		$guia = Guia::guiasParaControl($control->CON_DIA, $control->DOC_CODIGO, $control->MAT_CODIGO)->first();
		if ($guia != null) {
			# code...
			//echo $guia[0]->GUI_CODIGO;
			if ($control->CON_GUIA == null) {
					# code...
				$control->GUI_CODIGO = $guia->GUI_CODIGO;
				$control->CON_GUIA = 1;
				$guia->GUI_REGISTRADO = 1;
			}else{
				$control->GUI_CODIGO = null;
				$control->CON_GUIA = null;
				$guia->GUI_REGISTRADO = 0;
			}
			$guia->save();
			$control->save();
			return redirect("control/consola")->with('title', 'EXITO!')
			->with('subtitle', 'El registro de la guia se ha realizado con exito');	
		}else{
			return redirect("control/consola")->with('mensajes','No existe guia');	
		}

	}

	public function nota(Request $request){
		$control = Control::find( $request['CON_CODIGO']);
		return view("control/nota", ["control"=>$control]);
	}

	public function updateNonta(Request $request){
		$control = Control::find( $request['CON_CODIGO']);
		$control->CON_NOTA = $request['CON_NOTA'];
		$control->save();
			return redirect("control/consola")->with('title', 'EXITO!')
			->with('subtitle', 'El registro de la nota se completo con exito');
	}
	 public function updatePorSolicitud(Request $request)
	{
		//
		$control = Control::find( $request['CON_CODIGO']);
		$solicitud = Solicitud::solParaControl($control->CON_DIA, $control->DOC_CODIGO, $control->MAT_CODIGO)->first();
		if ($solicitud != null) {
			# code...
			//echo $guia[0]->GUI_CODIGO;
			if ($control->SOL_CODIGO == null) {
					# code...
				$control->SOL_CODIGO = $solicitud->SOL_CODIGO;
				$solicitud->SOL_ESTODO = 1;
			}else{
				$control->SOL_CODIGO = null;
				$solicitud->SOL_ESTODO = 0;
			}
			$solicitud->save();
			$control->save();
			return redirect("control/consola")->with('title', 'EXITO!')
			->with('subtitle', 'El registro de la solicitud se ha realizado con exito');	
		}else{
			return redirect("control/consola")->with('mensajes','No existe solicitud');	
		}

	}
}
