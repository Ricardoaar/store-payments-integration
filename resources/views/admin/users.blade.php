<x-app-layout>
    <x-slot name="title">Users</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>
    <div
        class="mt-20  sm:w-3/4 w-5/6 mx-auto text-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-4 md:gap-8 h-full">

        @foreach($users as $user)
            <livewire:user-card :user="$user"/>
        @endforeach
    </div>
    {{$users->links()}}
    <livewire:footer>

    </livewire:footer>

</x-app-layout>
