<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 19 Oct 2018 19:51:17 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WorksGuide
 * 
 * @property int $id
 * @property int $state_id
 * @property int $user_id
 * 
 * @property \App\Models\State $state
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class WorksGuide extends Eloquent
{
	protected $table = 'works_guide';
	public $timestamps = false;

	protected $casts = [
		'state_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'state_id',
		'user_id'
	];

	public function state()
	{
		return $this->belongsTo(\App\Models\State::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
