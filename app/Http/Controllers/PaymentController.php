<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatusses;
use App\Factories\Payment\PaymentGatewayFactory;
use App\Models\Order;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * @throws Exception
     */


    public function createPayment(Request $request, string $gateway)
    {

        $request->validate([
            'description' => 'required|min:15',
        ]);

        $total = Auth::user()->currentCart->total;
        $data = [
            'reference' => $request->user()->id . '-' . time(),
            'description' => $request->description,
            'currency' => 'USD',
            'total' => $total,
            'ipAddress' => request()->ip(),
            'userAgent' => request()->header('User-agent'),
        ];
        $gateway = PaymentGatewayFactory::getInstance($gateway);
        $url = $gateway->createPayment($data);


        CartController::createCart();
        if (is_string($url)) {
            return redirect($url);
        }
        return back()->withErrors($url);
    }


    /**
     * @param string $gateway
     * @param string $requestId
     * @return RedirectResponse
     */
    public function checkPayment(string $gateway, string $requestId): RedirectResponse
    {
        try {
            $gateway = PaymentGatewayFactory::getInstance($gateway);
        } catch (Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }

        $gateway->checkPayStatus($requestId);
        return back();
    }


    /**
     * @param Request $request
     * @param string $gateway
     * @param Order $order
     * @return Application|RedirectResponse|Redirector
     */
    public function retryPayment(Request $request, string $gateway, Order $order)
    {
        try {
            $gateway = PaymentGatewayFactory::getInstance($gateway);
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }


        $gateway->checkPayStatus($order->request_id);

        if ($order->status === PaymentStatusses::CREATED) {
            return redirect($order->payment_url);
        }

        $data = [
            'reference' => $request->user()->id . '-' . time(),
            'description' => $order->description,
            'currency' => $order->currency ?? 'USD',
            'total' => $order->total,
            'ipAddress' => request()->ip(),
            'userAgent' => request()->header('User-agent'),
        ];
        $url = $gateway->createPayment($data);
        if (is_string($url)) {
            $order->delete();
            return redirect($url);
        }
        return back()->withErrors($url);
    }
}
