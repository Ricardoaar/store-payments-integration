<?php

namespace App\Http\Controllers;

use App\Enums\PaymentGateways;

class DashboardController extends Controller
{
    public function getOrdersView()
    {
        return view('users.orders');
    }

    public function getBuyView()
    {


        return view('users.buy', ['gateways' => [
            'placetoPlay' => PaymentGateways::PLACE_TO_PAY,
            'mercadoPago' => PaymentGateways::MERCADO_PAGO,

        ]]);
    }


}
