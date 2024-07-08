<?php

namespace App\Http\Controllers\Budgets;

use App\Exceptions\Budgets\BudgetNotFoundException;
use App\Exceptions\Budgets\EnvironmentNotFoundException;
use App\Exceptions\Budgets\ProductNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Budgets\PriceProductRequest;
use App\Http\Resources\Budgets\ProductResource;
use App\Models\Budget;

class PriceProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(PriceProductRequest $request)
    {
        $data = $request->validated();

        $budget = Budget::find($data['budget_id']);

        if (!$budget) {
            throw new BudgetNotFoundException();
        }

        // if (isset($data['environment_id'])) {
        //     $environment = $budget->environments()->where('id', $data['environment_id'])->first();

        //     if (!$environment) {
        //         throw new EnvironmentNotFoundException();
        //     }

        //     $product = $environment->products()->find($data['id']);

        //     if (!$product) {
        //         throw new ProductNotFoundException();
        //     }
        // } else {
        //     $product = $budget->products()->find($data['id']);

        //     if (!$product) {
        //         throw new ProductNotFoundException();
        //     }
        // }

        // $products = BudgetProduct::where('budget_id', $budget->id)
        //     ->where('code', $data['code'])
        //     ->get();

        $products = $budget->products()->where('code', $data['code'])->get();

        $products->each(function ($product) use ($data) {
            $product->price = $data['price'] * 100;
            $product->save();
        });

        // $product->price = $data['price'];
        // $product->save();

        //return ProductResource::make($product);
    }
}
