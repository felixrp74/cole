<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Estudiante
 * 
 * @property int $idestudiante
 * @property string|null $nombre
 * @property int $apoderados_idapoderado
 * 
 * @property Apoderado $apoderado
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Estudiante extends Model
{
	protected $table = 'estudiantes';
	protected $primaryKey = 'idestudiante';
	public $timestamps = false;

	protected $casts = [
		'apoderados_idapoderado' => 'int'
	];

	protected $fillable = [
		'dni',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'fecha_nacimiento',
		'lugar_nacimiento',
		'genero',
		'direccion_actual',
		'celular',
		'email',
		'password',
		'documento'
	];

	public function apoderado()
	{
		return $this->belongsTo(Apoderado::class, 'apoderados_idapoderado');
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'estudiante_idestudiante');
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
