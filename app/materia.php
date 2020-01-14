<?php namespace App;
/*
 * Sistema de Gestion de Laboratorios - ESPE
 *
 * Author: Barrera Erick - LLamuca Andrea
 * Revisado por: 
 *
 */
use Illuminate\Database\Eloquent\Model;

class Materia extends Model {

	protected $table = 'materia';
	protected $primaryKey = 'MAT_CODIGO';
	protected $fillable = ['PER_CODIGO','DOC_CODIGO','CAR_CODIGO','MAT_NRC','MAT_NOMBRE','MAT_CREDITOS','MAT_NUM_EST','MAT_ABREVIATURA','MAT_CODIGO_BANNER','MAT_NIVEL','MAT_OCACIONAL'];
	public $timestamps = false;

     public function scopeMateriasx($query, $periodo, $carrera){
        return $query->where('PER_CODIGO',$periodo)->where('CAR_CODIGO', $carrera);
	}
	
	public function scopeMateriasxP($query, $periodo, $docente){
        return $query->where('PER_CODIGO',$periodo)->where('DOC_CODIGO', $docente);
    }
	public function scopeReporte($query, $periodoId) {
		return $query->select('MAT_CODIGO', 'DOC_CODIGO', 'MAT_ABREVIATURA', 'MAT_OCACIONAL')
			->where('PER_CODIGO', $periodoId);
	}

	public function scopeObtenerMateriaPorDocente($query, $periodo, $docente){
		return $query->select('MAT_CODIGO', 'DOC_CODIGO', 'MAT_NOMBRE', 'MAT_OCACIONAL','MAT_NRC')->where('PER_CODIGO',$periodo)->where('DOC_CODIGO', $docente);
	}

	public function periodo(){
        return $this->belongsTo('App\Periodo','PER_CODIGO');
    }
	public function docente(){
		return $this->belongsTo('App\Docente','DOC_CODIGO');
	}
	public function carrera(){
		return $this->belongsTo('App\Carrera','CAR_CODIGO');
	}
	public function guias() {
		return $this->hasMany('App\Guia');
	}

	public function scopeCodigoNombre($query) {
		return $query->select('MAT_CODIGO', 'MAT_NOMBRE', 'MAT_NRC');
	}

	public function scopeFiltroEmpresa($query, $periodo) {
		return $query->where('PER_CODIGO',$periodo)->orderBy('MAT_NOMBRE','ASC');
	}
	
}
