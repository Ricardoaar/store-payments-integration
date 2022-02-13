<div class="shadow rounded-lg overflow-hidden">
    <div class="bg-primary text-white shadow">
        <p class="font-bold text-xl border-b-2 border-white">
            {{$order->description}}
        </p>

        <p>
            Created by: <b class="font-bold"> {{$order->user->name}}</b>
        </p>
    </div>
    <div>
        <div class="flex justify-center space-x-2">
            <p class="font-bold ">Status</p>
            <p class="inline font-bold {{$order->status===\App\Enums\PaymentStatusses::CREATED?
                'text-gray-500':
                $order->status===\App\Enums\PaymentStatusses::PAYED?
                    'text-green-500':
                    'text-red-500'}}">
                {{$order->status}}</p>
        </div>
        <div class="flex justify-center space-x-2">
            <p class="font-bold">
                Date
            </p>
            <p>
                {{   $order->created_at->format('d/m/Y')}}
            </p>
        </div>
        <div class="flex justify-center space-x-2">
            <p class="font-bold">Total</p>
            <p class="">
                {{$order->total}}  {{$order->currency}}
            </p>

        </div>
        <div class="flex justify-center space-x-2">
            <p class="font-bold">Reference</p>
            <p>
                {{$order->reference}}
            </p>
        </div>
        <div class="grid  grid-cols-2 gap-x-2  gap-y-1 px-2">
            @if(!auth()->user()->isAdmin())
                <form class="wfull" action="{{route('payment.retry',['order'=>$order,'gateway'=>$order->gateway])}}"
                      method="post">
                    @csrf
                    <input type="submit"
                           class="bg-primary  py-1 mb-1 rounded-md w-full text-white font-bold cursor-pointer"
                           value="Retry">
                </form>
            @endif

            @if(($order->status=== \App\Enums\PaymentStatusses::CREATED))

                <form class="w-full"
                      action="{{route('payment.checkPayment',[\App\Enums\PaymentGateways::PLACE_TO_PAY,$order->request_id])}}"
                      method="post">
                    @csrf
                    <input type="submit"
                           class="bg-primary  w-full py-1 mb-1 rounded-md   text-white font-bold cursor-pointer"
                           value="Check Status">
                </form>

            @endif
            <form class="w-full"
                  action="{{route('orders.destroy',[$order])}}"
                  method="post">
                @csrf
                @method('DELETE')
                <input type="submit"
                       class="bg-red-500 w-full py-1  mb-1 rounded-md  text-white font-bold cursor-pointer"
                       value="Delete">
            </form>
            <form class="w-full"
                  method="get">
                @csrf
                <input type="submit"
                       class="bg-gray-500  w-full py-1 mb-1 rounded-md   text-white font-bold cursor-pointer"
                       value="See">
            </form>
        </div>


    </div>
</div>
