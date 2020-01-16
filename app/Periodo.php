<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model {
	protected $table = 'periodo';
	protected $primaryKey = 'PER_CODIGO';
	protected $fillable = ['PER_NOMBRE', 'PER_ESTADO', 'PER_HORAS_ATENCION', 'PER_FECHA_INICIO', 'PER_FECHA_FIN','EMP_CODIGO'];
	public $timestamps = false;

	public function materias() {
		return $this->hasMany('App\Materia');
	}

	public function horarios() {
		return $this->hasMany('App\Horario');
	}

	public function guias() {
		return $this->hasMany('App\Guia');
	}

	public function scopeCodigoNombre($query) {
		return $query->select('PER_CODIGO', 'PER_NOMBRE')->orderBy('PER_CODIGO', 'DESC');
	}

	public function scopePeriodoActivo($query){
		return $query->where('PER_ESTADO','1');
	}

	public function scopeFiltroEmpresa($query,$empresa) {
		return $query->where('EMP_CODIGO', $empresa);
	}
}
