<?php

namespace App\Http\Controllers;

use App\Factories\Payment\PaymentGatewayFactory;
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
        $gateway = PaymentGatewayFactory::getInstance($gateway);

        $data = [
            'reference' => $request->user()->id . '-' . time(),
            'description' => $request->description,
            'currency' => $request->currency ?? 'USD',
            'total' => $request->total,
            'ipAddress' => request()->ip(),
            'userAgent' => request()->header('User-agent'),
        ];
        $gateway->createPayment($data);


    }

    /**
     * @throws Exception
     */
    public function checkPayment(Request $request, string $gateway, string $requestId): RedirectResponse
    {
        $gateway = PaymentGatewayFactory::getInstance($gateway);
        $gateway->checkPayStatus($requestId);
        return back();
    }

}
