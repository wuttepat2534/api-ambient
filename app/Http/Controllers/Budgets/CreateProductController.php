<?php

namespace App\Http\Controllers\Budgets;

use App\Exceptions\Budgets\BudgetNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Budgets\CreateProductRequest;
use App\Http\Resources\Budgets\ProductResource;
use App\Models\Budget;
use App\Models\BudgetProduct;

class CreateProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateProductRequest $request)
    {
        $data = $request->validated();

        $budget = Budget::find($data['budget_id']);

        if (!$budget) {
            throw new BudgetNotFoundException();
        }

        $product = BudgetProduct::where('budget_id', $data['budget_id'])
            ->where('code', $data['code'])
            ->first();

        if ($product) {
            $product->quantity += $data['quantity'];
            $product->environment_id = $data['environment_id'];
            $product->save();
        } else {
            $product = BudgetProduct::create($data);
        }

        return ProductResource::make($product);
    }
}
