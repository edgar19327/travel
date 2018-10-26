<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 19 Oct 2018 19:47:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ButtoneTranslate
 * 
 * @property int $id
 * @property string $name
 * @property int $button_id
 * @property int $language_id
 * 
 * @property \App\Models\Button $button
 * @property \App\Models\Language $language
 *
 * @package App\Models
 */
class ButtoneTranslate extends Eloquent
{
	protected $table = 'buttone_translate';
	public $timestamps = false;

	protected $casts = [
		'button_id' => 'int',
		'language_id' => 'int'
	];

	protected $fillable = [
		'name',
		'button_id',
		'language_id'
	];

	public function button()
	{
		return $this->belongsTo(\App\Models\Button::class);
	}

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class);
	}
}
