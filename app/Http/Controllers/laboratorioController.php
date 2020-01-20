<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\laboratorio;
use App\Campus;
use App\empresa;
use App\control;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LaboratorioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$laboratorios = laboratorio::All();
		return view('laboratorio.index', compact('laboratorios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$campus=Campus::All();
		$empresas=empresa::All();
		return view('laboratorio.create',["campus"=>$campus],["empresas"=>$empresas]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$estado = 0;
		if ($request['LAB_ESTADO'] === 'on') {
			$estado = 1;
		}
	laboratorio::create([
			'LAB_NOMBRE' => $request['LAB_NOMBRE'], 
			'LAB_CAPACIDAD' => $request['LAB_CAPACIDAD'], 
			'CAM_CODIGO' => $request['CAM_CODIGO'], 
			'EMP_CODIGO' => $request['EMP_CODIGO'],
			'LAB_ABREVIATURA' => $request['LAB_ABREVIATURA'], 
			'LAB_ESTADO' => $estado
		]);

		return redirect('laboratorio')
			->with('alert', 'alert-success')
			->with('title','Laboratorio creado!')
			->with('subtitle','Se ha creado correctamente el laboratorio.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$laboratorios =	laboratorio::find($id);
		$campus=Campus::All();
		$empresas=empresa::All();
		return view("laboratorio.update", ["laboratorio"=>$laboratorios,"campus"=>$campus,"empresas"=>$empresas]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		if ($request['LAB_ESTADO'] === 'on') {
			$request['LAB_ESTADO'] = 1;
		} else {
			$request['LAB_ESTADO'] = 0;
		}
		$laboratorios =	laboratorio::find( $request['LAB_CODIGO']);
		$laboratorios->fill($request->all());
		$laboratorios->save();
		return redirect('laboratorio')
			->with('alert', 'alert-success')
			->with('title','Laboratorio actualizado!')
			->with('subtitle','Se han actualizado correctamente los datos del laboratorio.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$validaControl = control::where('LAB_CODIGO',$id)->first();
		
		if (count($validaControl) === 1) {
			return redirect('laboratorio')
				->with('alert', 'alert-danger')
				->with('title','Laboratorio no eliminado!')
				->with('subtitle','El registro del laboratorio no se ha eliminado, el laboratorio tiene registros relacionados.');
		}else{
			laboratorio::destroy($id);
			return redirect('laboratorio')
				->with('alert', 'alert-success')
				->with('title','Laboratorio eliminado!')
				->with('subtitle','Se ha eliminado correctamente el laboratorio.');
		}
	}

	//valida que este autenticado para acceder al controlador
	public function __construct()
    {
        $this->middleware('auth');
    }


}
