<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Sep 2018 23:17:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Image
 * 
 * @property int $id
 * @property string $name
 * @property string $path
 * @property int $type
 * @property int $slider_id
 * @property int $place_id
 * @property int $user_id
 * @property int $about_id
 * @property string $status
 * 
 * @property \App\Models\Slider $slider
 * @property \App\Models\Place $place
 * @property \App\Models\User $user
 * @property \App\Models\About $about
 *
 * @package App\Models
 */
class Image extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'slider_id' => 'int',
		'place_id' => 'int',
		'user_id' => 'int',
		'about_id' => 'int'
	];

	protected $fillable = [
		'name',
		'path',
		'type',
		'slider_id',
		'place_id',
		'user_id',
		'about_id',
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

	public function about()
	{
		return $this->belongsTo(\App\Models\About::class);
	}
}
