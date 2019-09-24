<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model {


	protected $table = 'empresa';
	protected $primaryKey = 'EMP_CODIGO';
	protected $fillable = ['EMP_NOMBRE', 'EMP_FIRMA_DEE', 'EMP_PIE_DEE', 'EMP_FIRMA_JEFE', 'EMP_PIE_JEFE', 'EMP_FIRMA_LAB', 'EMP_PIE_LAB', 'EMP_ESTADO', 'EMP_RELACION_SUFICIENCIA'];
	public $timestamps = false;
}
