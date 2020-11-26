<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitutionalOutcome extends Model
{
	protected $table = 'institutional_outcome';
	protected $fillable = [
		'content',
		'type',
	];
}
