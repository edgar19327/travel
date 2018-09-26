<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 24 Sep 2018 09:54:44 +0000.
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
