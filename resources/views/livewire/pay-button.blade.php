<button wire:click="disable" {{$enabled? ' ' : 'disabled'}} type="submit"
        class="{{$enabled? 'bg-primary': 'bg-orange-400'}}  p-4 rounded-md h-full text-white w-full">
    PlacetoPay
</button>
