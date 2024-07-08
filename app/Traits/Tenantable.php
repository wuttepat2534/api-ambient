<?php

namespace App\Traits;

use App\Models\Scopes\TenantScope;
use App\Models\Scopes\UserScope;
use Illuminate\Support\Facades\Auth;

trait Tenantable
{
    protected static function bootTenantable()
    {
        $user = Auth::guard('sanctum')->user() ?? null;

        if ($user) {
            static::creating(function ($model) use ($user) {
                if ($user->tenant_id) {
                    $model->tenant_id = $user->tenant_id;
                }
            });
        }
    }
}
