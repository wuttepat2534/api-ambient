<?php

namespace App\Http\Controllers\Budgets;

use App\Exceptions\Environments\EnvironmentNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Budgets\DeleteEnvironmentRequest;
use App\Http\Resources\Budgets\EnvironmentResource;
use App\Models\BudgetEnvironment;

class DeleteEnvironmentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DeleteEnvironmentRequest $request)
    {
        $data = $request->validated();

        $environment = BudgetEnvironment::find($data['id']);

        if (!$environment) {
            throw new EnvironmentNotFoundException();
        }

        $environment->delete();

        return EnvironmentResource::make($environment);
    }
}
