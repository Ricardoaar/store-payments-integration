<x-app-layout>


    <div
        class="card-container">
        @forelse($products as $product)
            <livewire:product-card :product="$product"/>
        @empty
            <p class="text-red-600 text-center">NO products found</p>
        @endforelse


    </div>
    <div class="my-10 w-3/4  mx-auto">

        {{$products->links()}}
    </div>

    <livewire:footer/>
</x-app-layout>
