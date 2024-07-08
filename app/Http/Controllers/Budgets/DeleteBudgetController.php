<?php

namespace App\Http\Controllers\Budgets;

use App\Exceptions\Budgets\BudgetNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Budgets\DeleteBudgetRequest;
use App\Http\Resources\Budgets\BudgetResource;
use App\Models\Budget;

class DeleteBudgetController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DeleteBudgetRequest $request)
    {
        $data = $request->validated();

        $budget = Budget::find($data['id']);

        if (!$budget) {
            throw new BudgetNotFoundException();
        }

        $budget->delete();

        return BudgetResource::make($budget);
    }
}
