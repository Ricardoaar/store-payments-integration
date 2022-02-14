<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{

    static $count = 0;

    public static function updateCount()
    {
        self::$count = Auth::user()->currentCart->products->count();
    }


    public function render()
    {
        self::updateCount();
        return view('livewire.cart-component', ['count' => self::$count]);
    }

}
