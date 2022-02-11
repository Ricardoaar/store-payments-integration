<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderCard extends Component
{
    public $order;


    public function render()
    {
        return view('livewire.order-card', ['order' => $this->order]);
    }
}
