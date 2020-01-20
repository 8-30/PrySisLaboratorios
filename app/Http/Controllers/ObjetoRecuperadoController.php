<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ObjetoRecuperado;
use App\Periodo;
use App\empresa;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;
use Image;

class ObjetoRecuperadoController extends Controller {

	//valida que este autenticado para acceder al controlador
	public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$empid= $request->user()->empresa->EMP_CODIGO;
		$objeto = ObjetoRecuperado::where('EMP_CODIGO',$empid)->get();
		$empresa  = Empresa::find($empid);
		return view('objetorecuperado.index', compact('objeto'),compact('empresa'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$periodos=Periodo::All()->reverse();
		$periodo=Periodo::where('PER_ESTADO','1')->first();
		$empid= $request->user()->empresa->EMP_CODIGO;
		$empresa  = Empresa::find($empid);
		$empresas  = Empresa::All();
		return view('objetorecuperado.create',["periodo"=>$periodo,"periodos"=>$periodos],["empresas"=>$empresas,"empresa"=>$empresa]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$file = Input::file('image');

		ObjetoRecuperado::create([
			'EMP_CODIGO' => $request['EMP_CODIGO'], 
			'PER_CODIGO' => $request['PER_CODIGO'], 
			'OBR_NOMBRE' => $request['OBR_NOMBRE'], 
			'OBR_DESCRIPCION' => $request['OBR_DESCRIPCION'],
			'OBR_FECHA_RECEPCION' => $request['OBR_FECHA_RECEPCION'],
			'OBR_IMAGEN' => $request['IMAGE_TEXT'],
			'OBR_OBSERVACION' => $request['OBR_OBSERVACION'],
			'OBR_FECHA_ENTREGA' => $request['OBR_FECHA_ENTREGA']
		]);
		return redirect('objeto')
			->with('title','Objeto Registrado!')
			->with('subtitle','Se ha añadido correctamente el objeto recuperado.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request,$id)
	{
		$ObjetoRecuperado =	ObjetoRecuperado::find($id);
		$empid= $request->user()->empresa->EMP_CODIGO;
		$periodos=Periodo::All()->reverse();
		$periodo=Periodo::where('PER_ESTADO','1')->first();
		$empresa  = Empresa::find($empid);
		$empresas  = Empresa::All();
		return view("objetorecuperado.update", ["objeto"=>$ObjetoRecuperado,"periodos"=>$periodos],["empresas"=>$empresas,"empresa"=>$empresa])->with('periodo',$periodo);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		
		$ObjetoRecuperado =	ObjetoRecuperado::find( $request['OBR_CODIGO']);
		$ObjetoRecuperado->fill(
			['EMP_CODIGO' => $request['EMP_CODIGO'], 
			'PER_CODIGO' => $request['PER_CODIGO'], 
			'OBR_NOMBRE' => $request['OBR_NOMBRE'], 
			'OBR_DESCRIPCION' => $request['OBR_DESCRIPCION'],
			'OBR_FECHA_RECEPCION' => $request['OBR_FECHA_RECEPCION'],
			'OBR_IMAGEN' => $request['IMAGE_TEXT'],
			'OBR_OBSERVACION' => $request['OBR_OBSERVACION'],
			'OBR_FECHA_ENTREGA' => $request['OBR_FECHA_ENTREGA']]
		);
		$ObjetoRecuperado->save();
		return redirect('objeto')
			->with('title','Objeto actualizado!')
			->with('subtitle','Se han actualizado correctamente los datos del objeto recuperado.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ObjetoRecuperado::destroy($id);
		return redirect('objeto')
			->with('title','Objeto eliminado!')
			->with('subtitle','Se ha eliminado correctamente el objeto recuperado.');
	}

}
