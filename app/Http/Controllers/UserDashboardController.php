<?php

namespace App\Http\Controllers;

use App\Enums\PaymentGateways;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function getOrdersView()
    {
        $orders = Order::where('customer_id', Auth::user()->id)->paginate(12);
        return view('users.orders', compact('orders'));
    }

    public function getBuyView()
    {
        return view('users.buy', ['gateways' => [
            'placetoPlay' => PaymentGateways::PLACE_TO_PAY,
            'mercadoPago' => PaymentGateways::MERCADO_PAGO,
        ]]);
    }


}
