<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MenuParent
 * 
 * @property int $id
 * @property int $parent_id
 * @property string $childe_name
 * 
 * @property \App\Models\Menu $menu
 *
 * @package App\Models
 */
class MenuParent extends Eloquent
{
	protected $table = 'menu_parent';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int'
	];

	protected $fillable = [
		'parent_id',
		'childe_name'
	];

	public function menu()
	{
		return $this->belongsTo(\App\Models\Menu::class, 'parent_id');
	}
}
