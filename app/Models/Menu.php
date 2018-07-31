<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Menu
 * 
 * @property int $id
 * @property string $name
 * @property int $translate_id
 * @property string $status
 * 
 * @property \App\Models\Language $languageCrud
 * @property \Illuminate\Database\Eloquent\Collection $menu_parents
 *
 * @package App\Models
 */
class Menu extends Eloquent
{
	protected $table = 'menu';
	public $timestamps = false;

	protected $casts = [
		'translate_id' => 'int'
	];

	protected $fillable = [
		'name',
		'translate_id',
		'status'
	];

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class, 'translate_id');
	}

	public function menu_parents()
	{
		return $this->hasMany(\App\Models\MenuParent::class, 'parent_id');
	}
}
