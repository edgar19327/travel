<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StateTranslate
 * 
 * @property int $id
 * @property string $name
 * @property int $state_id
 * @property int $language_id
 * 
 * @property \App\Models\State $state
 * @property \App\Models\Language $language
 *
 * @package App\Models
 */
class StateTranslate extends Eloquent
{
	protected $table = 'state_translate';
	public $timestamps = false;

	protected $casts = [
		'state_id' => 'int',
		'language_id' => 'int'
	];

	protected $fillable = [
		'name',
		'state_id',
		'language_id'
	];

	public function state()
	{
		return $this->belongsTo(\App\Models\State::class);
	}

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class);
	}

}
