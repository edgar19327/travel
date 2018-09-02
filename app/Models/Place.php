<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Place
 * 
 * @property int $id
 * @property string $location
 * @property int $state_id
 * @property int $price
 * 
 * @property \App\Models\State $state
 * @property \Illuminate\Database\Eloquent\Collection $blogs
 * @property \Illuminate\Database\Eloquent\Collection $images
 * @property \Illuminate\Database\Eloquent\Collection $place_translates
 * @property \Illuminate\Database\Eloquent\Collection $rating_places
 *
 * @package App\Models
 */
class Place extends Eloquent
{
	protected $table = 'place';
	public $timestamps = false;

	protected $casts = [
		'state_id' => 'int',
		'price' => 'int'
	];

	protected $fillable = [
		'location',
		'state_id',
		'price'
	];

	public function state()
	{
		return $this->belongsTo(\App\Models\State::class);
	}



	public function images()
	{
		return $this->hasMany(\App\Models\Image::class);
	}

	public function place_translates()
	{
		return $this->hasMany(\App\Models\PlaceTranslate::class);
	}

	public function rating_places()
	{
		return $this->hasMany(\App\Models\RatingPlace::class);
	}

}
