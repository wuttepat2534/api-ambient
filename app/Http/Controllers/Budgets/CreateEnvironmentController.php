<?php

namespace App\Http\Controllers\Budgets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Environments\CreateEnvironmentRequest;
use App\Http\Resources\Budgets\EnvironmentResource;
use App\Models\BudgetEnvironment;

class CreateEnvironmentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateEnvironmentRequest $request)
    {
        $data = $request->validated();

        $environment = BudgetEnvironment::create($data);

        return EnvironmentResource::make($environment);
    }
}
