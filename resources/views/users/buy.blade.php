<x-app-layout>
    <div class="md:w-1/4 sm:1/2 w-3/4 flex flex-col justify-center mx-auto mt-8 mb-20">
        <livewire:card :title="'Buy Our product!'" :background="'bg-product'"
                       :cardTitle="'The cheapest in the market!'" :description="'Get your own beautiful t-shirt!'"

        />

        <div class="flex justify-evenly mt-5 space-x-6">
            <form class="w-full h-full" method="post"
                  action="{{route('payment.createPayment',$gateways['placetoPlay'] )}}">
                @csrf
                <button type="submit" class="bg-primary p-4 rounded-md h-full text-white w-full">Placeto
                    <br>Pay
                </button>

            </form>
            @csrf
            <button onclick="alert('Not available yet')" class="bg-blue-400 p-4 rounded-md text-white">Mercado Pago
            </button>

        </div>
    </div>


    <livewire:footer/>
</x-app-layout>
