<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	/*Verifica que puedan acceder al controlador solo los usuarios no logeados*/
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	//Redirige al index
	public function index() {
		return view('welcome');
	}

	public function getRegister() {
		$role= Role::all();
		return view('auth.register',[
			'role' => $role
		]);
	}

	//Registrar Usuario
	public function postRegister(Request $request) {
		//Valida los campos de registrar
		$validator = $this->registrar->validator($request->all());
		// si existe errores retorna a la vista Registrar con los errores
		if ($validator->fails()) {
			$this->throwValidationException($request, $validator);
		}
		//Crea el registro y autentifica
		$this->auth->login($this->registrar->create($request->all()));
		
		//Redirecciona a la pagina principal
		return redirect($this->redirectPath());
	}

	public function postLogin(Request $request) {
		//valida los campos name y password como requeridos
		$this->validate($request, [
			'name' => 'required', 'password' => 'required',
		]);

		//asigna el name y password como credenciales
		$credentials = $request->only('name', 'password');

		//logea el usuario, si logea correctamente redirecciona al index
		if ($this->auth->attempt($credentials, $request->has('remember'))) {
			return redirect()->intended($this->redirectPath());
		}
		
		//si no logea correctamente muestra en pantalla el error
		return redirect($this->loginPath())
					->withInput($request->only('name', 'remember'))
					->withErrors([
						'name' => $this->getFailedLoginMessage(),
					]);
	}
}
