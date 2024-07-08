<?php

namespace App\Http\Controllers\Budgets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Budgets\CreateBudgetRequest;
use App\Http\Resources\Budgets\BudgetResource;
use App\Models\Budget;

class UpdateBudgetController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateBudgetRequest $request)
    {
        $data = $request->validated();

        $budget = Budget::create($data);

        return BudgetResource::make($budget);
    }
}
