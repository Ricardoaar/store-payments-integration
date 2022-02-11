<?php

namespace App\Http\Controllers;

use App\Actions\Orders\UpdateOrder;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function destroy(Order $order): RedirectResponse
    {
        $order->delete();
        return back()->with('success', 'Order deleted successfully');
    }

}
