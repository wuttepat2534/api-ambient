<?php

namespace App\Models;

use App\Enums\Budgets\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'title',
        'description',
        'user_id',
        'tenant_id',
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    protected static function booted()
    {
        $user = auth()->user();

        static::addGlobalScope('user', function ($builder) use ($user) {
            $builder->where('user_id', $user->id);
            $builder->where('tenant_id', $user->tenant_id);
        });

        static::creating(function ($model) use ($user) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid();
            }

            $model->user_id = $user->id;
            $model->tenant_id = $user->tenant_id;
        });
    }

    public function products()
    {
        return $this->hasMany(BudgetProduct::class);
    }

    public function environments()
    {
        return $this->hasMany(BudgetEnvironment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
