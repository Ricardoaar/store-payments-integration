<div class="shadow rounded-lg overflow-hidden text-center select-none">
    <div class="bg-primary text-white shadow-xl z-10">
        <p class="font-bold text-xl ">
            {{$product->name}}
        </p>
    </div>


    <div>
        <div class="flex flex-col justify-center items-center ">
            <figure>
                <img src="{{$product->image_route}}" alt="{{$product->name}} image">

            </figure>
            <div class="grid grid-cols-2 items-center w-full">
                <div class="flex flex-col justify-center items-center text-center">
                    <p>{{$product->price}}</p>
                    <p class="select-none font-bold text-xl"> USD</p>
                </div>
                <div class="my-2 flex flex-col px-2 space-y-1 w-full justify-center items-center">

                    @if(auth()->user()->isAdmin())

                        <form action="{{route('products.destroy',[$product])}}" class="flex flex-col w-full"
                              method="post">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete"
                                   class="bg-red-500 hover:bg-red-700 text-white
                               font-bold    rounded-md hover:cursor-pointer w-full">
                        </form>
                        <a href="{{route( 'products.edit',$product)}}"
                           class="bg-gray-500 hover:bg-gray-700 text-white
                               font-bold   w-full  rounded-md hover:cursor-pointer">
                            Edit
                        </a>
                    @else

                        <a class="btn" href="{{route('cart.add',[$product])}}">
                            Add
                        </a>



                        @if(in_array($product->name,array_map(function($p){return $p['name'];},auth()->user()->currentCart->products->toArray()) ) )
                            <a class="btn" href="{{route('cart.remove',[$product])}}">
                                Remove
                            </a>
                        @endif
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
