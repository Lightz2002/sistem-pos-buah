<?php

namespace App\Livewire;

use Livewire\Component;

class ProductCard extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.product-card');
    }
}
