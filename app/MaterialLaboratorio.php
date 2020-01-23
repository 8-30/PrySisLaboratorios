<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialLaboratorio extends Model {
	protected $table = 'material_laboratorio';
	protected $primaryKey = 'MATLAB_CODIGO';
	protected $fillable = ['EMP_CODIGO', 'PER_CODIGO', 'MATLAB_CANTIDAD', 'MATLAB_DETALLE', 'MATLAB_OBSERVACION','LAB_CODIGO'];
	public $timestamps = false;

	
	public function scopeFiltroEmpresa($query,$empresa) {
		return $query->where('EMP_CODIGO', $empresa);
	}

	public function scopeFiltroEmpresaPeriodo($query,$empresa,$periodo) {
		return $query->where('EMP_CODIGO', $empresa)->where('PER_CODIGO',$periodo);
	}


	public function periodo()
    {
        return $this->belongsTo('App\Periodo', 'PER_CODIGO');
	}

	public function empresa()
    {
        return $this->belongsTo('App\Periodo', 'EMP_CODIGO');
	}

		public function laboratorio()
    {
        return $this->belongsTo('App\laboratorio', 'LAB_CODIGO');
	}


}
