<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Hora;
use App\Empresa;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class HoraController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$idempresa = $request->user()->empresa->EMP_CODIGO;
		$horas=Hora::where('EMP_CODIGO',$idempresa)->get();

		//return view("hora.index", ["horas"=>$hora]);
		return view('hora.index', compact('horas','idempresa'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$empresas=empresa::all();
		return view('hora.create',["empresas"=>$empresas]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$HORA_INICIO = $request['HORA_INICIO'];
		$HORA_FIN = $request['HORA_FIN'];
		Hora::create([
			'EMP_CODIGO' => $request['EMP_CODIGO'],
			'HORA_NOMBRE' => $HORA_INICIO.'-'.$HORA_FIN,
		]);

		return redirect('hora')
			->with('title','Hora creada!')
			->with('subtitle','Se ha creado correctamente la hora.');
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
	
		return redirect('hora');
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
		$hora =	Hora::find($id);
		list($HORA_INICIO, $HORA_FIN) = explode("-", $hora->HORA_NOMBRE);
		$empresas=empresa::all();
		return view("hora.update", ["hora"=>$hora,"HORA_INICIO"=>$HORA_INICIO,"HORA_FIN"=>$HORA_FIN,"empresas"=>$empresas]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		$hora =	Hora::find( $request['HORA_CODIGO']);
		$HORA_INICIO = $request['HORA_INICIO'];
		$HORA_FIN = $request['HORA_FIN'];
		$hora->fill(['EMP_CODIGO' => $request['EMP_CODIGO'],'HORA_NOMBRE' => $HORA_INICIO.'-'.$HORA_FIN]);
		$hora->save();
		return redirect('hora')
			->with('title','Hora actualizada!')
			->with('subtitle','Se han actualizado correctamente los datos de la hora.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Hora::destroy($id);
		return redirect('hora')
			->with('title','Hora eliminada!')
			->with('subtitle','Se ha eliminado correctamente la hora.');
	}

	//valida que este autenticado para acceder al controlador
	public function __construct()
    {
        $this->middleware('auth');
    }


}
