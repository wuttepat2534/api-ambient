<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ConfirmController;
use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Budgets\CreateBudgetController;
use App\Http\Controllers\Budgets\CreateProductController;
use App\Http\Controllers\Budgets\DeleteBudgetController;
use App\Http\Controllers\Budgets\GetBudgetsController;
use App\Http\Controllers\Budgets\UpdateBudgetController;
use App\Http\Controllers\Budgets\CreateEnvironmentController;
use App\Http\Controllers\Budgets\DeleteEnvironmentController;
use App\Http\Controllers\Budgets\DeleteProductController;
use App\Http\Controllers\Budgets\GetBudgetController;
use App\Http\Controllers\Budgets\PriceProductController;
use App\Http\Controllers\Budgets\QuantityProductController;
use App\Http\Controllers\Budgets\StatusBudgetController;
use App\Http\Controllers\Budgets\UpdateEnvironmentController;
use App\Http\Controllers\Register\RegisterController;
use App\Http\Controllers\Users\CreateUserController;
use App\Http\Controllers\Users\DeleteUserController;
use App\Http\Controllers\Users\GetUsersController;
use App\Http\Controllers\Users\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'Ambient Plus API is running!']);
});

Route::post('/register', RegisterController::class);

Route::post('/login', LoginController::class);
Route::post('/confirm', ConfirmController::class);
Route::post('/forgot', ForgotController::class);
Route::post('/password', PasswordController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth', AuthController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/budgets', GetBudgetsController::class);
    Route::get('/budgets/{uuid}', GetBudgetController::class);
    Route::post('/budgets/create', CreateBudgetController::class);
    Route::post('/budgets/update', UpdateBudgetController::class);
    Route::post('/budgets/delete', DeleteBudgetController::class);
    Route::post('/budgets/status', StatusBudgetController::class);
    Route::post('/budgets/environments/create', CreateEnvironmentController::class);
    Route::post('/budgets/environments/update', UpdateEnvironmentController::class);
    Route::post('/budgets/environments/delete', DeleteEnvironmentController::class);
    Route::post('/budgets/products/create', CreateProductController::class);
    Route::post('/budgets/products/quantity', QuantityProductController::class);
    Route::post('/budgets/products/price', PriceProductController::class);
    Route::post('/budgets/products/delete', DeleteProductController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', GetUsersController::class);
    Route::post('/users', CreateUserController::class);
    Route::put('/users/{id}', UpdateUserController::class);
    Route::delete('/users/{id}', DeleteUserController::class);
});
