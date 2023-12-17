<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('id')->get();
        return response()->json($users);
    }

    public function show(User $user) {
        $users = User::find($user);
        if (!$users) {
            return response()->json([
                'message' => 'User not found'
            ]);
        }
        return response()->json([
            'user' => $user
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = User::create($request->all());
        return response()->json([
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string'
        ]);

        $user->update($fields);

        return response()->json([
            'status' => "OK",
            'message' => 'Client with ID# ' .$user->id . ' has been updated'
        ]);
    }

    public function destroy(User $user) {
        $details = $user->name;
        $user->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'Client with the name ' .$details . ' has been deleted'
        ]);
    }
}
