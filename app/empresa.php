<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {
	protected $table = 'empresa';
	protected $primaryKey = 'EMP_CODIGO';
	//							1				2				3				4					5			6				7				8				9						10							11						12		13			14				
	protected $fillable = ['EMP_NOMBRE', 'EMP_FIRMA_DEE', 'EMP_PIE_DEE', 'EMP_FIRMA_JEFE', 'EMP_PIE_JEFE', 'EMP_FIRMA_LAB', 'EMP_PIE_LAB', 'EMP_ESTADO', 'EMP_RELACION_SUFICIENCIA','EMP_IMAGEN_ENCABEZADO','EMP_IMAGEN_ENCABEZADO2','EMP_AUX1','EMP_AUX2','INS_CODIGO'];
	public $timestamps = false;

	/**
	 * Relación uno-uno entre Empresa e Institución .
	 *
	 * @return Empresa $this relacion uno-uno
	 */
	public function institucion() {
        return $this->belongsTo('App\Institucion', 'INS_CODIGO');
    }
	/**
	 * Relación uno-muchos entre Empresa y Parametros.
	 *
	 * @return Empresa $this relacion uno-muchos
	 */
	public function parametros() {

		return $this->hasMany('App\Parametro');

	}
	public function materiales() {

		return $this->hasMany('App\MaterialLaboratorio');

	}
}
