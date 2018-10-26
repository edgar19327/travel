<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 19 Oct 2018 19:47:05 +0000.
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
