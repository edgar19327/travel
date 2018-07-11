<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RolePermission
 * 
 * @property int $role_id
 * @property int $permission_id
 * 
 * @property \App\Models\Role $role
 * @property \App\Models\Permission $permission
 *
 * @package App\Models
 */
class RolePermission extends Eloquent
{
	protected $table = 'role_permission';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'role_id' => 'int',
		'permission_id' => 'int'
	];

	protected $fillable = [
		'role_id',
		'permission_id'
	];

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class);
	}

	public function permission()
	{
		return $this->belongsTo(\App\Models\Permission::class);
	}
}
