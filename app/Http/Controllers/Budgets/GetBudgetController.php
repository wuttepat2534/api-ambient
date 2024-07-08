<?php

namespace App\Http\Controllers\Budgets;

use App\Exceptions\Budgets\BudgetNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Budgets\BudgetResource;
use App\Models\Budget;
use Illuminate\Http\Request;

class GetBudgetController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $uuid)
    {
        $budget = Budget::with('environments.products')
            ->where('uuid', $uuid)
            ->first();

        if (!$budget) {
            throw new BudgetNotFoundException();
        }

        return BudgetResource::make($budget);
    }
}
