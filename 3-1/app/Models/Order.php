<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Order extends Model
{

    protected $table = 'MT4_TRADES';

    protected $casts = [
        'OPEN_TIME' => 'datetime',
        'CLOSE_TIME' => 'datetime',
        'MODIFY_TIME' => 'datetime',
    ];

}
