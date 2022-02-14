<?php

namespace App\Http\Controllers;

use App\Enums\PaymentGateways;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function getBuyView()
    {
        $products = Product::orderBy('id', 'asc')->get();

        return view('users.store', ['gateways' => [
            'placetoPlay' => PaymentGateways::PLACE_TO_PAY,
            'mercadoPago' => PaymentGateways::MERCADO_PAGO,
        ],
            'products' => $products,
        ]);
    }
}
