<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Sep 2018 23:17:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property int $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $places
 * @property \Illuminate\Database\Eloquent\Collection $category_translates
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $table = 'category';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'status'
	];

	public function places()
	{
		return $this->belongsToMany(\App\Models\Place::class)
					->withPivot('id');
	}

	public function category_translates()
	{
		return $this->hasMany(\App\Models\CategoryTranslate::class);
	}
}
