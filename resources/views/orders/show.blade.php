<x-app-layout>
    <div>
        <p class="text-4xl text-center mt-8 select-none">
            Order Summary
        </p>

    </div>
    <div class="mt-20 grid grid-cols-1 md:grid-cols-4 h-full mx-auto w-3/4 place-items-center">
        <div class="col-span-1 text-center h-fulls">
            <livewire:order-card :order="$order"/>
        </div>
        <div class="md:col-span-3">
            <div class="flex flex-col select-none justify-evenly space-y-4">
                @foreach($order->cart->products as $product )
                    <div class="flex flex items-center justify-evenly shadow space-x-4 ">
                        <div class="justify-self-start	">
                            <img src="{{ $product->image_route }}" alt="{{ $product->name }}"
                                 class="h-20 w-20">
                        </div>
                        <div class="">
                            <p class="text-xl">{{ $product->name }}</p>
                        </div>
                        <div class="">
                            <p class="text-xl">{{ $product->price }} {{$order->currency}}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <livewire:footer/>
</x-app-layout>
