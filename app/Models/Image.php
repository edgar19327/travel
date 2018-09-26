<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 24 Sep 2018 09:54:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Image
 * 
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string $type
 * @property int $slider_id
 * @property int $place_id
 * @property int $user_id
 * @property string $status
 * 
 * @property \App\Models\Slider $slider
 * @property \App\Models\Place $place
 * @property \App\Models\User $user
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
		'type',
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
}
