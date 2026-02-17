<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return response()->json(Course::with('plan')->get());
    }

    protected function userFromToken(Request $request)
    {
        $token = $request->bearerToken() ?: $request->query('api_token');
        return $token ? User::where('api_token', $token)->first() : null;
    }

    public function complete(Request $request, Course $course)
    {
        $user = $this->userFromToken($request);
        if (! $user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user->courses()->syncWithoutDetaching([$course->id => ['completed_at' => now()]]);

        return response()->json(['message' => 'Completed', 'course' => $course]);
    }
}
