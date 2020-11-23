<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherContent extends Model
{
    protected $table = 'other_content';
    protected $fillable = [
        'title',
        'content',
        'type',
    ];
}
