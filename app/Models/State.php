<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class State
 * 
 * @property int $id
 * @property string $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $places
 * @property \Illuminate\Database\Eloquent\Collection $state_translates
 *
 * @package App\Models
 */
class State extends Eloquent
{
	protected $table = 'state';
	public $timestamps = false;

	protected $fillable = [
		'status'
	];

	public function places()
	{
		return $this->hasMany(\App\Models\Place::class);
	}

	public function state_translates()
	{
		return $this->hasMany(\App\Models\StateTranslate::class);
	}
}
