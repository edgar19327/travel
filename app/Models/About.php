<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 19 Oct 2018 19:47:05 +0000.
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
