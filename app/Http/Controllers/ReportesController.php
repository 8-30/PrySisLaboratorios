<?php namespace App\Http\Controllers;
/**
 * Sistema de Gestion de Laboratorios - ESPE
 *
 * Author: Jerson Morocho
 		   Barrera Erick - LLamuca Andrea
 * Revisado por: Jerson Morocho
 */

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Horario;
use App\Materia;
use App\Laboratorio;
use App\Periodo;
use App\Docente;
use App\Carrera;
use App\control;
use App\Campus;
use App\Guia;
use App\EventoOcacional;
use App\Session;
use App\Solicitud;
use App\Empresa;

use PDF;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportesController extends Controller {

	public function horarioPorSalasIndex()
	{
		$periodos = Periodo::codigoNombre()->get();
		//$periodos = DB::table('periodo')->select('PER_CODIGO', 'PER_NOMBRE')->get();
		$laboratorios = Laboratorio::codigoNombreCapacidad()->get();
		return view('reportes.horarioSala', [
			'periodos' => $periodos,
			'laboratorios' => $laboratorios
		]);
	}
	public function horarioPorSalasPost(Request $request)
	{
		$periodoId = $request->input('periodo');
		$laboratorioId = $request->input('laboratorio');
		$periodox=Periodo::find($periodoId);
		$Laboratoriox=Laboratorio::find($laboratorioId);
		$periodos = Periodo::codigoNombre()->get();
		$laboratorios = Laboratorio::codigoNombreCapacidad()->get();
		$count = Horario::obtenerHorario($periodoId, $laboratorioId)->count();
		$horario = Horario::obtenerHorario($periodoId, $laboratorioId)->first();
		$materias = Materia::reporte($periodoId)->get();

		for ($x = 1; $x <= 13; $x++) {
			foreach ($materias as $mat) {
				$docente = $mat->docente->DOC_TITULO.' '.$mat->docente->DOC_NOMBRES.' '.$mat->docente->DOC_APELLIDOS;
				if ($horario['HOR_LUNES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_LUNES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_LUNES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_MATES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_MATES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_MATES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_MIERCOLES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_MIERCOLES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_MIERCOLES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_JUEVES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_JUEVES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_JUEVES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_VIERNES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_VIERNES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_VIERNES_DOC'.$x] = $docente;
				}
			}
		}

		return view('reportes.horarioSala', [
			'periodos' => $periodos->reverse(),
			'laboratorios' => $laboratorios,
			'count' => $count,
			'horario' => $horario,
			'periodox' => $periodox,
			'Laboratoriox' => $Laboratoriox
		]);
	}

	public function hojaControl(Request $request)
	{
		$controles= $this->listar($request['CON_DIA'],$request['CAM_CODIGO']);
		$campus=DB::select('SELECT * FROM campus');
		return view('reportes.hojaControl', compact('controles','campus'));

	}

	// El nombre del metodo no esta claro a que modulo pertenece
	public function listar($fecha,$campus)
	{
		if($fecha==null){
			$fecha = getdate()["year"]."-".getdate()["mon"]."-".getdate()["mday"];
		}
        $controles = DB::select('SELECT @rownum:=@rownum+1 AS ORD, control.MAT_CODIGO,materia.MAT_ABREVIATURA,materia.MAT_NRC,laboratorio.LAB_NOMBRE,control.CON_HORA_ENTRADA,CON_HORA_SALIDA,docente.DOC_CODIGO, docente.DOC_NOMBRES, docente.DOC_APELLIDOS, docente.DOC_TITULO,empresa.EMP_NOMBRE,control.CON_EXTRA,control.CON_DIA,campus.CAM_CODIGO, materia.MAT_NUM_EST,laboratorio.LAB_CODIGO
		FROM (SELECT @rownum:=0) r, control,materia,laboratorio,docente,campus,empresa
		where laboratorio.EMP_CODIGO=empresa.EMP_CODIGO and control.MAT_CODIGO=materia.MAT_CODIGO and control.LAB_CODIGO=laboratorio.LAB_CODIGO and campus.CAM_CODIGO=laboratorio.CAM_CODIGO and materia.DOC_CODIGO=docente.DOC_CODIGO and control.CON_DIA="'.$fecha.'" and campus.CAM_CODIGO="'.$campus.'"
		order by control.CON_HORA_ENTRADA ASC;');

		//$controles["fecha"]=$fecha;
		return $controles;
	}

	public function horarioPorDocenteIndex()
	{
		$periodos = Periodo::codigoNombre()->get();
		$docentes = Docente::codigoNombre()->get();
		return view('reportes.horarioDocente', [
			'periodos' => $periodos->reverse(),
			'docentes' => $docentes
		]);

	}

	public function horarioPorDocentePost(Request $request)
	{
		$periodoId = $request->input('periodo');
		$docenteId = $request->input('docente');
		$periodox=Periodo::find($periodoId);
		$Docentex=Docente::find($docenteId);
		$periodos = Periodo::codigoNombre()->get();
		$docentes = Docente::codigoNombre()->get();
		$profesor = Docente::nombreDocente($docenteId)->first();

		$count = Horario::obtenerHorarioPorPeriodo($periodoId)->count();
		$horario = Horario::obtenerHorarioPorPeriodo($periodoId)->first();
		$materias = Materia::obtenerMateriaPorDocente($periodoId, $docenteId)->get();
		for ($x = 1; $x <= 13; $x++) {
			foreach ($materias as $mat) {
				$docente = $horario->laboratorio->LAB_NOMBRE;
				if ($horario['HOR_LUNES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_LUNES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_LUNES_DOC'.$x] = $docente ;
				}
				if ($horario['HOR_MATES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_MATES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_MATES_DOC'.$x] = $docente ;
				}
				if ($horario['HOR_MIERCOLES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_MIERCOLES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_MIERCOLES_DOC'.$x] = $docente ;
				}
				if ($horario['HOR_JUEVES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_JUEVES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_JUEVES_DOC'.$x] = $docente ;
				}
				if ($horario['HOR_VIERNES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_VIERNES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_VIERNES_DOC'.$x] = $docente ;
				}
			}
		}
		return view('reportes.horarioDocente', [
			'periodos' => $periodos->reverse(),
			'docentes' => $docentes,
			'count' => $count,
			'profesor' => $profesor,
			'horario' => $horario,'periodox' => $periodox,
			'Docentex' => $Docentex
		]);
	}

	public function materiaPorCarrera(Request $request) {
		$idempresa = $request->user()->empresa->EMP_CODIGO;
		$periodos = Periodo::where('EMP_CODIGO', $idempresa)
			->codigoNombre()->get();
		$carreras = Carrera::codigoNombre()->get()->sortBy('CAR_NOMBRE');

		$request = null;
		$materias = null;

		return view('reportes.materiaCarrera', [
			'periodos' => $periodos,
			'carreras' => $carreras,
			'valores'=> $request,
			'materias'=> $materias
		]);
	}

  public function materiaPorCarreraPost(Request $request) {
		$periodos = Periodo::codigoNombre()->get();
		$carreras = Carrera::codigoNombre()->get()->sortBy('CAR_NOMBRE');
	  $materias = Materia::materiasx($request['PER_CODIGO'],$request['CAR_CODIGO'])->get();
		$carreraSearch = Carrera::find($request['CAR_CODIGO']);
		$periodoSearch = Periodo::find($request['PER_CODIGO']);
		$valores  = $request;
		return view('reportes.materiaCarrera', [
			'periodos' => $periodos,
			'carreras' => $carreras,
			'valores'=> $request,
			'materias'=> $materias,
			'periodox'=> $periodoSearch,
			'carrerax'=> $carreraSearch
		]);
	}

	public function eventosOcasionalesIndex()
	{
		$periodos = Periodo::All()->reverse();
		$periodoActual=$periodos[0]->PER_CODIGO;
		$fechaFinal= Carbon::now()->format('Y-m-d');

		$fechaInicial=$fechaFinal;
		$sql='select periodo.PER_NOMBRE as PER_NOMBRE, periodo.PER_CODIGO as PER_CODIGO , control.CON_CODIGO as  CON_CODIGO , laboratorio.LAB_NOMBRE as LAB_NOMBRE,materia.MAT_NOMBRE as MAT_NOMBRE,materia.MAT_CODIGO as MAT_CODIGO, concat(docente.DOC_TITULO," ",docente.DOC_NOMBRES," ",docente.DOC_APELLIDOS)   as DOC_NOMBRE ,control.CON_DIA as CON_DIA,control.CON_HORA_ENTRADA as CON_HORA_ENTRADA , control.CON_HORA_SALIDA as CON_HORA_SALIDA, control.CON_NUMERO_HORAS as CON_NUMERO_HORAS, control.CON_NOTA as CON_NOTA, periodo.PER_NOMBRE as PER_NOMBRE   from control,materia,docente,periodo,laboratorio where control.LAB_CODIGO = laboratorio.LAB_CODIGO and control.MAT_CODIGO =materia.MAT_CODIGO and control.DOC_CODIGO = docente.DOC_CODIGO and materia.PER_CODIGO =periodo.PER_CODIGO and control.CON_EXTRA=1 and periodo.PER_CODIGO='.$periodoActual.' and control.CON_DIA  between \' '.$fechaInicial.'\''.' and \''.$fechaFinal.'\''.' order by control.CON_DIA DESC; ';
		$data = DB::select($sql);
		\Log::info('This is some useful information.');
		return view('reportes.eventos', compact('periodos'),compact('data'))->with('periodoActual',$periodoActual)->with('fechaInicial',$fechaInicial)->with('fechaFinal',$fechaFinal)->with('sql',$sql);


	}

	public function eventosOcasionalesPost(Request $request)
	{
		$periodos = Periodo::All()->reverse();
		$periodoActual=$request['PER_CODIGO'];
		$fechaFinal=$request['fechaFinal'];
		$fechaInicial=$request['fechaInicial'];
		$sql='select periodo.PER_NOMBRE as PER_NOMBRE, periodo.PER_CODIGO as PER_CODIGO , control.CON_CODIGO as  CON_CODIGO , laboratorio.LAB_NOMBRE as LAB_NOMBRE,materia.MAT_NOMBRE as MAT_NOMBRE,materia.MAT_CODIGO as MAT_CODIGO, concat(docente.DOC_TITULO," ",docente.DOC_NOMBRES," ",docente.DOC_APELLIDOS)   as DOC_NOMBRE ,control.CON_DIA as CON_DIA,control.CON_HORA_ENTRADA as CON_HORA_ENTRADA , control.CON_HORA_SALIDA as CON_HORA_SALIDA, control.CON_NUMERO_HORAS as CON_NUMERO_HORAS, control.CON_NOTA as CON_NOTA, periodo.PER_NOMBRE as PER_NOMBRE   from control,materia,docente,periodo,laboratorio where control.LAB_CODIGO = laboratorio.LAB_CODIGO and control.MAT_CODIGO =materia.MAT_CODIGO and control.DOC_CODIGO = docente.DOC_CODIGO and materia.PER_CODIGO =periodo.PER_CODIGO and control.CON_EXTRA=1 and periodo.PER_CODIGO='.$periodoActual.' and control.CON_DIA  between \' '.$fechaInicial.'\''.' and \''.$fechaFinal.'\''.' order by control.CON_DIA DESC; ';
		$data = DB::select($sql);
		\Log::info('This is some useful information.');
		return view('reportes.eventos', compact('periodos'),compact('data'))->with('periodoActual',$periodoActual)->with('fechaInicial',$fechaInicial)->with('fechaFinal',$fechaFinal)->with('sql',$sql);
	}

	public function usoGuiasEntregadas()
	{
		$periodos = Periodo::codigoNombre()->get();
		$docentes = docente::codigoNombre()->get();

		$request=null;
		$controles=null;

		return view('reportes.usoguiasentregadas', [
			'periodos' => $periodos,
			'docentes' => $docentes,
			'valores'=>$request,
			'controles'=>$controles
		]);
	}

	public function usoGuiasEntregadasPost(Request $request)
	{
		$periodos = Periodo::codigoNombre()->get();
		$docentes = docente::codigoNombre()->get();

		$materias=Materia::materiasxP($request['PER_CODIGO'],$request['DOC_CODIGO'])->get();
		$controles= null;
		for($i=0;$i<sizeof($materias);$i++){
			$controles[$i]=control::entregadasx($materias[$i]['MAT_CODIGO'])->get();
		}

		return view('reportes.usoguiasentregadas', [
			'periodos' => $periodos->reverse(),
			'docentes' => $docentes,
			'valores'=>$request,
			'controles'=>$controles
		]);
	}

	public function guiasPorCarrera()
	{
		$periodos = Periodo::codigoNombre()->get();
		$carreras = Carrera::codigoNombre()->get();

		$request=null;
		$guias=null;


		return view('reportes.guiaxcarrera', [
			'periodos' => $periodos->sortByDesc('PER_CODIGO'),
			'carreras' => $carreras->sortBy('CAR_NOMBRE'),
			'valores'=>$request,
			'guias'=>$guias
		]);
	}

	public function guiasPorCarreraPost(Request $request)
	{
		$periodos = Periodo::codigoNombre()->get();
		$carreras = Carrera::codigoNombre()->get();

		$periodoActual=Periodo::where('PER_CODIGO',$request->PER_CODIGO)->first();
		$fechaInicial=$request['FECHA_INCIAL'];
		$fechaFinal=$request['FECHA_FINAL'];

		$materias=Materia::materiasx($request['PER_CODIGO'],$request['CAR_CODIGO'])->get();
		$j=0;
		$guias=null;
		for($i=0;$i<sizeof($materias);$i++){

			if($fechaInicial!="" && $fechaFinal!=""){
			   $guiasValor[$i]=Guia::guiasxCarrera($materias[$i]['MAT_CODIGO'])->whereBetween('GUI_FECHA', [$fechaInicial, $fechaFinal])->get();
			}else{
                $request['FECHA_INCIAL']='INICIAL';
                $request['FECHA_FINAL']='FINAL';
                 $guiasValor[$i]=Guia::guiasxCarrera($materias[$i]['MAT_CODIGO'])->get();

			}
			if (sizeof($guiasValor[$i])!=0) {
				$guias[$j]=$guiasValor[$i];
				$j++;
			}
		}
		return view('reportes.guiaxcarrera', [
			'periodos' => $periodos->sortByDesc('PER_CODIGO'),
			'carreras' => $carreras->sortBy('CAR_NOMBRE'),
			'materias' => $materias,
			'valores'=> $request,
			'guias'=> $guias])
			->with('periodoActual',$periodoActual)
			->with('fechaInicial',$fechaInicial)
			->with('fechaFinal',$fechaFinal);
	}

	public function pdfcontrol(Request $request)
	{
		$controles= $this->listar($request['CON_DIA'],$request['CAM_CODIGO']);
		$pdf = PDF::loadView('reportes.pdfcontrol',compact('controles'))->setPaper('a4', 'landscape');

        return $pdf->stream('ReporteControl.pdf');
	}



	public function pdfevento($id,$fechaIni,$fechaFin)
	{
		$periodos = Periodo::All();
		$periodoActual=$id;
		$fechaActual= Carbon::now()->format('Y-m-d');
		$fechaFinal=$fechaFin;
		$fechaInicial=$fechaIni;
		$data = DB::select('select  periodo.PER_NOMBRE as PER_NOMBRE, periodo.PER_CODIGO as PER_CODIGO , control.CON_CODIGO as  CON_CODIGO , laboratorio.LAB_NOMBRE as LAB_NOMBRE,materia.MAT_ABREVIATURA as MAT_NOMBRE,materia.MAT_CODIGO as MAT_CODIGO, concat(docente.DOC_TITULO," ",docente.DOC_NOMBRES," ",docente.DOC_APELLIDOS)   as DOC_NOMBRE ,control.CON_DIA as CON_DIA,control.CON_HORA_ENTRADA as CON_HORA_ENTRADA , control.CON_HORA_SALIDA as CON_HORA_SALIDA, control.CON_NUMERO_HORAS as CON_NUMERO_HORAS, control.CON_NOTA as CON_NOTA, periodo.PER_NOMBRE as PER_NOMBRE   from control,materia,docente,periodo,laboratorio where control.LAB_CODIGO = laboratorio.LAB_CODIGO and control.MAT_CODIGO =materia.MAT_CODIGO and control.DOC_CODIGO = docente.DOC_CODIGO and materia.PER_CODIGO =periodo.PER_CODIGO and control.CON_EXTRA=1 and periodo.PER_CODIGO='.$periodoActual.' and control.CON_DIA  between \' '.$fechaInicial.'\''.' and \''.$fechaFinal.'\''.' order by control.CON_DIA ASC; ');
		$pdf = PDF::loadView('reportes.pdfevento',compact('data','fechaActual','fechaInicial','fechaFinal'))->setPaper('a4');

        return $pdf->stream('Reporte.pdf');
	}

	public function pdfmateriacarrera($idper,$idcar)
	{
		$periodos = Periodo::codigoNombre()->get();
		$carreras = Carrera::codigoNombre()->get();
		$materias = Materia::materiasx($idper,$idcar)->get();
		$periodos = $periodos->reverse();
		$fechaActual = Carbon::now()->format('Y-m-d');
		$carrerax = Carrera::find($idcar);
		$periodox = Periodo::find($idper);
		$empresa = Empresa::find($periodox->EMP_CODIGO);
		$pdf = PDF::loadView('reportes.pdfmateriacarrera', compact('materias','periodox','carrerax','fechaActual','empresa'))->setPaper('a4');

		return $pdf->stream('Reporte.pdf');
	}

	public function pdfhorariosala($idper,$idlab)
	{
		$periodoId = $idper;
		$laboratorioId = $idlab;
		$periodox=Periodo::find($idper);
		$laboratoriox=Laboratorio::find($idlab);
		$periodos = Periodo::codigoNombre()->get();
		$laboratorios = Laboratorio::codigoNombreCapacidad()->get();
		$count = Horario::obtenerHorario($periodoId, $laboratorioId)->count();
		$horario = Horario::obtenerHorario($periodoId, $laboratorioId)->first();
		$materias = Materia::reporte($periodoId)->get();
		$fechaActual= Carbon::now()->format('Y-m-d');

		for ($x = 1; $x <= 13; $x++) {
			foreach ($materias as $mat) {
				$docente = $mat->docente->DOC_TITULO.' '.$mat->docente->DOC_NOMBRES.' '.$mat->docente->DOC_APELLIDOS;
				if ($horario['HOR_LUNES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_LUNES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_LUNES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_MATES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_MATES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_MATES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_MIERCOLES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_MIERCOLES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_MIERCOLES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_JUEVES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_JUEVES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_JUEVES_DOC'.$x] = $docente;
				}
				if ($horario['HOR_VIERNES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_VIERNES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_VIERNES_DOC'.$x] = $docente;
				}
			}
		}

		$pdf = PDF::loadView('reportes.pdfhorariosala',compact('periodos','laboratorios','count','horario','periodox','laboratoriox','fechaActual'))->setPaper('a4');

        return $pdf->stream('Reporte.pdf');
	}

	public function pdfhorariodocente($idper,$iddoc)
	{
		$periodoId = $idper;
		$docenteId = $iddoc;
		$periodox=Periodo::find($idper);
		$Docentex=Docente::find($iddoc);
		$periodos = Periodo::codigoNombre()->get();
		$docentes = Docente::codigoNombre()->get();
		$profesor = Docente::nombreDocente($docenteId)->first();
		$count = Horario::obtenerHorarioPorPeriodo($periodoId)->count();
		$horario = Horario::obtenerHorarioPorPeriodo($periodoId)->first();
		$materias = Materia::obtenerMateriaPorDocente($periodoId, $docenteId)->get();
		$fechaActual= Carbon::now()->format('Y-m-d');

		for ($x = 1; $x <= 13; $x++) {
			foreach ($materias as $mat) {
				$docente = $horario->laboratorio->LAB_NOMBRE;
				if ($horario['HOR_LUNES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_LUNES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_LUNES_DOC'.$x] = $docente ;
				}
				if ($horario['HOR_MATES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_MATES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_MATES_DOC'.$x] = $docente ;
				}
				if ($horario['HOR_MIERCOLES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_MIERCOLES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_MIERCOLES_DOC'.$x] = $docente ;
				}
				if ($horario['HOR_JUEVES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_JUEVES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_JUEVES_DOC'.$x] = $docente ;
				}
				if ($horario['HOR_VIERNES'.$x] == $mat->MAT_CODIGO) {
					$horario['HOR_VIERNES'.$x] = $mat->MAT_ABREVIATURA;
					$horario['HOR_VIERNES_DOC'.$x] = $docente ;
				}
			}
		}

		$pdf = PDF::loadView('reportes.pdfhorariodocente',compact('periodos','docentes','count','horario','profesor','periodox','Docentex','fechaActual'))->setPaper('a4');

        return $pdf->stream('Reporte.pdf');
	}

	public function pdfCarreraGuia($idperiodo,$idcarrera,$fechaIni,$fechaFin)
	{
		$periodo=Periodo::find($idperiodo);
		$carrera=Carrera::find($idcarrera);
		$fechaFinal=$fechaFin;
		$fechaInicial=$fechaIni;

		$materias=Materia::materiasx($idperiodo,$idcarrera)->get();
		$j=0;
		$guias=null;
		for($i=0;$i<sizeof($materias);$i++){
			if($fechaInicial!="INICIAL" && $fechaFinal!="FINAL"){
			   $guiasValor[$i]=Guia::guiasxCarrera($materias[$i]['MAT_CODIGO'])->whereBetween('GUI_FECHA', [$fechaInicial, $fechaFinal])->get();
			}else{

                 $guiasValor[$i]=Guia::guiasxCarrera($materias[$i]['MAT_CODIGO'])->get();

			}
			if (sizeof($guiasValor[$i])!=0) {
				$guias[$j]=$guiasValor[$i];
				$j++;
			}
		}


		$pdf = PDF::loadView('reportes.pdfcarreraGuias',compact('guias','periodo','carrera','fechaInicial','fechaFinal'))->setPaper('a4');

        return $pdf->stream('Reporte.pdf');
	}
	public function pdfSolicitud($id)
	{
		$solicitud = Solicitud::find($id);
		$solicitud->laboratorio->empresa->materiales;
		$solicitud->detalleSolicitud;
		$solicitud->docente;
		$solicitud->materia;
		$pdf = PDF::loadView('reportes.pdfsolicitud',compact('solicitud'))->setPaper('a4');

        return $pdf->stream('Reporte.pdf');
	}

	//valida que este autenticado para acceder al controlador
	public function __construct()
    {
        $this->middleware('auth');
	}


}