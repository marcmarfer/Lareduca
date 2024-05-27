<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
}
