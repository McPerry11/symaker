<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RCM extends Model
{
    protected $keyType = 'string';
    protected $table = 'rcm';
    public $incrementing = false;
    protected $fillable = [
        'courseCode',
        'textbook',
        'otherReferences',
        'gradingSystem',
        'courseRequirements',
        'classroomPolicy',
        'consultationHours'
    ];
    protected $primaryKey = 'courseCode';
}
