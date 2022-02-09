<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{

    public $title;

    public function render()
    {
        return view('layouts.app', ['title' => $this->title]);
    }
}
