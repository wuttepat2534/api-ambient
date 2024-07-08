<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'stock',
        'price',
        'tenant_id',
    ];

    protected static function booted()
    {
        $user = auth()->user();

        if ($user) {
            static::addGlobalScope('user', function ($builder) use ($user) {
                $builder->where('tenant_id', $user->tenant_id);
            });

            static::creating(function ($model) use ($user) {
                $model->tenant_id = $user->tenant_id;
            });
        }
    }

    public function media()
    {
        return $this->hasOne(ProductMedia::class, 'code', 'code');
    }

    // public function getPriceAttribute($value)
    // {
    //     return ($value / 100);
    // }

    // public function setPriceAttribute($value)
    // {
    //     $this->attributes['price'] = $value * 100;
    // }
}
