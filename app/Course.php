<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
    'courseCode',
    'collegeID',
    'courseTitle',
];
    protected $primaryKey = 'courseCode';

    public function college()
    {
        $this->belongsTo('app/College');
    }
}
