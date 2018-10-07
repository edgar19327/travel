<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Sep 2018 23:17:18 +0000.
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
