<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Image
 * 
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string $position
 * @property int $slider_id
 * @property int $place_id
 * @property int $user_id
 * @property string $status
 * 
 * @property \App\Models\Slider $slider
 * @property \App\Models\Place $place
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $languages
 *
 * @package App\Models
 */
class Image extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'slider_id' => 'int',
		'place_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'name',
		'path',
		'position',
		'slider_id',
		'place_id',
		'user_id',
		'status'
	];

	public function slider()
	{
		return $this->belongsTo(\App\Models\Slider::class);
	}

	public function place()
	{
		return $this->belongsTo(\App\Models\Place::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function languages()
	{
		return $this->hasMany(\App\Models\Language::class);
	}
}
