<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 * 
 * @property int $id
 * @property string $url
 * @property int $fileable_id
 * @property string $fileable_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class File extends Model
{
	protected $table = 'files';

	protected $casts = [
		'fileable_id' => 'int'
	];

	protected $fillable = [
		'url',
		'fileable_id',
		'fileable_type'
	];
}
