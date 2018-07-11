<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserRating
 * 
 * @property int $id
 * @property int $user_id
 * @property int $rating_user_id
 * @property int $rating
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class UserRating extends Eloquent
{
	protected $table = 'user_rating';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'rating_user_id' => 'int',
		'rating' => 'int'
	];

	protected $fillable = [
		'user_id',
		'rating_user_id',
		'rating'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'rating_user_id');
	}
}
