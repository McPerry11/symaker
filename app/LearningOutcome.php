<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearningOutcome extends Model
{
	protected $table = 'learning_outcome';
	protected $fillable = [
		'id',
		'learningOutcomeDescription',
	];
}
