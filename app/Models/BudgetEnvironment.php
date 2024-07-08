<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetEnvironment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'budget_id',
        'user_id',
        'tenant_id',
    ];

    protected static function booted()
    {
        $user = auth()->user();

        static::addGlobalScope('user', function ($builder) use ($user) {
            $builder->where('user_id', $user->id);
            $builder->where('tenant_id', $user->tenant_id);
        });

        static::creating(function ($model) use ($user) {
            $model->user_id = $user->id;
            $model->tenant_id = $user->tenant_id;
        });
    }

    public function products()
    {
        return $this->hasMany(BudgetProduct::class, 'environment_id');
    }
}
