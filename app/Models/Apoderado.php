<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Apoderado
 * 
 * @property int $idapoderado
 * @property string|null $nombre
 * 
 * @property Collection|Estudiante[] $estudiantes
 *
 * @package App\Models
 */
class Apoderado extends Model
{
	protected $table = 'apoderados';
	protected $primaryKey = 'idapoderado';
	public $timestamps = false;

	protected $fillable = [ 
		'genero_apoderado',
		'dni_apoderado', 
		'nombre_apoderado',
		'apellido_paterno_apoderado',
		'apellido_materno_apoderado',
		'fecha_nacimiento_apoderado',
		'lugar_nacimiento_apoderado',
		'vive_apoderado',
		'direccion_actual_apoderado',
		'email_apoderado',
		'grado_instruccion_apoderado',
		'ocupacion_apoderado',
		'estado_civil_apoderado',
		'celular_apoderado',
		'estudiantes_idestudiante'
	];
	
	public function estudiantes()
	{
		return $this->hasMany(Estudiante::class, 'apoderados_idapoderado');
	}

	// relacinon uno a uno polimorfica
	public function image(){
		return $this->morphOne(Image::class, 'imageable');
	}
	
	// relacinon uno a uno polimorfica
	public function file(){
		return $this->morphOne(File::class, 'fileable');
	}
}
