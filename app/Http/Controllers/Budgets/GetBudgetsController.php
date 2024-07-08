<?php

namespace App\Http\Controllers\Budgets;

use App\Http\Controllers\Controller;
use App\Http\Resources\Budgets\BudgetResource;
use App\Models\Budget;
use Illuminate\Http\Request;

class GetBudgetsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $budgets = Budget::all();

        return BudgetResource::collection($budgets);
    }
}
