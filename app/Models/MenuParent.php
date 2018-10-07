<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Sep 2018 23:17:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MenuParent
 * 
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $parent_id
 * @property int $translate_id
 * @property int $menu_id
 * 
 * @property \App\Models\Menu $menu
 * @property \App\Models\Language $language
 *
 * @package App\Models
 */
class MenuParent extends Eloquent
{
	protected $table = 'menu_parent';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'translate_id' => 'int',
		'menu_id' => 'int'
	];

	protected $fillable = [
		'name',
		'url',
		'parent_id',
		'translate_id',
		'menu_id'
	];

	public function menu()
	{
		return $this->belongsTo(\App\Models\Menu::class);
	}

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class, 'translate_id');
	}
}
