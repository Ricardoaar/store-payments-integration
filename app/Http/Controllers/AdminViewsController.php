<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminViewsController extends Controller
{

    public function getOrdersView()
    {
        $orders = Order::latest()->paginate();

        return view('admin.orders', compact('orders'));
    }

    public function getUsersView()
    {
        $users = User::latest()->paginate();

        return view('admin.users', compact('users'));
    }
}
