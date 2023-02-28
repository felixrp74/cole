<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $extract
 * @property string|null $body
 * @property string $status
 * @property int $user_id
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Category $category
 * @property User $user
 * @property Collection|Tag[] $tags
 *
 * @package App\Models
 */
class Post extends Model
{
	protected $table = 'posts';

	protected $casts = [
		'user_id' => 'int',
		'category_id' => 'int'
	];

	protected $fillable = [
		'name',
		'slug',
		'extract',
		'body',
		'status',
		'user_id',
		'category_id'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class)
					->withPivot('id')
					->withTimestamps();
	}
}
