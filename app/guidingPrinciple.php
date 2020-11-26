<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuidingPrinciple extends Model
{
	protected $table = 'guiding_principle';
	protected $fillable = [
		'content',
		'type',
	];
}
