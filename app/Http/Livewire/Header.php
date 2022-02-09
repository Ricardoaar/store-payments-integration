<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Header extends Component
{


    public function render()
    {
        $user = auth()->user();

        return view('livewire.header');
    }
}
