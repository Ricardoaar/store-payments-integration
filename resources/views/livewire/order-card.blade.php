<div class="shadow rounded-lg overflow-hidden">
    <div class="bg-primary text-white shadow">
        <p class="font-bold text-xl">
            {{$order->description}}
        </p>
        <hr>

        <p>
            Created by: <b class="font-bold"> {{$order->customer->name}}</b>
        </p>
    </div>
    <div>
        <div>
            <b class="font-dark ">Status</b>
            <p class="inline font-bold {{$order->status===\App\Enums\PaymentStatusses::CREATED?
                'text-gray-500':
                $order->status===\App\Enums\PaymentStatusses::PAYED?
                    'text-green-500':
                    'text-red-500'}}">
                {{$order->status}}</p>
        </div>
        <p>
            <b class="font-bold">Date</b> {{   $order->created_at->format('d/m/Y')}}
        </p>
        <p class="">
            <b class="font-bold">Total</b> {{$order->total}} USD {{$order->currency}}
        </p>
        <p>
            <b class="font-bold">Reference</b> {{$order->reference}}
        </p>
        @if(!auth()->user()->isAdmin())
            <form action="{{route('payment.retry',['order'=>$order,'gateway'=>$order->gateway])}}" method="post">
                @csrf
                <input type="submit"
                       class="bg-primary  py-1 mb-1 rounded-md w-1/2 text-white font-bold cursor-pointer"
                       value="Retry">
            </form>
        @endif

        @if(($order->status=== \App\Enums\PaymentStatusses::CREATED))

            <form
                action="{{route('payment.checkPayment',[\App\Enums\PaymentGateways::PLACE_TO_PAY,$order->request_id])}}"
                method="post">
                @csrf
                <input type="submit"
                       class="bg-primary py-1 mb-1 rounded-md  w-1/2 text-white font-bold cursor-pointer"
                       value="Check Status">
            </form>

        @endif
        <form
            action="{{route('orders.destroy',[$order])}}"
            method="post">
            @csrf
            @method('DELETE')
            <input type="submit"
                   class="bg-red-500 py-1 mb-1 rounded-md  w-1/2 text-white font-bold cursor-pointer"
                   value="Delete">
        </form>
    </div>
</div>
