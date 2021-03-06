<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 19 Oct 2018 19:47:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BlogTranslate
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $lenguage_id
 * @property int $blog_id
 * @property int $place_id
 * 
 * @property \App\Models\Language $language
 * @property \App\Models\Blog $blog
 * @property \App\Models\Place $place
 *
 * @package App\Models
 */
class BlogTranslate extends Eloquent
{
	protected $table = 'blog_translate';
	public $timestamps = false;

	protected $casts = [
		'lenguage_id' => 'int',
		'blog_id' => 'int',
		'place_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'lenguage_id',
		'blog_id',
		'place_id'
	];

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class, 'lenguage_id');
	}

	public function blog()
	{
		return $this->belongsTo(\App\Models\Blog::class);
	}

	public function place()
	{
		return $this->belongsTo(\App\Models\Place::class);
	}
}
