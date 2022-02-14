<x-app-layout>
    <p class="text-center text-3xl select-none text-primary mt-4"> Update {{$product->name}}</p>
    <div class="grid place-items-center grid-cols-4 mx-auto w-5/6 mt-20 h-5/6 gap-6">
        <div class="hidden col-span-0 md:block md:col-span-1 h-full bg-gray-500
    rounded-md shadow overflow-hidden">
            <div class="bg-primary text-center text-white">
                <p>{{$product->name}}</p>

            </div>

            <figure>
                <img src="{{$product->image_route}}" alt="{{$product->name}} image">
            </figure>
            <div>
                <p class="text-center text-white text-3xl py-8">{{$product->price}}USD</p>
            </div>

        </div>


        <div class="col-span-4 md:col-span-3 text-center h-64">
            <form action="{{route('products.update',[$product])}}" enctype="multipart/form-data"
                  class="w-full h-full flex flex-col justify-evenly items-center" method="post">
                @method('PUT')
                @csrf
                <div class="flex w-full justify-center space-x-4 items-center">
                    <label for="name">Name

                    </label>
                    <input type="text" value="{{$product->name}}" id="name" name="name"
                           class="rounded-xl border-gray-400 shadow-xl">

                </div>
                <div class="flex w-full justify-center space-x-4 items-center">
                    <label for="price">Price

                    </label>
                    <input type="number" step="0.01" min="10" value="{{$product->price}}" id="price" name="price"
                           class="rounded-xl border-gray-400 shadow-xl">

                </div>
                <div class="flex w-full justify-center space-x-4 items-center">
                    <label for="name">Image

                    </label>
                    <input type="file" value="{{$product->name}}" id="image" name="image"
                           class="border-gray-400 shadow-xl">
                </div>

                <div class="flex w-full justify-center space-x-4 items-center">
                    <input class="text-white bg-primary py-2 px-4 rounded-md" type="submit" value="Update"
                    >

                </div>


            </form>

        </div>


    </div>
    <livewire:footer/>

</x-app-layout>
