<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserTranslate
 * 
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $description
 * @property int $user_id
 * @property int $language_id
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Language $languageCrud
 *
 * @package App\Models
 */
class UserTranslate extends Eloquent
{
	protected $table = 'user_translate';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'language_id' => 'int'
	];

	protected $fillable = [
		'name',
		'surname',
		'description',
		'user_id',
		'language_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class);
	}
}
