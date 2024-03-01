<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Timing extends Model
{
    use HasFactory;

    protected $casts = [
        'opentrade' => 'datetime',
      ];

    protected $guarded=[];
}
