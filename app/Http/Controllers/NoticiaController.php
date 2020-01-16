<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Noticia;
use App\Periodo;
use App\Empresa;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;
use Image;
use Carbon\Carbon; 

class NoticiaController extends Controller {

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
		$noticias = Noticia::where('EMP_CODIGO',$empid)->get();
		$empresa  = Empresa::find($empid);
		return view('noticia.index', compact('noticias'),compact('empresa'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$date = Carbon::now();
		$periodos=Periodo::All()->reverse();
		$periodo=Periodo::where('PER_ESTADO','1')->first();
		$empid= $request->user()->empresa->EMP_CODIGO;
		$empresa  = Empresa::find($empid);
		$empresas  = Empresa::All();
		return view('noticia.create', [
			"periodo" => $periodo,
			"periodos" => $periodos
		], [
			"empresas" => $empresas,
			"empresa" => $empresa
		])->with('date',$date);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		Noticia::create([
			'EMP_CODIGO' => $request['EMP_CODIGO'], 
			'PER_CODIGO' => $request['PER_CODIGO'], 
			'NOT_NOMBRE' => $request['NOT_NOMBRE'], 
			'NOT_TITULO' => $request['NOT_TITULO'], 
			'NOT_DESCRIPCION' => $request['NOT_DESCRIPCION'],
			'NOT_FECHA_INICIO' => $request['NOT_FECHA_INICIO'],
			'NOT_IMAGEN' => $request['IMAGE_TEXT'],
			'NOT_FECHA_FIN' => $request['NOT_FECHA_FIN']
		]);
		
		return redirect('noticia')
			->with('title','Noticia Registrada!')
			->with('subtitle','Se ha añadido correctamente la noticia.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request,$id)
	{
		$noticia =	Noticia::find($id);
		$empid= $request->user()->empresa->EMP_CODIGO;
		$periodos=Periodo::All()->reverse();
		$periodo=Periodo::where('PER_ESTADO','1')->first();
		$empresa  = Empresa::find($empid);
		$empresas  = Empresa::All();
		return view("noticia.update", ["noticia"=>$noticia,"periodos"=>$periodos],["empresas"=>$empresas,"empresa"=>$empresa])->with('periodo',$periodo);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		$noticia = Noticia::find( $request['NOT_CODIGO']);
		//
		$noticia->fill(
			[
			'EMP_CODIGO' => $request['EMP_CODIGO'], 
			'PER_CODIGO' => $request['PER_CODIGO'], 
			'NOT_NOMBRE' => $request['NOT_NOMBRE'], 
			'NOT_TITULO' => $request['NOT_TITULO'], 
			'NOT_DESCRIPCION' => $request['NOT_DESCRIPCION'],
			'NOT_FECHA_INICIO' => $request['NOT_FECHA_INICIO'],
			'NOT_IMAGEN' => $request['IMAGE_TEXT'],
			'NOT_FECHA_FIN' => $request['NOT_FECHA_FIN']
			]
		);
		$noticia->save();
		return redirect('noticia')
			->with('title','Noticia actualizada!')
			->with('subtitle','Se ha actualizado correctamente el contenido de la noticia.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Noticia::destroy($id);
		return redirect('noticia')
			->with('title','Noticia eliminada!')
			->with('subtitle','Se ha eliminado correctamente la noticia.');
	}

}
