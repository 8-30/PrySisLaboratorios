<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EventoOcacional;
use App\laboratorio;
use App\materia;
use App\docente;
use App\Quotation;
use App\Control;
use DB;

use Carbon\Carbon; 

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class EventoOcacionalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$date = Carbon::now();
		$date = $date->format('Y-m-d');
		//$control = Control::where('CON_DIA', $date)->get();
		$data = Control::where('CON_DIA', $date)->get();
		return view('ocasionales.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$laboratorios=DB::select('select LAB_NOMBRE,LAB_CODIGO from laboratorio ORDER BY LAB_NOMBRE ASC;');
		$materias=DB::table('materia')
        ->join('periodo', function($join)
        {
			$join->on('materia.PER_CODIGO', '=', 'periodo.PER_CODIGO')
				 ->where('periodo.PER_ESTADO', '=', 1);	 
		})
		->orderBy('MAT_NOMBRE', 'asc')
        ->get();
		//$docentes=DB::select('select docente.DOC_CODIGO as DOC_CODIGO, concat(docente.DOC_TITULO," ",docente.DOC_NOMBRES," ",docente.DOC_APELLIDOS) AS DOC_NOMBRE from docente ORDER BY DOC_NOMBRE ASC;');
		return view('ocasionales.create')->with('laboratorios', $laboratorios)->with('materias', $materias);
	}

	public function getDocente(Request $request, $id){
		if($request->ajax()){
			$docente=DB::table('materia')
				->join('docente', 'materia.DOC_CODIGO','=','docente.DOC_CODIGO')
				->select('docente.DOC_CODIGO','docente.DOC_NOMBRES','docente.DOC_APELLIDOS')
				->where('materia.MAT_CODIGO',$id)
				->get();
			//$docentes = Docente::where('DOC_CODIGO', $id)->get();
			//$docentes = Docente::docentes($id);
			//$docentes = DB::select('SELECT * FROM docente where DOC_CODIGO = '+$id);
			return Response()->json($docente);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * 
	 * @return Response
	 */
	public function store(Request $request)
	{
		EventoOcacional::create([
			'CON_DIA' => $request['CON_DIA'],
			//'CON_EXTRA' => $request[NULL],
			'CON_HORA_ENTRADA' => $request['CON_HORA_ENTRADA'],
			'CON_HORA_SALIDA' => $request['CON_HORA_SALIDA'],
			//'CON_LAB_ABRE' => $request[NULL],
			//'CON_HORA_ENTRADA_R' => $request[NULL],
			//'CON_REG_FIRMA_ENTRADA' => $request[NULL],
			//'CON_HORA_SALIDA_R' => $request[NULL],
			//'CON_REG_FIRMA_SALIDA' => $request[NULL],
			//'CON_LAB_CIERRE' => $request[NULL],
			//'CON_OBSERVACIONES' => $request[NULL],
			'CON_NUMERO_HORAS' => $request['CON_NUMERO_HORAS'],
			'CON_NOTA' => $request['CON_NOTA'],
			//'CON_EXTRA' => $request[NULL],
			//'CON_GUIA' => $request[NULL],
			//'GUI_CODIGO' => $request[NULL],
			'LAB_CODIGO' => $request['LAB_CODIGO'],
			'MAT_CODIGO' => $request['MAT_CODIGO'],
			'DOC_CODIGO' => $request['DOC_CODIGO'],
		]);
		
		return redirect('control')
			->with('title', 'Evento Ocacional registrado!')
			->with('subtitle', 'El registro del evento ocacional se ha realizado con éxito.');
	}

	//valida que este autenticado para acceder al controlador
	public function __construct()
    {
        $this->middleware('auth');
    }


}
