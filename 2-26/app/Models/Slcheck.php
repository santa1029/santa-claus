<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Slcheck extends Model
{
    protected $guarded = [];

    protected $casts = [
        'timelimit' => 'datetime',
    ];


}
