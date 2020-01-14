<?php namespace App\Http\Controllers;
/* 
 * Sistema de Gestion de Laboratorios - ESPE
 *
 * Author: Barrera Erick - LLamuca Andrea
 * Revisado por: 
 *
*/
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Periodo;
use App\Materia;
use App\Horario;
use App\Guia;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PeriodoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$empresa = $request->user()->empresa->EMP_CODIGO;
		$periodos = Periodo::filtroEmpresa($empresa)->get();
		return view('periodo.index', compact('periodos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('periodo.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$estado = 0;
		$empresa = $request->user()->empresa->EMP_CODIGO;
		if ($request['PER_ESTADO'] === 'on') {
			$estado = 1;
		}
		
		
		Periodo::create([
			'PER_NOMBRE' => 		$request['PER_NOMBRE'], 
			'PER_ESTADO' => 		$estado,
			'PER_HORAS_ATENCION' => $request['PER_HORAS_ATENCION'],
			'PER_FECHA_INICIO' => 	$request['PER_FECHA_INICIO'],
			'PER_FECHA_FIN' => 		$request['PER_FECHA_FIN'],
			'EMP_CODIGO' => 		$empresa
			]);
			
		return redirect('periodo')
			->with('title', 'Periodo registrado!')
			->with('subtitle', 'El registro del periodo acádemico se ha realizado con éxito.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$periodo = Periodo::find($id);
		return view('periodo.update', ['periodo' => $periodo]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		if ($request['PER_ESTADO'] === 'on') {
			$request['PER_ESTADO'] = 1;
		} else {
			$request['PER_ESTADO'] = 0;
		}
		$periodo = Periodo::find($request['PER_CODIGO']);
		$periodo->fill($request->all());
		$periodo->save();
		return redirect('periodo')
			->with('title', 'Periodo actualizado!')
			->with('subtitle', 'La actualización del periodo acádemico se ha realizado con éxito.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$validaGuia=Guia::where('PER_CODIGO',$id)->first();
        $validaMateria=Materia::where('PER_CODIGO',$id)->first();
        $validaHorario=Horario::where('PER_CODIGO',$id)->first();
        if(empty($validaGuia) && empty($validaMateria) && empty($validaHorario))
		{
			Periodo::destroy($id);
			return redirect('periodo')
				->with('title', 'Periodo eliminado!')
				->with('subtitle', 'La eliminación del periodo acádemico se ha realizado con éxito.');
		}else{
			return redirect('periodo')
				->with('title', 'Periodo NO eliminado!')
				->with('subtitle', 'El registro del periodo no se a eliminado correctamente, el periodo tiene registros relacionados.');
		}
	}

	//valida que este autenticado para acceder al controlador
	public function __construct()
    {
        $this->middleware('auth');
    }

}
