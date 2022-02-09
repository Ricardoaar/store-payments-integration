<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function getOrdersView()
    {
        return view('users.orders');
    }

    public function getBuyView()
    {
        return view('users.buy');
    }


}
