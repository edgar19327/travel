<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Sep 2018 23:17:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RatingPlace
 * 
 * @property int $id
 * @property int $rating
 * @property int $users_id
 * @property int $place_id
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Place $place
 *
 * @package App\Models
 */
class RatingPlace extends Eloquent
{
	protected $table = 'rating_place';
	public $timestamps = false;

	protected $casts = [
		'rating' => 'int',
		'users_id' => 'int',
		'place_id' => 'int'
	];

	protected $fillable = [
		'rating',
		'users_id',
		'place_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'users_id');
	}

	public function place()
	{
		return $this->belongsTo(\App\Models\Place::class);
	}
}
