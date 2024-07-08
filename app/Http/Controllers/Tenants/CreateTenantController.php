<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenants\CreateTenantRequest;
use App\Http\Resources\TenantResource;
use App\Models\Tenant;
use Exception;

class CreateTenantController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateTenantRequest $request)
    {
        $data = $request->all();

        $exists = Tenant::where('name', $data['name'])->exists();

        if ($exists) {
            throw new Exception('Tenant already exists');
        }

        $tenant = Tenant::create($data);

        return TenantResource::make($tenant);
    }
}
