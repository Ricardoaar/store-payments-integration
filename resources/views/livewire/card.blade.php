<div class=" mx-auto w-full bg-white border-2 border-gray-200 rounded-md shadow-md">
    <div class="card-header border-b-2 shadow-md">
        <h3 class="text-lg text-primary">{{$title ?? '' }}</h3>
    </div>

    <div class="card-body w-full h-auto  flex-col px-4  justify-between items-center py-4">
            <span
                class="block w-full rounded-lg  h-64  py-16 bg-cover bg-no-repeat bg-center {{$background ?? ''}}"></span>


        <article class="h-full w-full">
            <h3 class="text-lg text-primary">{{$cardTitle ?? '' }}</h3>
            <p class="text-gray-700">{{$description ?? '' }}</p>
        </article>
    </div>
</div>
