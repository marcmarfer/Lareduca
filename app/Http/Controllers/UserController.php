<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Inertia\Inertia;

class UserController extends Controller
{
    public function update(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->update($request->all());
        return redirect()->back()->with('success', 'Usuario actualizado correctamente');
    }

    public function getUserLoggedIn()
    {
        $user = auth()->user();
        return response()->json($user);
    }
}
