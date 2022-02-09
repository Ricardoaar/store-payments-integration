<x-guest-layout>
    @livewire('header')
    <x-slot name="title">
        Place2PayStore
    </x-slot>
    <div class="mt-20 w-full px-8 grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
        <livewire:card :title="'Discover Our product!'" :background="'bg-product'"
                       :cardTitle="'Become a FAN!'" :description="'Get your own beautiful t-shirt!'"

        />
        <livewire:card :title="'Easy payments!'" :background="'bg-pay'"
                       :cardTitle="'Many ways to pay'" :description="'We accept many ways to pay, thanks of PlacePay'"
        />
        <livewire:card :title="'100% secure!'" :background="'bg-security'"
                       :cardTitle="'Secure payment'"
                       :description="'We use the most secure payment methods to protect your payment.'"/>


    </div>
    @livewire('footer')
</x-guest-layout>
