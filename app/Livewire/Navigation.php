<?php

namespace App\Livewire;

use App\Models\CartItems;
use Livewire\Attributes\On;
use Livewire\Component;

class Navigation extends Component
{
    public $totalCartItems;

    #[On('add-to-cart')]
    public function mount() {
        $this->totalCartItems = CartItems::self()->get()->count();
    }

    #[On('cart-item-removed')]
    public function refreshCount(CartItems $cartItem) {
        $this->totalCartItems--;
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
