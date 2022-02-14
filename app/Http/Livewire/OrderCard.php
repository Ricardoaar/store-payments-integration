<?php

namespace App\Http\Livewire;

use App\Enums\PaymentStatusses;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use Livewire\Component;

class OrderCard extends Component
{
    public $order;


    public function render()
    {

        return view('livewire.order-card', ['order' => $this->order]);
    }
}
