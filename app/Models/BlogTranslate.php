<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 15:04:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BlogTranslate
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $lenguage_id
 * @property int $blog_id
 * 
 * @property \App\Models\Language $languageCrud
 * @property \App\Models\Blog $blog
 *
 * @package App\Models
 */
class BlogTranslate extends Eloquent
{
	protected $table = 'blog_translate';
	public $timestamps = false;

	protected $casts = [
		'lenguage_id' => 'int',
		'blog_id' => 'int',
        'place_id' => 'int',

    ];

	protected $fillable = [
		'title',
		'description',
		'lenguage_id',
        'place_id',
		'blog_id'
	];


	public function language()
	{
		return $this->belongsTo(\App\Models\Language::class, 'lenguage_id');
	}

	public function blog()
	{
		return $this->belongsTo(\App\Models\Blog::class);
	}
    public function place()
    {
        return $this->belongsTo(\App\Models\Place::class);
    }
}
