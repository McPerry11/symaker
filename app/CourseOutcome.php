<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseOutcome extends Model
{
    protected $fillable = [
        'courseCode',
        'courseDescription',
    ];
}
