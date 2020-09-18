<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
	protected $fillable = [
		'abbrev',
		'collegeName',
		'colorCode',
	];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
