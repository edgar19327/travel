<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 19 Oct 2018 19:47:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Language
 * 
 * @property int $id
 * @property string $code
 * @property string $translation
 * @property int $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $about_translates
 * @property \Illuminate\Database\Eloquent\Collection $blog_translates
 * @property \Illuminate\Database\Eloquent\Collection $buttone_translates
 * @property \Illuminate\Database\Eloquent\Collection $category_translates
 * @property \Illuminate\Database\Eloquent\Collection $menu_parents
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
		'status' => 'int'
	];

	protected $fillable = [
		'code',
		'translation',
		'status'
	];

	public function about_translates()
	{
		return $this->hasMany(\App\Models\AboutTranslate::class);
	}

	public function blog_translates()
	{
		return $this->hasMany(\App\Models\BlogTranslate::class, 'lenguage_id');
	}

	public function buttone_translates()
	{
		return $this->hasMany(\App\Models\ButtoneTranslate::class);
	}

	public function category_translates()
	{
		return $this->hasMany(\App\Models\CategoryTranslate::class, 'translate_id');
	}

	public function menu_parents()
	{
		return $this->hasMany(\App\Models\MenuParent::class, 'translate_id');
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
