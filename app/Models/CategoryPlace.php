<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 24 Sep 2018 09:54:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CategoryPlace
 * 
 * @property int $id
 * @property int $category_id
 * @property int $place_id
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\Place $place
 *
 * @package App\Models
 */
class CategoryPlace extends Eloquent
{
	protected $table = 'category_place';
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int',
		'place_id' => 'int'
	];

	protected $fillable = [
		'category_id',
		'place_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function place()
	{
		return $this->belongsTo(\App\Models\Place::class);
	}
}
