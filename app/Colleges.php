<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colleges extends Model
{
    protected $fillable = [
        'Abbrev', 'collegeName','colorCode',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
