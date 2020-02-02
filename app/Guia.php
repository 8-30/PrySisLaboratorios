<?php namespace App;

use Illuminate\Database\Eloquent\Model;
//
class Guia extends Model {

	//
	protected $table = 'guia';
	protected $primaryKey = 'GUI_CODIGO';

	protected $fillable = ['DOC_CODIGO','MAT_CODIGO','LAB_CODIGO','PER_CODIGO','GUI_NUMERO','GUI_FECHA','GUI_TEMA','GUI_DURACION','GUI_OBJETIVO','GUI_EQUIPO_MATERIALES','GUI_TRABAJO_PREPARATORIO','GUI_ACTIVIDADES','GUI_RESULTADOS','GUI_CONCLUSIONES','GUI_RECOMENDACIONES','GUI_REFERENCIAS_BIBLIOGRAFICAS','GUI_ELABORADO','GUI_APROBADO','GUI_REGISTRADO','GUI_INTRODUCCION','GUI_COORDINADOR'];

	public function scopeGuiasx($query, $periodo, $docente){
        return $query->where('PER_CODIGO',$periodo)->where('DOC_CODIGO',$docente);
	}
	public function scopeGuiasxCarrera($query, $materia){
        return $query->where('MAT_CODIGO',$materia);
    }
	public function guias(){
		return $this->belongsTo('App\docente','DOC_CODIGO');
	}
	public function docentes(){
		return $this->belongsTo('App\docente','DOC_CODIGO');
	}
	public function materias(){
		return $this->belongsTo('App\materia','MAT_CODIGO');
	}
	public function laboratorios(){
        return $this->belongsTo('App\laboratorio','LAB_CODIGO');
	}
	public function periodos(){
        return $this->belongsTo('App\Periodo','PER_CODIGO');
    }

	public function controles(){
		return $this->hasMany('App\control');
	}

	public $timestamps = false;

	//obtiene las guias de una materia
	public function scopeReporte($query, $materiaId) {
		return $query->select('GUI_CODIGO','DOC_CODIGO', 'MAT_CODIGO','LAB_CODIGO',
	'PER_CODIGO', 'GUI_NUMERO', 'GUI_FECHA', 'GUI_TEMA')
			->where('MAT_CODIGO', $materiaId);
	
    }

	public function scopeCodigoNombre($query) {
		return $query->select('GUI_CODIGO', 'GUI_FECHA', 
		'GUI_TEMA', 'GUI_DURACION', 'GUI_OBJETIVO', 
		'GUI_EQUIPO_MATERIALES', 'GUI_TRABAJO_PREPARATORIO', 
		'GUI_ACTIVIDADES', 'GUI_RESULTADOS', 'GUI_CONCLUSIONES', 
		'GUI_RECOMENDACIONES', 'GUI_REFERENCIAS_BIBLIOGRAFICAS', 
		'GUI_INTRODUCCION','GUI_COORDINADOR')
		->orderBy('GUI_CODIGO', 'ASC');;
	}
	public function scopeLastGuia($query, $matId) {
		return $query->select('GUI_NUMERO','LAB_CODIGO','GUI_COORDINADOR','GUI_FECHA')
		->where('MAT_CODIGO',$matId)->orderBy('GUI_FECHA','DESC');
	}

	public function scopeGuiasParaControl($query, $fecha, $docente, $materia){
		return $query->where('DOC_CODIGO',$docente)->where('MAT_CODIGO',$materia)->where('GUI_FECHA',$fecha);
	}
}