<?php

namespace App\Http\Controllers\Budgets;

use App\Exceptions\Budgets\BudgetNotFoundException;
use App\Exceptions\Budgets\EnvironmentNotFoundException;
use App\Exceptions\Budgets\ProductNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Budgets\QuantityProductRequest;
use App\Http\Resources\Budgets\ProductResource;
use App\Models\Budget;
use App\Models\BudgetProduct;

class QuantityProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(QuantityProductRequest $request)
    {
        $data = $request->validated();

        $budget = Budget::find($data['budget_id']);

        if (!$budget) {
            throw new BudgetNotFoundException();
        }

        if (isset($data['environment_id'])) {
            $environment = $budget->environments()->where('id', $data['environment_id'])->first();

            if (!$environment) {
                throw new EnvironmentNotFoundException();
            }

            $product = $environment->products()->find($data['id']);

            if (!$product) {
                throw new ProductNotFoundException();
            }
        } else {
            $product = $budget->products()->find($data['id']);

            if (!$product) {
                throw new ProductNotFoundException();
            }
        }

        $product->quantity = $data['quantity'];
        $product->save();

        return ProductResource::make($product);
    }
}
