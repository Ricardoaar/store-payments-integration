<x-app-layout>
    <div class="card-container">
        @foreach ($products as $product)
            <livewire:product-card :product="$product"/>
        @endforeach
    </div>


    <livewire:footer/>
</x-app-layout>
