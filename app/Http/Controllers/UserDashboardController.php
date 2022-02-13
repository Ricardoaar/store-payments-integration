<?php

namespace App\Http\Controllers;

use App\Enums\PaymentGateways;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function getBuyView()
    {
        return view('users.store', ['gateways' => [
            'placetoPlay' => PaymentGateways::PLACE_TO_PAY,
            'mercadoPago' => PaymentGateways::MERCADO_PAGO,
        ]]);
    }
}
