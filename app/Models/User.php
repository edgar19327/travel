<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property int $numbere
 * @property string $email
 * @property string $password
 * @property string $location
 * @property int $role_id
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $images
 * @property \Illuminate\Database\Eloquent\Collection $rating_places
 * @property \Illuminate\Database\Eloquent\Collection $user_ratings
 * @property \Illuminate\Database\Eloquent\Collection $user_translates
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $casts = [
		'numbere' => 'int',
		'role_id' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'surname',
		'numbere',
		'email',
		'password',
		'location',
		'role_id',
		'remember_token'
	];

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class);
	}

	public function images()
	{
		return $this->hasMany(\App\Models\Image::class);
	}

	public function rating_places()
	{
		return $this->hasMany(\App\Models\RatingPlace::class, 'users_id');
	}

	public function user_ratings()
	{
		return $this->hasMany(\App\Models\UserRating::class, 'rating_user_id');
	}

	public function user_translates()
	{
		return $this->hasMany(\App\Models\UserTranslate::class);
	}
}
