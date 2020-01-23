<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model {
	protected $table = 'solicitud';
	protected $primaryKey = 'SOL_CODIGO';		
	protected $fillable = ['SOL_CODIGO', 'DOC_CODIGO', 'MAT_CODIGO', 'LAB_CODIGO', 'SOL_FECHA', 'SOL_FECHA_USO', 'SOL_TEMA_PRACTICA', 'SOL_NUMERO', 'SOL_HORARIO_USO','SOL_ESTADO'];
	public $timestamps = false;

	/**
	 * Relación uno-muchos entre Solicitud y Detalle Solicitud.
	 *
	 * @return Solicitud $this relacion uno-muchos
	 */
	public function detalleSolicitud() {

		return $this->hasMany('App\DetalleSolicitud','SOL_CODIGO');

	}
	/**
	 * Relación uno-uno entre Docente y Solicitud.
	 *
	 * @return Docente $this relacion uno-uno
	 */
	public function docente() {
		return $this->belongsTo('App\Docente','DOC_CODIGO');
	}
	/**
	 * Relación uno-uno entre Materia y Solicitud.
	 *
	 * @return Materia $this relacion uno-uno
	 */
	public function materia() {
		return $this->belongsTo('App\Materia','MAT_CODIGO');
	}
	/**
	 * Relación uno-uno entre Laboratorio y Solicitud.
	 *
	 * @return Laboratorio $this relacion uno-uno
	 */
	public function laboratorio() {
		return $this->belongsTo('App\laboratorio','LAB_CODIGO');
	}
	/*
	* Funcion que devuelve todas las solicitudes de un docente de una materia
	* @return Solicitudes
	*/
	public function scopeAllSolicitudes($query,$docenteId, $materiaId) {
		return $query->where('MAT_CODIGO',$materiaId)->where('MAT_CODIGO',$materiaId)->orderBy('SOL_NUMERO','DESC');
	}

	public function scopeSolParaControl($query, $fecha, $docente, $materia){
		return $query->where('DOC_CODIGO',$docente)->where('MAT_CODIGO',$materia)->where('SOL_FECHA_USO',$fecha);
	}
}
