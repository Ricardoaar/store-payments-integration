<?php

namespace App\Factories\Payment;


use App\Enums\PaymentStatusses;
use App\Enums\PlaceToPayStatusses;
use App\Models\Order;
use App\Util\CredentialsMaker;
use Dflydev\DotAccessData\Data;
use Exception;
use App\Factories\Payment\Interfaces\IPayment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PlaceToPay implements IPayment
{


    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('PLACE2_PAY_BASE_URL');
    }


    public
    function retryPayment()
    {
        // TODO: Implement retryPayment() method.
    }

    public
    function cancelPayment()
    {
        // TODO: Implement cancelPayment() method.
    }


    public function checkPayStatus(string $requestId)
    {
        $endpoint = "api/session/$requestId";
        $data = $this->getAuthData();
        $status = Http::withHeaders(['content-type' => 'application/json'])
            ->post($this->baseUrl . $endpoint,
                ['auth' => $data]);
        switch ($status->json()['status']) {
            case PlaceToPayStatusses::APPROVED:
                $status = PaymentStatusses::PAYED;
                break;
            case PlaceToPayStatusses::REJECTED:
                $status = PaymentStatusses::REJECTED;
                break;
            default:
                $status = PaymentStatusses::CREATED;
                break;
        }

        Order::where('request_id', $requestId)->update(['status' => $status]);

    }

    private
    function getAuthData(): array
    {
        $seed = CredentialsMaker::getSeed();
        $originalNonce = CredentialsMaker::createNonce(16);
        $nonce = base64_encode($originalNonce);
        $tranKey = env('PLACE2_PAY_TRANS_KEY');

        $tranKey = base64_encode(sha1($originalNonce . $seed . $tranKey, true));

        $login = env('PLACE2_PAY_LOGIN');
        return [
            "login" => $login,
            "tranKey" => $tranKey,
            "nonce" => $nonce,
            "seed" => $seed
        ];
    }

    /**
     * @throws Exception
     */
    public
    function createPayment(array $data): RedirectResponse
    {
        $endpoint = 'api/session/';
        $auth = $this->getAuthData();

        $payment = [
            "reference" => $data['reference'],
            "description" => $data['description'],
            "amount" => [
                "currency" => $data['currency'],
                "total" => $data['total']]
        ];
        $body = [
            "auth" => $auth,
            "payment" => $payment,
            "expiration" => date('c', strtotime('+' . "10" . 'minute')),
            "returnUrl" => route('user.orders'),
            "ipAddress" => $data['ipAddress'],
            "userAgent" => $data['userAgent'],
        ];

        $response =
            Http::withHeaders(['content-type' => 'application/json'])
                ->post($this->baseUrl . $endpoint,
                    $body);


        $responseData = $response->json();
        $this->CreateOrderWithResponseData(array_merge($data, $responseData));
        return back()->with('success', 'Order created Successfully');
    }

    private
    function CreateOrderWithResponseData(array $data): void
    {
        if ($data['status']['status'] == 'OK') {
            redirect()->back()->with('error', 'Error creating order');
        }
        dd($data);

        $user = Auth::user();
        Order::create([
            'customer_id' => $user->id,
            'payment_url' => $data['processUrl'],
            'status' => PaymentStatusses::CREATED,
            'request_id' => $data['requestId'],
            'total' => $data['total'],
            'reference' => $data['reference'],
            'description' => $data['description'],
        ]);
    }


}
