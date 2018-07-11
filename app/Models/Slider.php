<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Slider
 * 
 * @property int $id
 * @property string $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $images
 * @property \Illuminate\Database\Eloquent\Collection $slider_translates
 *
 * @package App\Models
 */
class Slider extends Eloquent
{
	protected $table = 'slider';
	public $timestamps = false;

	protected $fillable = [
		'status'
	];

	public function images()
	{
		return $this->hasMany(\App\Models\Image::class);
	}

	public function slider_translates()
	{
		return $this->hasMany(\App\Models\SliderTranslate::class);
	}
}
