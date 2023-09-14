<?php

namespace App\Livewire;

use Livewire\Component;

class ListOrder extends Component
{
    protected $layout = 'layouts.app';

    public function render()
    {
        return view('livewire.list-order');
    }
}
