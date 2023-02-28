<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $color
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Post[] $posts
 *
 * @package App\Models
 */
class Tag extends Model
{
	protected $table = 'tags';

	protected $fillable = [
		'name',
		'slug',
		'color'
	];

	public function posts()
	{
		return $this->belongsToMany(Post::class)
					->withPivot('id')
					->withTimestamps();
	}
}
