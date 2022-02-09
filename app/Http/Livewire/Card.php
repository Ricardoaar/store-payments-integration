<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $title;
    public $background;
    public $cardTitle;
    public $description;

    public function render()
    {
        return view('livewire.card', ['title' => $this->title, 'background' => $this->background]);
    }
}
