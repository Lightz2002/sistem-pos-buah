<?php

namespace App\Livewire;

use Livewire\Component;

class OrderItem extends Component
{
    public $item;
    
    public function render()
    {
        return view('livewire.order-item');
    }
}
