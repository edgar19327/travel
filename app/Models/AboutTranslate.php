<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Sep 2018 23:17:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AboutTranslate
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $about_id
 * @property int $language_id
 * @property string $type
 * 
 * @property \App\Models\About $about
 * @property \App\Models\Language $language
 *
 * @package App\Models
 */
class AboutTranslate extends Eloquent
{
	protected $table = 'about_translate';
	public $timestamps = false;

	protected $casts = [
		'about_id' => 'int',
		'language_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'about_id',
		'language_id',
		'type'
	];

	public function about()
	{
		return $this->belongsTo(\App\Models\About::class);
	}

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class);
	}
}
