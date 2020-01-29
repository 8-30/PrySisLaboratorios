<?php namespace App;
/*
 * Sistema de Gestion de Laboratorios - ESPE
 *
 * Author: Antony Andrade - Jonel Lopez
 * Revisado por: Antony Andrade - Jonel Lopez
 *
 */
use Illuminate\Database\Eloquent\Model;

class Docente extends Model {
	protected $table = 'docente';
	protected $primaryKey = 'DOC_CODIGO';
	//							1				2			  3				4								
	protected $fillable = ['DOC_CEDULA', 'DOC_MIESPE', 'DOC_NOMBRES', 'DOC_APELLIDOS','DOC_CORREO','DOC_CLAVE','DOC_TITULO'];
	public $timestamps = false;

	public function materias() {
		return $this->hasMany('App\Materia');
	}

	public function guias() {
		return $this->hasMany('App\Guia');
	}

	public function controles(){
		return $this->hasMany('App\control');
	}

	public function scopeCodigoNombre($query) {
		return $query->select('DOC_CODIGO', 'DOC_TITULO', 'DOC_NOMBRES', 'DOC_APELLIDOS')->orderBy('DOC_APELLIDOS', 'ASC');
	}

	public function scopeNombreDocente($query,$id){
		return $query->select( 'DOC_TITULO', 'DOC_NOMBRES', 'DOC_APELLIDOS')->where('DOC_CODIGO',$id);

	}
}
