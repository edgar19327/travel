<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Sep 2018 23:17:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Permission
 * 
 * @property int $id
 * @property string $controller_name
 * @property string $method_name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $roles
 *
 * @package App\Models
 */
class Permission extends Eloquent
{
	protected $table = 'permission';
	public $timestamps = false;

	protected $fillable = [
		'controller_name',
		'method_name'
	];

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class, 'role_permission');
	}
}
