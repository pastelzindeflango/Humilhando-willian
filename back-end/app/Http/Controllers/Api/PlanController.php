<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        return response()->json(Plan::with('courses')->get());
    }

    protected function userFromToken(Request $request)
    {
        $token = $request->bearerToken() ?: $request->query('api_token');
        return $token ? User::where('api_token', $token)->first() : null;
    }

    public function purchase(Request $request, Plan $plan)
    {
        $user = $this->userFromToken($request);
        if (! $user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user->plans()->syncWithoutDetaching([$plan->id => ['purchased_at' => now()]]);

        return response()->json(['message' => 'Purchased', 'plan' => $plan]);
    }
}
