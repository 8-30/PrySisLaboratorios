<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\empresa;
class empresaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		//return 'this is empresa index';
		$empresa=empresa::all();
		//$this->set('empresas', $empresa);
		//return View::make('empresa.index')->with('empresas', $empresa);
		return view("empresa.index", ["empresas"=>$empresa]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('empresa.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	
		empresa::create([
            'EMP_NOMBRE' => $request['EMP_NOMBRE'],
            'EMP_FIRMA_DEE' => $request['EMP_FIRMA_DEE'],
            'EMP_PIE_DEE' => $request['EMP_PIE_DEE'],
			'EMP_FIRMA_JEFE' => $request['EMP_FIRMA_JEFE'],
			'EMP_PIE_JEFE' => $request['EMP_PIE_JEFE'],
			'EMP_FIRMA_LAB' => $request['EMP_FIRMA_LAB'],
			'EMP_PIE_LAB' => $request['EMP_PIE_LAB'],
			'EMP_ESTADO' => $request['EMP_ESTADO'],
			'EMP_RELACION_SUFICIENCIA' => $request['EMP_RELACION_SUFICIENCIA'],
		]);
		return redirect('empresa');;
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
	public function search(Request $request)
	{
	
		return redirect('empresa');
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
		$empresa =	empresa::find($id);
		return view("empresa.edit", ["empresa"=>$empresa]);
		
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
		$empresa =	empresa::find( $request['EMP_CODIGO']);
		$empresa->EMP_NOMBRE = $request['EMP_NOMBRE'];
		$empresa->EMP_FIRMA_DEE = $request['EMP_FIRMA_DEE'];
		$empresa->EMP_PIE_DEE = $request['EMP_PIE_DEE'];
		$empresa->EMP_FIRMA_JEFE = $request['EMP_FIRMA_JEFE'];
		$empresa->EMP_FIRMA_LAB = $request['EMP_FIRMA_LAB'];
		$empresa->EMP_PIE_LAB = $request['EMP_PIE_LAB'];
		$empresa->EMP_ESTADO = $request['EMP_ESTADO'];
		$empresa->EMP_RELACION_SUFICIENCIA = $request['EMP_RELACION_SUFICIENCIA'];
		$empresa->save();
		return redirect('empresa');
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
		$empresa =	empresa::find($id);
		$empresa->delete();
		return redirect('empresa');
	}

}
