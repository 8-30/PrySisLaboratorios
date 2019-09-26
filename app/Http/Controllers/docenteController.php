<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\docente;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class docenteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$docentes = DOCENTE::paginate(10);
		return view('docente.index', compact('docentes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('docente.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		Docente::create([
			'DOC_CEDULA' => $request['DOC_CEDULA'], 
			'DOC_MIESPE' => $request['DOC_MIESPE'],
			'DOC_NOMBRES' => $request['DOC_NOMBRES'],
			'DOC_APELLIDOS' => $request['DOC_APELLIDOS'],
			'DOC_CORREO' => $request['DOC_CORREO'],
			'DOC_CLAVE' => $request['DOC_CLAVE'],
			'DOC_TITULO' => $request['DOC_TITULO'],
			
		]);

		$docente = Docente::All();
		return redirect('docente')->with('title', 'Docente registrado!')->with('subtitle', 'El registro del docente se ha realizado con éxito.');
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
	public function edit($id)
	{
		//
		$docente= Docente::find($id);
		return view('docente.update', ['docente' => $docente]);
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
		$docente = Docente::find($request['DOC_CODIGO']);
		$docente->fill($request->all());
		$docente->save();
		return redirect('docente')->with('title', 'Docente actualizado!')->with('subtitle', 'La actualización del docente se ha realizado con éxito.');
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
		$docente = Docente::destroy($id);
		return redirect('docente')->with('title', 'Docente ELIMINADO!')->with('subtitle', 'El registro del docente se ha borrado con éxito.');
	}

}
