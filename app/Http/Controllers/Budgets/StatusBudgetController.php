<?php

namespace App\Http\Controllers\Budgets;

use App\Exceptions\Budgets\BudgetNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Budgets\CreateBudgetRequest;
use App\Http\Requests\Budgets\StatusBudgetRequest;
use App\Http\Resources\Budgets\BudgetResource;
use App\Models\Budget;

class StatusBudgetController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StatusBudgetRequest $request)
    {
        $data = $request->validated();

        $budget = Budget::find($data['id']);

        if (!$budget) {
            throw new BudgetNotFoundException();
        }

        $budget->status = $data['status'];
        $budget->save();

        return BudgetResource::make($budget);
    }
}
