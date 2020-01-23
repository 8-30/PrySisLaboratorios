<?php namespace App\Http\Controllers;

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
use App\MaterialLaboratorio;

use Illuminate\Http\Request;

class MaterialesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$idempresa = $request->user()->empresa->EMP_CODIGO;
	    //$periodo=Periodo::periodoActivoEmpresa($idempresa)->first();


		$materiales = MaterialLaboratorio::where('EMP_CODIGO',$idempresa)->get();
         


		return view('materialeslaboratorio.index', compact('materiales'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create( Request $request)
	{
		$idempresa = $request->user()->empresa->EMP_CODIGO;
		$periodos=Periodo::periodoActivoEmpresa($idempresa)->first();
		$empresas = Empresa::find($idempresa);
		$laboratorios=Laboratorio::where('EMP_CODIGO',$idempresa)->get()->sortby('LAB_NOMBRE');
		return view('materialeslaboratorio.create', compact('empresas','periodos','laboratorios'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
			MaterialLaboratorio::create([
			'EMP_CODIGO' => 		$request['EMP_CODIGO'],
			'PER_CODIGO' =>			$request['PER_CODIGO'],
			'MATLAB_CANTIDAD' =>	$request['MATLAB_CANTIDAD'],
			'MATLAB_DETALLE' =>			$request['MATLAB_DETALLE'], 
			'MATLAB_OBSERVACION' =>			$request['MATLAB_OBSERVACION'], 
			'LAB_CODIGO' =>			$request['LAB_CODIGO'],
		]);

		return redirect('materiales/laboratorio')
			->with('title', 'Material registrado!')
			->with('subtitle', 'El registro del Material realizado con éxito.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, Request $request)
	{
		$idempresa = $request->user()->empresa->EMP_CODIGO;
		$periodos=Periodo::filtroEmpresa($idempresa)->get();
		$empresas = Empresa::find($idempresa);
		$material=MaterialLaboratorio::find($id);
		$laboratorios=Laboratorio::where('EMP_CODIGO',$idempresa)->get()->sortby('LAB_NOMBRE');
		return view('materialeslaboratorio.update', compact('empresas','periodos','material','laboratorios'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$material = MaterialLaboratorio::find($request['MATLAB_CODIGO']);
		$material->fill($request->all());
		$material->save();
        
		return redirect('materiales/laboratorio')
			->with('title', 'Material actualizado!')
			->with('subtitle', 'La actualización del material se ha realizado con éxito.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		MaterialLaboratorio::destroy($id);
		return redirect('materiales/laboratorio')
			->with('title', 'Material eliminado!')
			->with('subtitle', 'La eliminación del material se ha realizado con éxito.');
	}

}
