<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Sep 2018 23:17:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class About
 * 
 * @property int $id
 * @property int $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $about_translates
 * @property \Illuminate\Database\Eloquent\Collection $images
 *
 * @package App\Models
 */
class About extends Eloquent
{
	protected $table = 'about';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'status'
	];

	public function about_translates()
	{
		return $this->hasMany(\App\Models\AboutTranslate::class);
	}

	public function images()
	{
		return $this->hasMany(\App\Models\Image::class);
	}
}
