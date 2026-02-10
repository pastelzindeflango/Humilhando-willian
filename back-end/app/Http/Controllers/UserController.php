<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Users list']);
    }

    public function store(Request $request)
    {
        return response()->json(['message' => 'User created'], 201);
    }

    public function show($id)
    {
        return response()->json(['id' => $id, 'name' => 'User Name']);
    }

    public function update(Request $request, $id)
    {
        return response()->json(['message' => 'User updated']);
    }

    public function destroy($id)
    {
        return response()->json(['message' => 'User deleted']);
    }
}
