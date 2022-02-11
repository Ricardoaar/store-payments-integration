<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatusses;
use App\Factories\Payment\PaymentGatewayFactory;
use App\Models\Order;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * @throws Exception
     */
    public function createPayment(Request $request, string $gateway)
    {

        $data = [
            'reference' => $request->user()->id . '-' . time(),
            'description' => $request->description ?? 'Buy Generic T-shirt',
            'currency' => $request->currency ?? 'USD',
            'total' => $request->total ?? 150,
            'ipAddress' => request()->ip(),
            'userAgent' => request()->header('User-agent'),
        ];
        $gateway = PaymentGatewayFactory::getInstance($gateway);

        $url = $gateway->createPayment($data);
        return redirect($url);
    }

    /**
     * @throws Exception
     */
    public function checkPayment(string $gateway, string $requestId): RedirectResponse
    {
        $gateway = PaymentGatewayFactory::getInstance($gateway);

        $gateway->checkPayStatus($requestId);

        return back();
    }


    /**
     * @throws Exception
     */
    public function retryPayment(Request $request, string $gateway, Order $order)
    {

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
        $gateway = PaymentGatewayFactory::getInstance($gateway);

        $url = $gateway->createPayment($data);

        return redirect($url);
    }


}

