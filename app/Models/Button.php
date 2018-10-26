<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 19 Oct 2018 19:47:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Button
 * 
 * @property int $id
 * @property int $status
 * 
 * @property \Illuminate\Database\Eloquent\Collection $buttone_translates
 *
 * @package App\Models
 */
class Button extends Eloquent
{
	protected $table = 'button';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'status'
	];

	public function buttone_translates()
	{
		return $this->hasMany(\App\Models\ButtoneTranslate::class);
	}
}
