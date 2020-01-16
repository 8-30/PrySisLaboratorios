<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {
	protected $table = 'horario';
	protected $primaryKey = 'HOR_CODIGO';
	protected $fillable = [
		'LAB_CODIGO',
		'PER_CODIGO',
		'HOR_HORA1',
		'HOR_HORA2',
		'HOR_HORA3',
		'HOR_HORA4',
		'HOR_HORA5',
		'HOR_HORA6',
		'HOR_HORA7',
		'HOR_HORA8',
		'HOR_HORA9',
		'HOR_HORA10',
		'HOR_HORA11',
		'HOR_HORA12',
		'HOR_HORA13',
		'HOR_LUNES1',
		'HOR_LUNES2',
		'HOR_LUNES3',
		'HOR_LUNES4',
		'HOR_LUNES5',
		'HOR_LUNES6',
		'HOR_LUNES7',
		'HOR_LUNES8',
		'HOR_LUNES9',
		'HOR_LUNES10',
		'HOR_LUNES11',
		'HOR_LUNES12',
		'HOR_LUNES13',
		'HOR_MATES1',
		'HOR_MATES2',
		'HOR_MATES3',
		'HOR_MATES4',
		'HOR_MATES5',
		'HOR_MATES6',
		'HOR_MATES7',
		'HOR_MATES8',
		'HOR_MATES9',
		'HOR_MATES10',
		'HOR_MATES11',
		'HOR_MATES12',
		'HOR_MATES13',
		'HOR_MIERCOLES1',
		'HOR_MIERCOLES2',
		'HOR_MIERCOLES3',
		'HOR_MIERCOLES4',
		'HOR_MIERCOLES5',
		'HOR_MIERCOLES6',
		'HOR_MIERCOLES7',
		'HOR_MIERCOLES8',
		'HOR_MIERCOLES9',
		'HOR_MIERCOLES10',
		'HOR_MIERCOLES11',
		'HOR_MIERCOLES12',
		'HOR_MIERCOLES13',
		'HOR_JUEVES1',
		'HOR_JUEVES2',
		'HOR_JUEVES3',
		'HOR_JUEVES4',
		'HOR_JUEVES5',
		'HOR_JUEVES6',
		'HOR_JUEVES7',
		'HOR_JUEVES8',
		'HOR_JUEVES9',
		'HOR_JUEVES10',
		'HOR_JUEVES11',
		'HOR_JUEVES12',
		'HOR_JUEVES13',
		'HOR_VIERNES1',
		'HOR_VIERNES2',
		'HOR_VIERNES3',
		'HOR_VIERNES4',
		'HOR_VIERNES5',
		'HOR_VIERNES6',
		'HOR_VIERNES7',
		'HOR_VIERNES8',
		'HOR_VIERNES9',
		'HOR_VIERNES10',
		'HOR_VIERNES11',
		'HOR_VIERNES12',
		'HOR_VIERNES13',
		'HOR_LUNES1_OPC',
		'HOR_LUNES2_OPC',
		'HOR_LUNES3_OPC',
		'HOR_LUNES4_OPC',
		'HOR_LUNES5_OPC',
		'HOR_LUNES6_OPC',
		'HOR_LUNES7_OPC',
		'HOR_LUNES8_OPC',
		'HOR_LUNES9_OPC',
		'HOR_LUNES10_OPC',
		'HOR_LUNES11_OPC',
		'HOR_LUNES12_OPC',
		'HOR_LUNES13_OPC',
		'HOR_MARTES1_OPC',
		'HOR_MARTES2_OPC',
		'HOR_MARTES3_OPC',
		'HOR_MARTES4_OPC',
		'HOR_MARTES5_OPC',
		'HOR_MARTES6_OPC',
		'HOR_MARTES7_OPC',
		'HOR_MARTES8_OPC',
		'HOR_MARTES9_OPC',
		'HOR_MARTES10_OPC',
		'HOR_MARTES11_OPC',
		'HOR_MARTES12_OPC',
		'HOR_MARTES13_OPC',
		'HOR_MIERCOLES1_OPC',
		'HOR_MIERCOLES2_OPC',
		'HOR_MIERCOLES3_OPC',
		'HOR_MIERCOLES4_OPC',
		'HOR_MIERCOLES5_OPC',
		'HOR_MIERCOLES6_OPC',
		'HOR_MIERCOLES7_OPC',
		'HOR_MIERCOLES8_OPC',
		'HOR_MIERCOLES9_OPC',
		'HOR_MIERCOLES10_OPC',
		'HOR_MIERCOLES11_OPC',
		'HOR_MIERCOLES12_OPC',
		'HOR_MIERCOLES13_OPC',
		'HOR_JUEVES1_OPC',
		'HOR_JUEVES2_OPC',
		'HOR_JUEVES3_OPC',
		'HOR_JUEVES4_OPC',
		'HOR_JUEVES5_OPC',
		'HOR_JUEVES6_OPC',
		'HOR_JUEVES7_OPC',
		'HOR_JUEVES8_OPC',
		'HOR_JUEVES9_OPC',
		'HOR_JUEVES10_OPC',
		'HOR_JUEVES11_OPC',
		'HOR_JUEVES12_OPC',
		'HOR_JUEVES13_OPC',
		'HOR_VIERNES1_OPC',
		'HOR_VIERNES2_OPC',
		'HOR_VIERNES3_OPC',
		'HOR_VIERNES4_OPC',
		'HOR_VIERNES5_OPC',
		'HOR_VIERNES6_OPC',
		'HOR_VIERNES7_OPC',
		'HOR_VIERNES8_OPC',
		'HOR_VIERNES9_OPC',
		'HOR_VIERNES10_OPC',
		'HOR_VIERNES11_OPC',
		'HOR_VIERNES12_OPC',
		'HOR_VIERNES13_OPC'
	];
	public $timestamps = false;
	/**
	 * Relación uno-uno entre Horario y Periodo.
	 *
	 * @return Horario $this relacion uno-uno
	 */
	public function periodo() {
		return $this->belongsTo('App\Periodo', 'PER_CODIGO');
	}
	/**
	 * Relación uno-uno entre Horario y Carrera.
	 *
	 * @return Carrera $this relacion uno-uno
	 */
	public function laboratorio() {
		return $this->belongsTo('App\Laboratorio', 'LAB_CODIGO');
	}
	/**
	 * Metodo scope
	 * Realiza una consulta a la tabla Horario
	 * Retorna un scope al que le añade una consulta select 
	 * con los campos 'PER_CODIGO' solo mientras tenga 'LAB_CODIGO'
	 *
	 * @param Scope $query
	 * @return Scope $query
	 */	
	public function scopeObtenerHorario($query, $periodoId, $laboratorioId)
	{
		return $query->where('PER_CODIGO', $periodoId)
			->where('LAB_CODIGO', $laboratorioId);
	}
	/**
	 * Metodo scope
	 * Realiza una consulta a la tabla Horario
	 * Retorna un scope al que le añade una consulta select 
	 * con los campos 'PER_CODIGO'
	 *
	 * @param Scope $query
	 * @return Scope $query
	 */
	public function scopeObtenerHorarioPorPeriodo($query, $periodoId)
	{
		return $query->where('PER_CODIGO', $periodoId);
	}

	//Retorna el horario de la materia
	public function scopeHorarioMateria($query, $materiaId)
	{
		return $query->where('HOR_LUNES1', $materiaId)->orWhere('HOR_LUNES2',$materiaId)->orWhere('HOR_LUNES3',$materiaId)
		->orWhere('HOR_LUNES4',$materiaId)->orWhere('HOR_LUNES5',$materiaId)->orWhere('HOR_LUNES6',$materiaId)->orWhere('HOR_LUNES7',$materiaId)
		->orWhere('HOR_LUNES8',$materiaId)->orWhere('HOR_LUNES9',$materiaId)->orWhere('HOR_LUNES10',$materiaId)->orWhere('HOR_LUNES11',$materiaId)
		->orWhere('HOR_LUNES12',$materiaId)->orWhere('HOR_LUNES13',$materiaId)->orWhere('HOR_MATES1',$materiaId)->orWhere('HOR_MATES2',$materiaId)
		->orWhere('HOR_MATES3',$materiaId)->orWhere('HOR_MATES4',$materiaId)->orWhere('HOR_MATES5',$materiaId)->orWhere('HOR_MATES6',$materiaId)
		->orWhere('HOR_MATES7',$materiaId)->orWhere('HOR_MATES8',$materiaId)->orWhere('HOR_MATES9',$materiaId)->orWhere('HOR_MATES10',$materiaId)
		->orWhere('HOR_MATES11',$materiaId)->orWhere('HOR_MATES12',$materiaId)->orWhere('HOR_MATES13',$materiaId)->orWhere('HOR_MIERCOLES1',$materiaId)
		->orWhere('HOR_MIERCOLES2',$materiaId)->orWhere('HOR_MIERCOLES3',$materiaId)->orWhere('HOR_MIERCOLES4',$materiaId)->orWhere('HOR_MIERCOLES5',$materiaId)
		->orWhere('HOR_MIERCOLES6',$materiaId)->orWhere('HOR_MIERCOLES7',$materiaId)->orWhere('HOR_MIERCOLES8',$materiaId)->orWhere('HOR_MIERCOLES9',$materiaId)
		->orWhere('HOR_MIERCOLES10',$materiaId)->orWhere('HOR_MIERCOLES11',$materiaId)->orWhere('HOR_MIERCOLES12',$materiaId)->orWhere('HOR_MIERCOLES13',$materiaId)
		->orWhere('HOR_JUEVES1',$materiaId)->orWhere('HOR_JUEVES2',$materiaId)->orWhere('HOR_JUEVES3',$materiaId)->orWhere('HOR_JUEVES4',$materiaId)
		->orWhere('HOR_JUEVES5',$materiaId)->orWhere('HOR_JUEVES6',$materiaId)->orWhere('HOR_JUEVES7',$materiaId)->orWhere('HOR_JUEVES8',$materiaId)
		->orWhere('HOR_JUEVES9',$materiaId)->orWhere('HOR_JUEVES10',$materiaId)->orWhere('HOR_JUEVES11',$materiaId)->orWhere('HOR_JUEVES12',$materiaId)
		->orWhere('HOR_JUEVES13',$materiaId)->orWhere('HOR_VIERNES1',$materiaId)->orWhere('HOR_VIERNES2',$materiaId)->orWhere('HOR_VIERNES3',$materiaId)
		->orWhere('HOR_VIERNES4',$materiaId)->orWhere('HOR_VIERNES5',$materiaId)->orWhere('HOR_VIERNES6',$materiaId)->orWhere('HOR_VIERNES7',$materiaId)
		->orWhere('HOR_VIERNES8',$materiaId)->orWhere('HOR_VIERNES9',$materiaId)->orWhere('HOR_VIERNES10',$materiaId)->orWhere('HOR_VIERNES11',$materiaId)
		->orWhere('HOR_VIERNES12',$materiaId)->orWhere('HOR_VIERNES13',$materiaId);
	}
	public function scopescopeObtenerHorarioOcasionalMateria($query, $materiaId,$dia,$opcional)
	{
		return $query->where('HOR_'.$dia."1", $materiaId)->where('HOR_'.$opcional."1_OPC", 1)->orWhere('HOR_'.$dia."2", $materiaId)->where('HOR_'.$opcional."2_OPC", 1)->orWhere('HOR_'.$dia."3", $materiaId)->where('HOR_'.$opcional."3_OPC", 1)->orWhere('HOR_'.$dia."4", $materiaId)->where('HOR_'.$opcional."4_OPC", 1)
		->orWhere('HOR_'.$dia."5", $materiaId)->where('HOR_'.$opcional."5_OPC", 1)->orWhere('HOR_'.$dia."6", $materiaId)->where('HOR_'.$opcional."6_OPC", 1)->orWhere('HOR_'.$dia."7", $materiaId)->where('HOR_'.$opcional."7_OPC", 1)->orWhere('HOR_'.$dia."8", $materiaId)->where('HOR_'.$opcional."8_OPC", 1)
		->orWhere('HOR_'.$dia."9", $materiaId)->where('HOR_'.$opcional."9_OPC", 1)->orWhere('HOR_'.$dia."10", $materiaId)->where('HOR_'.$opcional."10_OPC", 1)->orWhere('HOR_'.$dia."11", $materiaId)->where('HOR_'.$opcional."11_OPC", 1)->orWhere('HOR_'.$dia."12", $materiaId)->where('HOR_'.$opcional."12_OPC", 1)
		->orWhere('HOR_'.$dia."13", $materiaId)->where('HOR_'.$opcional."13_OPC", 1);
	}
}
