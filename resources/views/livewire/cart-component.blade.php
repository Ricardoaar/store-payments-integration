<div class="w-full flex justify-center items-center ">
    <a href="{{route('cart.show')}}">
        <div
            class="hover:cursor-pointer bg-cart h-12 w-12 bg-center bg-cover bg-no-repeat transition ease-in-out hover:scale-110 relative">
            <span
                class="absolute top-0 top-0 left-0 h-6 w-6 rounded-full bg-primary text-sm grid place-items-center text-white font-bold">{{$count>9?'9+':$count}}</span>
        </div>
    </a>

</div>
