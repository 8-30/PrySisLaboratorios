<?php namespace App\Http\Controllers;
use App\ObjetoRecuperado;
use App\Noticia;
use App\Empresa;
use App\Periodo;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class LoginController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
    {
        $this->middleware('auth');
    }
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$objetos = DB::table('objeto_recuperado')
					->where('OBR_FECHA_ENTREGA', '=', '0000-00-00')
                    ->get();
		$date = Carbon::now();
		$noticias = DB::table('noticia')
					->where("NOT_FECHA_INICIO","<=",$date)
					->where("NOT_FECHA_FIN",">=",$date)
                    ->get();
		return view('welcome',['objetos' => $objetos, 'noticias'=>$noticias]);
	}
	public function noticiadetail($id)
	{
		$noticia =	Noticia::find($id);
		$empresas = Empresa::All();
		$periodos = Periodo::All();
		return view('homeview.noticiadetail',['empresas' => $empresas, 'noticia'=>$noticia,'periodos'=>$periodos]);
	}
	public function objetodetail($id)
	{
		$objeto =	ObjetoRecuperado::find($id);
		$empresas = Empresa::All();
		$periodos = Periodo::All();
		return view('homeview.objetodetail',['empresas' => $empresas, 'objeto'=>$objeto,'periodos'=>$periodos]);
	}

}
