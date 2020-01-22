<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\empresa;
use App\Institucion;

use Illuminate\Http\Request;


class EmpresaController extends Controller {

	/**
	 * Despliega la vista principal del módulo empresa
	 *
	 * @return Response
	 * @return view "empresa.index" & $empresas
	 */
	public function index(Request $request)
	{
		$idempresa = $request->user()->empresa->EMP_CODIGO;
		$empresas = empresa::where('EMP_CODIGO',$idempresa)->get();

		//return view("empresa.index", ["empresas" => $empresa]);
		return view('empresa.index', compact('empresas','idempresa'));
	}

	/**
	 * Despliega el formulario para crear una nueva empresa
	 *
	 * @return Response
	 */
	public function create()
	{
		$instituciones = Institucion::all();
		return view('empresa.create', ["instituciones" => $instituciones]);
	}

	/**
	 * Guarda una empresa en la base de datos.
	 * El método recibe un objeto $request con los valores enviados del formulario.
	 * Guarda los datos con el método create.
	 * Redirecciona a la view "empresa"
	 *
	 * @param  Request  $request
	 * @return redirect view "empresa" & title & subtitle
	 */
	public function store(Request $request)
	{
		$estado = 0;
		if ($request['EMP_ESTADO'] === 'on') {
			$estado = 1;
		}

		Empresa::create([
            'EMP_NOMBRE' => 				$request['EMP_NOMBRE'],
            'EMP_FIRMA_DEE' => 				$request['EMP_FIRMA_DEE'],
            'EMP_PIE_DEE' => 				$request['EMP_PIE_DEE'],
			'EMP_FIRMA_JEFE' => 			$request['EMP_FIRMA_JEFE'],
			'EMP_PIE_JEFE' => 				$request['EMP_PIE_JEFE'],
			'EMP_FIRMA_LAB' => 				$request['EMP_FIRMA_LAB'],
			'EMP_PIE_LAB' => 				$request['EMP_PIE_LAB'],
			'EMP_ESTADO' => 				$estado,
			'EMP_RELACION_SUFICIENCIA' => 	$request['EMP_RELACION_SUFICIENCIA'],
			'EMP_IMAGEN_ENCABEZADO' => 		$request['IMAGE_TEXT'],
			'EMP_IMAGEN_ENCABEZADO2' => 	$request['EMP_IMAGEN_ENCABEZADO2'],
			'EMP_AUX1' => 					$request['EMP_AUX1'],
			'EMP_AUX2' => 					$request['EMP_AUX2'],
			'INS_CODIGO' => 				$request['INS_CODIGO'],
		]);

		return redirect('empresa');
	}

	/**
	 * Despliega el formulario para editar Empresa	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$empresa =	Empresa::find($id);
		$instituciones = Institucion::all();
		
		return view("empresa.edit", [
			"empresa" => $empresa,
			"instituciones" => $instituciones
		]);
	}

	/**
	 * Edita una empresa en la base de datos.
	 * El método recibe un objeto $request con los valores enviados del formulario.
	 * Guarda los datos con el método update.
	 * Redirecciona a la view "empresa"
	 *
	 * @param  Request  $request
	 * @return redirect view "empresa" & title & subtitle
	 */
	public function update(Request $request)
	{
		if ($request['EMP_ESTADO'] === 'on') {
			$request['EMP_ESTADO'] = 1;
		} else {
			$request['EMP_ESTADO']= 0;
		}
		$empresa =	empresa::find( $request['EMP_CODIGO']);
		$empresa->fill([
            'EMP_NOMBRE' => 				$request['EMP_NOMBRE'],
            'EMP_FIRMA_DEE' => 				$request['EMP_FIRMA_DEE'],
            'EMP_PIE_DEE' => 				$request['EMP_PIE_DEE'],
			'EMP_FIRMA_JEFE' => 			$request['EMP_FIRMA_JEFE'],
			'EMP_PIE_JEFE' => 				$request['EMP_PIE_JEFE'],
			'EMP_FIRMA_LAB' => 				$request['EMP_FIRMA_LAB'],
			'EMP_PIE_LAB' => 				$request['EMP_PIE_LAB'],
			'EMP_ESTADO' => 				$request['EMP_ESTADO'],
			'EMP_RELACION_SUFICIENCIA' => 	$request['EMP_RELACION_SUFICIENCIA'],
			'EMP_IMAGEN_ENCABEZADO' => 		$request['IMAGE_TEXT'],
			'EMP_IMAGEN_ENCABEZADO2' => 	$request['EMP_IMAGEN_ENCABEZADO2'],
			'EMP_AUX1' => 					$request['EMP_AUX1'],
			'EMP_AUX2' => 					$request['EMP_AUX2'],
			'INS_CODIGO' => 				$request['INS_CODIGO'],
		]);
		$empresa->save();
		return redirect('empresa');
	}

	/**
	 * Eliminar una Empresa  de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Empresa::destroy($id);
		return redirect('empresa');
	}
	
	//valida que este autenticado para acceder al controlador
	public function __construct()
    {
        $this->middleware('auth');
    }

}
