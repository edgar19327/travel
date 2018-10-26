<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 19 Oct 2018 19:47:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PlaceTranslate
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $place_id
 * @property int $language_id
 * 
 * @property \App\Models\Place $place
 * @property \App\Models\Language $language
 *
 * @package App\Models
 */
class PlaceTranslate extends Eloquent
{
	protected $table = 'place_translate';
	public $timestamps = false;

	protected $casts = [
		'place_id' => 'int',
		'language_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'place_id',
		'language_id'
	];

	public function place()
	{
		return $this->belongsTo(\App\Models\Place::class);
	}

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class);
	}
}
