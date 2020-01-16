<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model {

	//
	protected $table = 'laboratorio';
	protected $primaryKey = 'LAB_CODIGO';
	//							1				2				3				4					5			6				7				8				9						10							11						12		13			14				
	protected $fillable = ['LAB_NOMBRE', 'LAB_CAPACIDAD', 'CAM_CODIGO', 'EMP_CODIGO','LAB_ABREVIATURA','LAB_ESTADO'];
	public $timestamps = false;
	
	public function campus()
    {
        return $this->belongsTo('App\Campus', 'CAM_CODIGO');
	}
	
	public function empresa()
    {
        return $this->belongsTo('App\empresa', 'EMP_CODIGO');
	}

	public function controles(){
		return $this->hasMany('App\Control');
	}
	public function horarios() {
		return $this->hasMany('App\Horario');
	}
	public function guias() {
		return $this->hasMany('App\Guia');
	}
	
	public function scopeCodigoNombreCapacidad($query)
	{
		return $query->select('LAB_CODIGO', 'LAB_NOMBRE', 'LAB_CAPACIDAD','LAB_ABREVIATURA','LAB_ESTADO');
	}

	public function scopeFiltrarCampus($query,$campus){
		return $query->select('LAB_CODIGO', 'LAB_NOMBRE', 'LAB_CAPACIDAD','LAB_ABREVIATURA','LAB_ESTADO')->where('CAM_CODIGO',$campus);
	}

}
