<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(8);

        return view('admin.users', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.user', compact('user'));
    }
}
