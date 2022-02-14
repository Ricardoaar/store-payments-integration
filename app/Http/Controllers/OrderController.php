<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatusses;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $orders = Order::latest()->paginate(12);
        } else {
            $orders = $user->orders()->paginate(12);
        }
        return view('orders.index', compact('orders'));
    }

    function destroy(Order $order): RedirectResponse
    {
        $order->delete();
        return back()->with('success', 'Order deleted successfully');
    }

    function show(Order $order)
    {
        if ($order->status == PaymentStatusses::CREATED) {
            (new PaymentController())->checkPayment($order->gateway, $order->request_id);
        }

        return view('orders.show', compact('order'));
    }
}
