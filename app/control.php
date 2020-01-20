<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Control extends Model {

	protected $table = 'control';
	protected $primaryKey = 'CON_CODIGO';
	//							1				2				3				   4					5			           6				      7				         8				   9			      10					11			  12		   13		  14		 15		      16         17            18        
	protected $fillable = ['CON_DIA', 'CON_HORA_ENTRADA', 'CON_HORA_SALIDA', 'CON_LAB_ABRE', 'CON_HORA_ENTRADA_R', 'CON_REG_FIRMA_ENTRADA', 'CON_HORA_SALIDA_R', 'CON_REG_FIRMA_SALIDA', 'CON_LAB_CIERRA','CON_OBSERVACIONES','CON_NUMERO_HORAS','CON_NOTA','CON_EXTRA','CON_GUIA','GUI_CODIGO','LAB_CODIGO','MAT_CODIGO','DOC_CODIGO','SOL_CODIGO'];
	public $timestamps = false;

	public function scopeEntregadasx($query, $materia){
        return $query->where('MAT_CODIGO',$materia);
    }

	public function laboratorio()
    {
        return $this->belongsTo('App\Laboratorio', 'LAB_CODIGO');
	}
	
	public function materia()
    {
        return $this->belongsTo('App\Materia', 'MAT_CODIGO');
	}
	
	public function docente()
    {
        return $this->belongsTo('App\Docente', 'DOC_CODIGO');
	}

	public function guia()
    {
        return $this->belongsTo('App\Guia', 'GUI_CODIGO');
	}
	
	public function scopeCodigoNombre($query) {
		return $query->select('CON_CODIGO', 'DOC_NOMBRES', 'DOC_APELLIDOS');
	}
	//busca la fecha de control que aun no tenga guia validando la fecha mayor que la ultima guia creada
	public function scopeFechaGuia($query, $materiaId,$fecha) {
		return $query->select('CON_DIA','CON_CODIGO')
		->where('MAT_CODIGO',$materiaId)->where('CON_DIA','>',$fecha)->whereNull('CON_GUIA')->whereNull('CON_EXTRA')->whereNotNull('CON_REG_FIRMA_ENTRADA')->orderBy('CON_DIA','ASC')->limit(1);
	}
	//busca la fecha de control que aun no tenga guia
	public function scopeFechaGuiaSin($query, $materiaId) {
		return $query->select('CON_DIA','CON_CODIGO')
		->where('MAT_CODIGO',$materiaId)->whereNull('CON_GUIA')->whereNull('CON_EXTRA')->whereNotNull('CON_REG_FIRMA_ENTRADA')->orderBy('CON_DIA','ASC')->limit(1);
	}
	//busca la fecha de control que aun no tenga guia
	public function scopeFiltroEmpresa($query, $date,$empresa) {
		return $query->join('laboratorio','control.LAB_CODIGO','=','laboratorio.LAB_CODIGO')->where('control.CON_DIA', $date)->where('laboratorio.EMP_CODIGO', $empresa);
	}

	public function scopeCruceHoras($query,$laboratorio,$horaI,$horaf,$dia){
    	return $query->where('LAB_CODIGO',$laboratorio)->where('CON_HORA_ENTRADA',$horaI)->where('CON_HORA_SALIDA',$horaf)->where('CON_DIA',$dia);
    }

    public function scopeDuplicado($query,$materia,$horaI,$horaf,$dia){
    	return $query->where('MAT_CODIGO',$materia)->where('CON_HORA_ENTRADA',$horaI)->where('CON_HORA_SALIDA',$horaf)->where('CON_DIA',$dia);
    }

}
