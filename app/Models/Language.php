<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Language
 * 
 * @property int $id
 * @property string $code
 * @property string $translation
 * @property int $image_id
 * 
 * @property \App\Models\Image $image
 * @property \Illuminate\Database\Eloquent\Collection $blog_translates
 * @property \Illuminate\Database\Eloquent\Collection $menus
 * @property \Illuminate\Database\Eloquent\Collection $place_translates
 * @property \Illuminate\Database\Eloquent\Collection $slider_translates
 * @property \Illuminate\Database\Eloquent\Collection $state_translates
 * @property \Illuminate\Database\Eloquent\Collection $user_translates
 *
 * @package App\Models
 */
class Language extends Eloquent
{
	protected $table = 'language';
	public $timestamps = false;

	protected $casts = [
		'image_id' => 'int'
	];

	protected $fillable = [
		'code',
		'translation',
		'image_id'
	];

	public function image()
	{
		return $this->belongsTo(\App\Models\Image::class);
	}

	public function blog_translates()
	{
		return $this->hasMany(\App\Models\BlogTranslate::class, 'lenguage_id');
	}

	public function menus()
	{
		return $this->hasMany(\App\Models\Menu::class, 'translate_id');
	}

	public function place_translates()
	{
		return $this->hasMany(\App\Models\PlaceTranslate::class);
	}

	public function slider_translates()
	{
		return $this->hasMany(\App\Models\SliderTranslate::class, 'lenguage_id');
	}

	public function state_translates()
	{
		return $this->hasMany(\App\Models\StateTranslate::class);
	}

	public function user_translates()
	{
		return $this->hasMany(\App\Models\UserTranslate::class);
	}
}
