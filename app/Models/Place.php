<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 24 Sep 2018 09:54:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Place
 * 
 * @property int $id
 * @property string $location
 * @property int $state_id
 * 
 * @property \App\Models\State $state
 * @property \Illuminate\Database\Eloquent\Collection $blog_translates
 * @property \Illuminate\Database\Eloquent\Collection $categories
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
		'state_id' => 'int'
	];

	protected $fillable = [
		'location',
		'state_id'
	];

	public function state()
	{
		return $this->belongsTo(\App\Models\State::class);
	}

	public function blog_translates()
	{
		return $this->hasMany(\App\Models\BlogTranslate::class);
	}

	public function categories()
	{
		return $this->belongsToMany(\App\Models\Category::class)
					->withPivot('id');
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
