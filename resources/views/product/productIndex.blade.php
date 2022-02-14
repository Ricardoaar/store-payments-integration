<x-app-layout>
    <div class="text-center mt-4">
        <p class="text-3xl  select-none">
            Available Products
        </p>
    </div>

    <div class="w-3/4 mx-auto mt-6">
        <form class=" select-none grid grid-cols-2 gap-4 " action="{{route('products.store')}}"
              enctype="multipart/form-data"
              class="w-full h-full flex flex-col justify-evenly items-center" method="post">
            @csrf
            <div class="flex w-full justify-center space-x-4 items-center">
                <label for="name">Name

                </label>
                <input type="text" value="{{old('name')}}" id="name" name="name"
                       class="rounded-xl border-gray-400 shadow-xl">

            </div>
            <div class="flex w-full justify-center space-x-4 items-center">
                <label for="price">Price

                </label>
                <input type="number" step="0.01" min="10" value="{{old('price')}}" id="price" name="price"
                       class="rounded-xl border-gray-400 shadow-xl">

            </div>
            <div class="flex w-full justify-center space-x-4 items-center">
                <label for="name">Image

                </label>
                <input type="file" value="{{old('image')}}" id="image" name="image"
                       class="border-gray-400 shadow-xl">
            </div>

            <div class="flex w-full justify-center space-x-4 items-center">
                <input class="text-white bg-primary py-2 px-4 rounded-md" type="submit" value="Add"
                >

            </div>


        </form>
    </div>
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
