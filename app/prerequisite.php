<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prerequisite extends Model
{
	protected $fillable = [
		'courseCode',
		'prerequisites',
	];
}
