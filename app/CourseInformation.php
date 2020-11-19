<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseInformation extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'courseCode',
        'courseTitle',
        'lectureUnits',
        'laboratoryUnits',
        'courseDescription',
    ];
    protected $primaryKey = 'courseCode';
}
