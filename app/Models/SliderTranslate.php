<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SliderTranslate
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $slider_id
 * @property int $lenguage_id
 * 
 * @property \App\Models\Slider $slider
 * @property \App\Models\Language $language
 *
 * @package App\Models
 */
class SliderTranslate extends Eloquent
{
	protected $table = 'slider_translate';
	public $timestamps = false;

	protected $casts = [
		'slider_id' => 'int',
		'lenguage_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'slider_id',
		'lenguage_id'
	];

	public function slider()
	{
		return $this->belongsTo(\App\Models\Slider::class);
	}

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class, 'lenguage_id');
	}
}
