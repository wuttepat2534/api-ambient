<?php

namespace App\Http\Controllers\Register;

use App\Exceptions\Auth\UserEmailAlreadyExistException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Invoice;
use App\Models\Subscription;
use App\Models\Tenant;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();

        if (User::where('email', $data['email'])->exists()) {
            throw new UserEmailAlreadyExistException();
        }

        DB::beginTransaction();

        try {
            $tenant = Tenant::create([
                'name' => $data['company'],
                'plan_id' => 1,
            ]);

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' => 'admin',
                'tenant_id' => $tenant->id,
            ]);

            $subscription = Subscription::create([
                'expires_at' => now()->addDays(7),
                'plan_id' => $data['plan_id'],
                'status' => 'trial',
                'tenant_id' => $tenant->id,
            ]);

            Invoice::create([
                'due_date' => now()->addDays(7),
                'amount' => $subscription->plan->price,
                'tenant_id' => $tenant->id,
            ]);

            DB::commit();

            return new UserResource($user);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
