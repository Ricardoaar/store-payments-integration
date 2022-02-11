<x-app-layout>

    <div
        class="mt-20  sm:w-3/4 w-5/6 mx-auto text-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-4 md:gap-8 h-full">
        @foreach($orders as $order)
            <livewire:order-card :order="$order">
        @endforeach

    </div>
    <div class="my-10">

        {{$orders->links() }}

    </div>

    <livewire:footer/>
</x-app-layout>
