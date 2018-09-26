<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 24 Sep 2018 09:54:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CategoryTranslate
 * 
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property int $translate_id
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\Language $language
 *
 * @package App\Models
 */
class CategoryTranslate extends Eloquent
{
	protected $table = 'category_translate';
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int',
		'translate_id' => 'int'
	];

	protected $fillable = [
		'name',
		'category_id',
		'translate_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class, 'translate_id');
	}
}
