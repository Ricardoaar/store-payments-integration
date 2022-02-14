<x-app-layout>

    <div class="grid  grid-cols-1 md:grid-cols-4 h-full mt-8 w-full md:w-3/4 mx-auto md:gap-4 place-items-center">
        @if($cart->products->count()>0)

            <div
                class="col-span-3   grid grid-cols-1 shadow-xl p-6 rounded-lg gap-x-2 w-full min-h-[400px]">
                <div
                    class="text-center rounded-t-md border-b-2 overflow-hidden mb-4 grid grid-cols-4 max-h-[80px]  justify-evenly shadow-xl">
                    <p class="bg-primary text-white table-item">Name</p>
                    <p class="bg-primary text-white table-item">Quantity</p>
                    <p class="bg-primary text-white table-item">Individual Price</p>
                    <p class="bg-primary text-white table-item">Total</p>
                </div>

                @foreach($cart->productsWithData as $product)
                    <div class="text-center border-gray-400 border-b-2 mb-4 grid grid-cols-4  justify-evenly shadow-xl">
                        <p class="table-item"> {{ $product['product']}}</p>
                        <p class="table-item"> {{ $product['quantity']}}</p>
                        <p class="table-item"> {{ $product['price']}}
                            USD </p>
                        <p class="table-item"> {{   $product['price'] * $product['quantity']}}
                            USD</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="col-span-3 grid grid-cols-1 shadow-xl p-6 rounded-lg gap-x-2 w-full min-h-[400px]">
                Add Products before checkout
            </div>
        @endif
        <div class="col-span-1 h-full shadow-xl px-6 w-full py-6 select-none  text-center">

            <div>
                <p class="text-3xl">Total</p>
                <p class="inline">{{$cart->total}}</p>
                <p class="inline font-bold">USD</p>
            </div>
            @if($cart->products->count()>0)


                <div class=" h-full flex flex-col  items-center  justify-evenly">
                    <div>
                        <p class="text-4xl">Pay with...</p>

                    </div>
                    <form class="w-full flex flex-col justify-center items-center" method="post"
                          action="{{route('payment.createPayment',\App\Enums\PaymentGateways::PLACE_TO_PAY )}}">
                        @csrf
                        <label>
                            <textarea class="rounded w-full" name="description"
                                      placeholder="Write a description for your order..."></textarea>
                        </label>

                        <livewire:pay-button/>
                    </form>
                    <button onclick="alert('Not available yet')"
                            class="bg-blue-400 p-4 w-full rounded-md text-white mb-4">
                        Mercado
                        Pago
                    </button>
                </div>
            @else
                No products in cart
            @endif
        </div>
    </div>
    <div>

    </div>


    <livewire:footer/>

</x-app-layout>

