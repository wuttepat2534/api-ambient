<?php

namespace App\Models;

use App\Enums\Subscriptions\Period;
use App\Enums\Subscriptions\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'expires_at',
        'status',
        'period',
        'active',
        'user_id',
        'plan_id',
        'tenant_id',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'period' => Period::class,
        'status' => Status::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
