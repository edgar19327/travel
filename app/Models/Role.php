<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property string $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $permissions
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Role extends Eloquent
{
	protected $table = 'role';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'status'
	];

	public function permissions()
	{
		return $this->belongsToMany(\App\Models\Permission::class, 'role_permission');
	}

	public function users()
	{
		return $this->hasMany(\App\Models\User::class);
	}
}
