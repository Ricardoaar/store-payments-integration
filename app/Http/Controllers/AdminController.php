<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function getOrdersView()
    {
        $orders = Order::all();

        return view('admin.orders', compact('orders'));
    }

    public function getUsersView()
    {

        return view('admin.users');
    }
}
