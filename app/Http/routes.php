<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'WelcomeController@index');
Route::get('/noticiadetail/{id}', 'WelcomeController@noticiadetail');
Route::get('/objetodetail/{id}', 'WelcomeController@objetodetail');
Route::get('guias_y_solicitudes/login', 'GuiaController@login');
Route::get('guias_y_solicitudes/logout', 'GuiaController@logout');
Route::post('guias_y_solicitudes', 'GuiaController@index');

///////////////////////////////////////////////////////////////////
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
///////////////////////////////////////////////////////////////////
//Route::get('campus/{id}', [
//    'uses' => 'ControlController@searchCampus',
//    'as' => 'control.search.campus'
//]);
///////////////////////////////////////////////////////////////////
Route::get('campus', 'CampusController@index');
Route::get('campus/create', 'CampusController@create');
Route::get('campus/{id}/edit', 'CampusController@edit');
Route::get('campus/{id}/destroy', 'CampusController@destroy');
Route::post('campus/store', 'CampusController@store');
Route::post('campus/update', 'CampusController@update');
///////////////////////////////////////////////////////////////////
Route::get('carrera', 'CarreraController@index');
Route::get('carrera/create', 'CarreraController@create');
Route::get('carrera/{id}/edit', 'CarreraController@edit');
Route::get('carrera/{id}/destroy', 'CarreraController@destroy');
Route::post('carrera/store', 'CarreraController@store');
Route::post('carrera/update', 'CarreraController@update');
///////////////////////////////////////////////////////////////////
Route::get('control','ControlController@index');
Route::post('control','ControlController@index');
Route::get('control/consola', 'ControlController@consola');
Route::get('control/create','ControlController@create');
Route::get('control/{id}/edit','ControlController@edit');
Route::get('control/{id}/destroy','ControlController@destroy');
Route::post('control/store', 'ControlController@store');
Route::post('control/update', 'ControlController@update');
Route::post('control/generar', 'ControlController@generar');
Route::post('control/updateD', 'ControlController@updateD');
Route::post('control/updateL', 'ControlController@updateL');
Route::post('control/filtroCampus', 'ControlController@filtroCampus');
Route::post('control/updatePorGuia', 'ControlController@updatePorGuia');
Route::post('control/nota', 'ControlController@nota');
Route::post('control/updateNonta', 'ControlController@updateNonta');
Route::post('control/updatePorSolicitud', 'ControlController@updatePorSolicitud');
///////////////////////////////////////////////////////////////////
Route::get('docente', 'DocenteController@index');
Route::get('docente/create', 'DocenteController@create');
Route::get('docente/{id}/edit', 'DocenteController@edit');
Route::get('docente/{id}/destroy', 'DocenteController@destroy');
Route::post('docente/store', 'DocenteController@store');
Route::post('docente/update', 'DocenteController@update');
///////////////////////////////////////////////////////////////////
Route::get('empresa','EmpresaController@index');
Route::get('empresa/create','EmpresaController@create');
Route::get('empresa/{id}/edit','EmpresaController@edit');
Route::get('empresa/{id}/destroy','EmpresaController@destroy');
Route::post('empresa/store', 'EmpresaController@store');
Route::post('empresa/update', 'EmpresaController@update');
///////////////////////////////////////////////////////////////////
Route::get('hora', 'HoraController@index');
Route::get('hora/create', 'HoraController@create');
Route::get('hora/{id}/edit', 'HoraController@edit');
Route::post('hora/store', 'HoraController@store');
Route::post('hora/update', 'HoraController@update');
Route::post('hora/{id}/destroy', 'HoraController@destroy');
///////////////////////////////////////////////////////////////////
Route::get('horario', 'HorarioController@index');
Route::get('horario/{labId}/{perId}/create', 'HorarioController@create');
Route::get('horario/{labId}/{perId}/edit', 'HorarioController@edit');
Route::get('horario/{id}/destroy', 'HorarioController@destroy');
Route::post('horario/store', 'HorarioController@store');
Route::post('horario/update', 'HorarioController@update');
///////////////////////////////////////////////////////////////////
Route::get('institucion','InstitucionController@index');
Route::get('institucion/create','InstitucionController@create');
Route::get('institucion/{id}/edit','InstitucionController@edit');
Route::get('institucion/{id}/destroy','InstitucionController@destroy');
Route::post('institucion/store', 'InstitucionController@store');
Route::post('institucion/update', 'InstitucionController@update');
///////////////////////////////////////////////////////////////////
Route::get('laboratorio', 'LaboratorioController@index');
Route::get('laboratorio/create', 'LaboratorioController@create');
Route::get('laboratorio/{id}/edit', 'LaboratorioController@edit');
Route::get('laboratorio/{id}/destroy', 'LaboratorioController@destroy');
Route::post('laboratorio/store', 'LaboratorioController@store');
Route::post('laboratorio/update', 'LaboratorioController@update');
///////////////////////////////////////////////////////////////////
Route::get('objeto', 'ObjetoRecuperadoController@index');
Route::get('objeto/create', 'ObjetoRecuperadoController@create');
Route::get('objeto/{id}/edit', 'ObjetoRecuperadoController@edit');
Route::get('objeto/{id}/destroy', 'ObjetoRecuperadoController@destroy');
Route::post('objeto/store', 'ObjetoRecuperadoController@store');
Route::post('objeto/update', 'ObjetoRecuperadoController@update');
///////////////////////////////////////////////////////////////////
Route::get('noticia', 'NoticiaController@index');
Route::get('noticia/create', 'NoticiaController@create');
Route::get('noticia/{id}/edit', 'NoticiaController@edit');
Route::get('noticia/{id}/destroy', 'NoticiaController@destroy');
Route::post('noticia/store', 'NoticiaController@store');
Route::post('noticia/update', 'NoticiaController@update');
///////////////////////////////////////////////////////////////////
Route::get('materia', 'MateriaController@index');
Route::get('materia/create', 'MateriaController@create');
Route::get('materia/{id}/edit', 'MateriaController@edit');
Route::get('materia/{id}/destroy', 'MateriaController@destroy');
Route::post('materia/store', 'MateriaController@store');
Route::post('materia/update', 'MateriaController@update');
///////////////////////////////////////////////////////////////////
Route::get('parametro', 'ParametroController@index');
Route::get('parametro/create', 'ParametroController@create');
Route::get('parametro/{id}/edit', 'ParametroController@edit');
Route::get('parametro/{id}/destroy', 'ParametroController@destroy');
Route::post('parametro/store', 'ParametroController@store');
Route::post('parametro/update', 'ParametroController@update');
///////////////////////////////////////////////////////////////////
Route::get('periodo', 'PeriodoController@index');
Route::get('periodo/create', 'PeriodoController@create');
Route::get('periodo/{id}/edit', 'PeriodoController@edit');
Route::get('periodo/{id}/destroy', 'PeriodoController@destroy');
Route::post('periodo/store', 'PeriodoController@store');
Route::post('periodo/update', 'PeriodoController@update');
///////////////////////////////////////////////////////////////////
Route::get('ocasionales/docente/{id}','EventoOcacionalController@getDocente');
Route::get('ocasionales','EventoOcacionalController@index');
Route::get('ocasionales/create','EventoOcacionalController@create');
Route::post('ocasionales/store', 'EventoOcacionalController@store');
///////////////////////////////////////////////////////////////////
Route::get('parametro/{id}/pdf', 'ParametroController@pdf');
///////////////////////////////////////////////////////////////////
Route::get('reporte/horario/sala', 'ReportesController@horarioPorSalasIndex');
Route::post('reporte/horario/sala', 'ReportesController@horarioPorSalasPost');

Route::get('reporte/fechacontrol', 'ReportesController@fechaControl');

Route::post('reporte/pdfcontrol', 'ReportesController@pdfcontrol');
Route::get('reporte/pdfevento/{id}/{fechaInicial}/{fechaFinal}', 'ReportesController@pdfevento');
Route::get('reporte/pdfmateriacarrera/{idperiodo}/{idcarrera}', 'ReportesController@pdfmateriacarrera');
Route::get('reporte/pdfhorariosala/{idperiodo}/{idlaboratorio}', 'ReportesController@pdfhorariosala');
Route::get('reporte/pdfhorariodocente/{idperiodo}/{iddocente}', 'ReportesController@pdfhorariodocente');
Route::post('reporte/actualizarControl', 'ReportesController@actualizarControl');

Route::get('reporte/horario/docente', 'ReportesController@horarioPorDocenteIndex');
Route::post('reporte/horario/docente', 'ReportesController@horarioPorDocentePost');


Route::get('reporte/hoja/control', 'ReportesController@hojaControl');
Route::post('reporte/hoja/control', 'ReportesController@hojaControl');

Route::get('reporte/ocasionales', 'ReportesController@eventosOcasionalesIndex');
Route::post('reporte/ocasionales', 'ReportesController@eventosOcasionalesPost');

Route::get('reporte/materia/carrera', 'ReportesController@materiaPorCarrera');
Route::post('reporte/materia/carrera', 'ReportesController@materiaPorCarreraPost');

Route::get('reporte/guia/docente', 'ReportesController@usoGuiasEntregadas');
Route::post('reporte/guia/docente', 'ReportesController@usoGuiasEntregadasPost');

Route::get('reporte/guia/carrera', 'ReportesController@guiasPorCarrera');
Route::post('reporte/guia/carrera', 'ReportesController@guiasPorCarreraPost');
Route::get('reporte/carrera/pdfguia/{idperiodo}/{idcarrera}/{fechaInicial}/{fechaFinal}', 'ReportesController@pdfCarreraGuia');
Route::get('reporte/pdfSolicitud/{id}', 'ReportesController@pdfSolicitud');
///////////////////////////////////////////////////////////////////
Route::get('guia/pdfGuia/{id}', 'GuiaController@pdfGuia');
Route::get('guia/listarGuias/{id}', 'GuiaController@listarGuias');
Route::get('guia/{id}/edit', 'GuiaController@edit');
Route::get('guia/{id}/destroy', 'GuiaController@destroy');
Route::post('guia/update', 'GuiaController@update');
Route::get('guia/crearGuia', 'GuiaController@crearGuiaIndex');
Route::get('guia/comboMateria/{id}', 'GuiaController@byPeriodoGet');
Route::get('guia/comboGuia/{id}', 'GuiaController@byGuiaGet');
Route::get('guia/controlGuiaLaboratoriocreate', 'GuiaController@controlGuiaLaboratoriocreate');
Route::post('guia/createGuiaSeleccion', 'GuiaController@createGuiaSeleccion');
Route::post('guia/guardarGuia', 'GuiaController@guardarGuia');
Route::get('guia/regresarListarGuia/{id}', 'GuiaController@regresarListarGuia');
//////////////////////////////////Routes AUTH
Route::get('home', 'LoginController@index');
Route::get('home/noticiadetail/{id}', 'LoginController@noticiadetail');
Route::get('home/objetodetail/{id}', 'LoginController@objetodetail');
/////////////////////////////////////////////////////////////////
Route::get('solicitud','SolicitudController@index'); // Que hace esta ruta?
Route::get('solicitud/{id}/index', 'SolicitudController@listRequests');
Route::get('solicitud/create', 'SolicitudController@create');
Route::get('solicitud/{id}/edit', 'SolicitudController@edit');
Route::get('solicitud/{id}/destroy', 'SolicitudController@destroy');
Route::get('solicitud/horarioFecha/{fecha}', 'SolicitudController@obtenerHorario');
Route::get('solicitud/crearSolicitud', 'SolicitudController@crearSolicitudIndex');
Route::post('solicitud/update', 'SolicitudController@update');
Route::post('solicitud/store', 'SolicitudController@store');
/////////////////////////////////////////////////////////////////
Route::get('user', 'UserController@index');
Route::get('user/create', 'UserController@getRegister');
Route::get('user/{id}/edit', 'UserController@edit');
Route::get('user/{id}/destroy', 'UserController@destroy');
Route::get('user/{id}/changePassword', 'UserController@changePassword');
Route::post('user/postCreate', 'UserController@postRegister');
Route::post('user/update', 'UserController@update');
Route::post('user/updatePassword', 'UserController@updatePassword');
/////////////////////////////////////////////////////////////////
Route::get('role/create', 'RoleController@create');
Route::post('role/postCreate', 'RoleController@store');
Route::get('role', 'RoleController@index');
Route::get('role/{id}/edit', 'RoleController@edit');
Route::get('role/{id}/destroy', 'RoleController@destroy');
Route::post('role/update', 'RoleController@update');


