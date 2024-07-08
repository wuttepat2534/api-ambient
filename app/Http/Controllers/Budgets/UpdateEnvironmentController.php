<?php

namespace App\Http\Controllers\Budgets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Budgets\UpdateEnvironmentRequest;
use App\Http\Resources\Budgets\EnvironmentResource;
use App\Models\BudgetEnvironment;

class UpdateEnvironmentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateEnvironmentRequest $request)
    {
        $data = $request->validated();

        $environment = BudgetEnvironment::create($data);

        return EnvironmentResource::make($environment);
    }
}
