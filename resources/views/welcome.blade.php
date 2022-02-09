<x-guest-layout>
    @livewire('header')
    <x-slot name="title">
        Place2PayStore
    </x-slot>
    <div class="mt-20 w-full px-8 grid grid-cols-3 gap-4 text-center">
        <div class=" mx-auto w-full bg-white border-2 border-gray-200 rounded-md shadow-md">
            <a href="">Discover our products</a>
        </div>
        <div class=" mx-auto w-full bg-white border-2 border-gray-200 rounded-md shadow-md">
            <a href="">Easy pay</a>
        </div>
        <div class=" mx-auto w-full bg-white border-2 border-gray-200 rounded-md shadow-md">
            <a href="">100% Secure!</a>
        </div>

    </div>

    @livewire('footer')
</x-guest-layout>
