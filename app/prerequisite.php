<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prerequisite extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'courseCode',
        'prerequisites',
    ];
    protected $primaryKey = 'courseCode';
}
