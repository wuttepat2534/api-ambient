<?php

namespace App\Http\Controllers\Budgets;

use App\Exceptions\Budgets\ProductNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Budgets\DeleteProductRequest;
use App\Http\Resources\Budgets\EnvironmentResource;
use App\Models\BudgetEnvironment;
use App\Models\BudgetProduct;

class DeleteProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DeleteProductRequest $request)
    {
        $data = $request->validated();

        $product = BudgetProduct::find($data['id']);

        if (!$product) {
            throw new ProductNotFoundException();
        }

        $product->delete();

        return EnvironmentResource::make($product);
    }
}
