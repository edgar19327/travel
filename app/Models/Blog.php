<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 19 Oct 2018 19:47:05 +0000.
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
