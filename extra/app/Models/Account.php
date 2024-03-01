<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'sl_breach_expiration' => 'datetime',
        'risk_breach_expiration' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function condition(): HasOne {
        return $this->hasOne(Condition::class, 'conditions', 'conditions');
    }

    public function dailybalance(): HasMany {
        return $this->hasMany(Dailybalance::class);
    }

    public function eombalance(): HasMany {
        return $this->hasMany(Eombalance::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}