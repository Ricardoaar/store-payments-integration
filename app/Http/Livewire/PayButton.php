<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PayButton extends Component
{
    public $enabled = true;

    public function disable()
    {
        $this->enabled = false;
    }

    public function render()
    {
        return view('livewire.pay-button');
    }
}
