<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Blog
 * 
 * @property int $id
 * @property int $price
 * @property int $place_id
 * 
 * @property \App\Models\Place $place
 * @property \Illuminate\Database\Eloquent\Collection $blog_translates
 *
 * @package App\Models
 */
class Blog extends Eloquent
{
	protected $table = 'blog';
	public $timestamps = false;



	protected $fillable = [
	];



	public function blog_translates()
	{
		return $this->hasMany(\App\Models\BlogTranslate::class);
	}
}
