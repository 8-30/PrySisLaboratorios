<?php namespace App\Http\Controllers;

use App\control;
use App\docente;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\laboratorio;
use App\materia;
use Illuminate\Http\Request;
use DB;
use App\Quotation;

class controlController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fecha_actual = getdate()["year"]."-".getdate()["mon"]."-".getdate()["mday"];
		return $this->show($fecha_actual);
	}

	public function show($fecha)
	{
		$controles = DB::select('select materia.MAT_NOMBRE,Count(*) as REGISTROS,control.CON_DIA from materia,control where materia.MAT_CODIGO=control.MAT_CODIGO and control.CON_DIA="'.$fecha.'" group by materia.MAT_NOMBRE;' );
		$controles["fecha"]=$fecha;
		return view("control.index", compact('controles'));
	}
	public function fecha(Request $request)
	{
		
		return $this->show($request['CON_DIA']);
	}
	/**
	 * Show the form for creating a new resource.
	 * Lo Siento
	 * @return Response
	 */
	public function create()
	{
		//
		$laboratorios=laboratorio::all();
		$materias=materia::all();
		$docentes=docente::all();
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
		control::create([
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
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$control =	control::find($id);
		$laboratorios=laboratorio::all();
		$materias=materia::all();
		$docentes=docente::all();
		//return view("control.edit", ["control"=>$control,"laboratorios"=>$laboratorios,"materias"=>$materias,"docentes"=>$docentes]);
		return view('control.edit')->with('control', $control)->with('laboratorios', $laboratorios)->with('materias', $materias)->with('docentes', $docentes);
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
		$control =	control::find( $request['CON_CODIGO']);
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
		$control =	control::find($id);
		$control->delete();
		return redirect('control');
	}

}
