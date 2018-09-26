<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 24 Sep 2018 09:54:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Menu
 * 
 * @property int $id
 * @property string $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $menu_parents
 *
 * @package App\Models
 */
class Menu extends Eloquent
{
	protected $table = 'menu';
	public $timestamps = false;

	protected $fillable = [
		'status'
	];

	public function menu_parents()
	{
		return $this->hasMany(\App\Models\MenuParent::class);
	}
}
