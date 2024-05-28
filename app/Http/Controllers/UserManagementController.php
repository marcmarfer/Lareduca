<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::getUsersWithRoles();
        $userRole = auth()->user()->roles;

        return Inertia::render('UserManagement', [
            'users' => $users,
            'currentUserRole' => $userRole
        ]);
    }

    public function addUser(Request $request)
{
    $userData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role_id' => 'required'
    ]);

    $userData['password'] = Hash::make($request->password);

    $user = User::create($userData);

    $user->roles()->attach($userData['role_id']);

    return response()->json(['message' => 'User added successfully']);
}

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function deleteRole($userId)
    {
        $user = User::findOrFail($userId);
        $user->roles()->detach();

        return response()->json(['message' => 'Role deleted successfully']);
    }

    public function deleteCourseEnrollments($userId)
    {
        $user = User::findOrFail($userId);
        $user->courses()->detach();

        return response()->json(['message' => 'Course enrollments deleted successfully']);
    }
}
