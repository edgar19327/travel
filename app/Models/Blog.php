<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 24 Sep 2018 09:54:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Blog
 * 
 * @property int $id
 * 
 * @property \Illuminate\Database\Eloquent\Collection $blog_translates
 *
 * @package App\Models
 */
class Blog extends Eloquent
{
	protected $table = 'blog';
	public $timestamps = false;

	public function blog_translates()
	{
		return $this->hasMany(\App\Models\BlogTranslate::class);
	}
}
