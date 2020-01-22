<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Control;
use App\Docente;
use App\Guia;
use App\Laboratorio;
use App\Materia;
use App\Periodo;
use App\Solicitud;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Quotation;

use Carbon\Carbon; 

class ControlController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$fecha=$request->session()->get('fecha');
		if($fecha==null){
			$fecha=$request['CON_DIA'];
		}
		$controles= $this->listar($fecha);
		return view('control.index', compact('controles'));
	}



	public function listar($fecha)
	{
		if($fecha==null){
			$fecha = getdate()["year"]."-".getdate()["mon"]."-".getdate()["mday"];
		}
		$controles = DB::select('select laboratorio.LAB_NOMBRE,Count(*) as REGISTROS,control.CON_DIA from laboratorio,control where laboratorio.LAB_CODIGO=control.LAB_CODIGO and control.CON_DIA="'.$fecha.'" group by laboratorio.LAB_NOMBRE;' );
		$controles["fecha"]=$fecha;
		return $controles;
	}

	public function saber_dia($nombredia) {
		$dias = array('DOMINGO','LUNES','MATES','MIERCOLES','JUEVES','VIERNES','SABADO');
		$fecha = $dias[date('N', strtotime($nombredia))];
		return $fecha;
	}
	
	public function generar(Request $request)
	{
		$accion="";
		$mensaje="";
		$empresa = $request->user()->empresa->EMP_CODIGO;
		$CON_FECHA = $request['CON_DIA'];
		$dia=$this->saber_dia($CON_FECHA);
		if ($dia!="SABADO" && $dia!="DOMINGO"){
			$controles_guardados=DB::select('SELECT control.CON_CODIGO,control.CON_DIA,laboratorio.EMP_CODIGO FROM control , laboratorio WHERE control.LAB_CODIGO=laboratorio.LAB_CODIGO and control.CON_DIA="'.$CON_FECHA.'" and laboratorio.EMP_CODIGO="'.$empresa.'"');
			$mensaje="Ya existen registro de esa fecha";
			$accion='error';
			$ocacional=$request['MAT_OCACIONAL'];
			if(empty($controles_guardados)){
				$codigo_periodo=Periodo::where('PER_ESTADO', 1)->first();
				$codigo_periodo=$codigo_periodo->PER_CODIGO;
				$opcional=" and materia.MAT_OCACIONAL=0";

				if($ocacional=='on'){
					$opcional="";
				}

				$controles=array();
				for($i=1;$i<13;$i++)
				{
					$aux_controles=DB::select('select materia.MAT_CODIGO, horario.HOR_HORA'.$i.' as HORA, horario.HOR_CODIGO, laboratorio.LAB_CODIGO, materia.DOC_CODIGO, materia.MAT_OCACIONAL
					from materia, horario, laboratorio,periodo,docente
					where docente.DOC_CODIGO=materia.DOC_CODIGO and horario.PER_CODIGO=periodo.PER_CODIGO and periodo.PER_CODIGO=materia.PER_CODIGO  and horario.LAB_CODIGO=laboratorio.LAB_CODIGO and periodo.PER_CODIGO='.$codigo_periodo.' and horario.HOR_'.$dia.$i.'=materia.MAT_CODIGO'.$opcional.' and laboratorio.EMP_CODIGO='.$empresa );
					foreach ($aux_controles as $con)
					{
						$con->ENTRADA=preg_split("/-/",$con->HORA)[0];
						$con->SALIDA=preg_split("/-/",$con->HORA)[1];
						array_push($controles,$con);
					}
				}
				

				$aux=0;

				for ($i=0;$i<sizeof($controles);$i++)
				{
					$controles[$i]->CANT_HORAS=0;
					for ($j=0;$j<sizeof($controles);$j++){
						if($controles[$i]->MAT_CODIGO==$controles[$j]->MAT_CODIGO && $controles[$i]->LAB_CODIGO==$controles[$j]->LAB_CODIGO){
							$controles[$i]->CANT_HORAS+=1;
							if($controles[$i]->SALIDA==$controles[$j]->ENTRADA)
							{
								$controles[$j]->ENTRADA=$controles[$i]->ENTRADA;
							}
							if($controles[$j]->ENTRADA==$controles[$i]->ENTRADA){
								$controles[$i]->SALIDA=$controles[$j]->SALIDA;
							}
						}
					}
					$controles[$i]->HORA="";
				}
				$controles=array_unique($controles,SORT_REGULAR);
				
				foreach($controles as $con){
					DB::insert('insert into control (CON_DIA, CON_HORA_ENTRADA, CON_HORA_SALIDA, CON_NUMERO_HORAS,LAB_CODIGO, MAT_CODIGO, DOC_CODIGO, CON_EXTRA) values (?,?,?,?,?,?,?,?)', [$CON_FECHA,$con->ENTRADA,$con->SALIDA,$con->CANT_HORAS,$con->LAB_CODIGO,$con->MAT_CODIGO,$con->DOC_CODIGO,$con->MAT_OCACIONAL]);
				}
				$accion='success';
				$mensaje="Registros Generados";
			}
		}
		else {
			$accion="error";
			$mensaje="No se puede generar horarios de un fin de semana";
		}
		return redirect('control')->with('fecha',$CON_FECHA)->with($accion,$mensaje);
		
		
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create()
	{
		$laboratorios = Laboratorio::all();
		$materias = Materia::all();
		$docentes = Docente::all();
		//return view('control.create',["laboratorios"=>$laboratorios],["materias"=>$materias],["docentes"=>$docentes]);
		return view('control.create')->with('laboratorios', $laboratorios)->with('materias', $materias)->with('docentes', $docentes);
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function search(Request $request)
	{
	
		return redirect('control');
		//
	}
	public function show($id)
	{
		
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$control = Control::find($id);
		$laboratorios = Laboratorio::all();
		$materias = Materia::all();
		$docentes = Docente::all();
		//return view("control.edit", ["control"=>$control,"laboratorios"=>$laboratorios,"materias"=>$materias,"docentes"=>$docentes]);
		return view('control.edit')->with('control', $control)->with('laboratorios', $laboratorios)->with('materias', $materias)->with('docentes', $docentes);
	}

	public function docente($id){
		$date = Carbon::now();
		$date = $date->format('Y-m-d');
		$control = Control::where('CON_DIA', $date)->get();
		return view("control.consola", ["controles"=>$control]);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		//
		$control = Control::find( $request['CON_CODIGO']);
		$control->CON_DIA = $request['CON_DIA'];
		$control->CON_HORA_ENTRADA = $request['CON_HORA_ENTRADA'];
		$control->CON_HORA_SALIDA = $request['CON_HORA_SALIDA'];
		$control->CON_LAB_ABRE = $request['CON_LAB_ABRE'];
		$control->CON_HORA_ENTRADA_R = $request['CON_HORA_ENTRADA_R'];
		$control->CON_REG_FIRMA_ENTRADA = $request['CON_REG_FIRMA_ENTRADA'];
		$control->CON_HORA_SALIDA_R = $request['CON_HORA_SALIDA_R'];
		$control->CON_REG_FIRMA_SALIDA = $request['CON_REG_FIRMA_SALIDA'];
		$control->CON_LAB_CIERRA =$request['CON_LAB_CIERRA'];
		$control->CON_OBSERVACIONES = $request['CON_OBSERVACIONES'];
		$control->CON_NUMERO_HORAS = $request['CON_NUMERO_HORAS'];
		$control->CON_NOTA = $request['CON_NOTA'];
		$control->CON_EXTRA = $request['CON_EXTRA'];
		$control->CON_GUIA = $request['CON_GUIA'];
		$control->GUI_CODIGO = $request['GUI_CODIGO'];
		$control->LAB_CODIGO = $request['LAB_CODIGO'];
		$control->MAT_CODIGO = $request['MAT_CODIGO'];
		$control->DOC_CODIGO = $request['DOC_CODIGO'];
		$control->save();
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
		//
		$control = Control::find($id);
		$control->delete();
		return redirect('control');
	}
	public function consola(Request $request)
	{
		//
		$date = Carbon::now();
		$empresa = $request->user()->empresa->EMP_CODIGO;
		//echo $empresa;
		$campus=0;
		$date = $date->format('Y-m-d');
		//$date='2020-01-21';
		//$control = Control::where('CON_DIA', $date)->get();
		$control = Control::filtroEmpresa($date,$empresa)->get();
		
		return view("control.consola", ["controles"=>$control])->with('campus', $campus);;
		
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
		
		$campus = $request['campus'];
		if ($campus!=0){
			$controles=$this->getLaboratorio($campus,$request->user()->empresa->EMP_CODIGO);
			//echo ($campus);
			return view("control.consola", ["controles"=>$controles])->with('campus', $campus);
		}else{
			return redirect("control/consola");
		}

		
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

		
		$campus = $request['campus'];
		if ($campus!=0){
			$controles=$this->getLaboratorio($campus,$request->user()->empresa->EMP_CODIGO);
			//echo ($campus);
			return view("control.consola", ["controles"=>$controles])->with('campus', $campus);
		}else{
			return redirect("control/consola");
		}
	}

	public function getLaboratorio($campus,$empresa){

		$date = Carbon::now();
		$date = $date->format('Y-m-d');
		//$date='2020-01-21';
		
		$control = Control::filtroEmpresaCampus($date,$empresa,$campus)->get();
		
		return $control;
	}
	public function filtroCampus(Request $request){
		$campus = $request->input('campus');
		$empresa = $request->user()->empresa->EMP_CODIGO;
		$controles=$this->getLaboratorio($campus,$empresa);
		
		return view("control.consola", ["controles"=>$controles])->with('campus', $campus);
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
			$campus = $request['campus'];
			if ($campus!=0){
				$controles=$this->getLaboratorio($campus,$request->user()->empresa->EMP_CODIGO);
				//echo ($campus);
				return view("control.consola", ["controles"=>$controles])->with('campus', $campus)->with('title', 'EXITO!')
				->with('subtitle', 'El registro de la guia se ha realizado con exito');
			}else{
				return redirect("control/consola")->with('title', 'EXITO!')
				->with('subtitle', 'El registro de la guia se ha realizado con exito');
			}
		}else{
			$campus = $request['campus'];
			if ($campus!=0){
				$controles=$this->getLaboratorio($campus,$request->user()->empresa->EMP_CODIGO);
				//echo ($campus);
				return view("control.consola", ["controles"=>$controles])->with('campus', $campus)->with('mensajes','No existe guia');
			}else{
				return redirect("control/consola")->with('mensajes','No existe guia');
			}
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
				$solicitud->SOL_ESTADO = 1;
			}else{
				$control->SOL_CODIGO = null;
				$solicitud->SOL_ESTADO = 0;
			}
			$solicitud->save();
			$control->save();
			$campus = $request['campus'];
			if ($campus!=0){
				$controles=$this->getLaboratorio($campus,$request->user()->empresa->EMP_CODIGO);
				//echo ($campus);
				return view("control.consola", ["controles"=>$controles])->with('campus', $campus)->with('title', 'EXITO!')
				->with('subtitle', 'El registro de la solicitud se ha realizado con exito');
			}else{
				return redirect("control/consola")->with('title', 'EXITO!')
				->with('subtitle', 'El registro de la solicitud se ha realizado con exito');
			}

		}else{
			$campus = $request['campus'];
			if ($campus!=0){
				$controles=$this->getLaboratorio($campus,$request->user()->empresa->EMP_CODIGO);
				//echo ($campus);
				return view("control.consola", ["controles"=>$controles])->with('campus', $campus)->with('mensajes','No existe solicitud');
			}else{
				return redirect("control/consola")->with('mensajes','No existe solicitud');
			}
		}

	}
}
