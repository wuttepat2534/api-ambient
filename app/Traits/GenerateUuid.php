<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GenerateUuid
{
    public static function bootHasUuid()
    {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid();
            }
        });
    }
}
