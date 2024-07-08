<?php

namespace App\Http\Controllers\Environments;

use App\Http\Controllers\Controller;
use App\Http\Resources\EnvironmentResource;
use App\Models\Environment;
use Illuminate\Http\Request;

class GetEnvironmentsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $environments = Environment::all();

        return EnvironmentResource::collection($environments);
    }
}
