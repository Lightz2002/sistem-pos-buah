<?php

namespace App\Livewire;

use Livewire\Component;

class CartItem extends Component
{
    public $item;

    public function increaseQuantityToCart() {
        if($this->item->quantity < $this->item->product->quantity) $this->item->quantity++;
        $this->item->save();

        $this->dispatch('cart-item-quantity-changed');
    }

    public function decreaseQuantityToCart() {
        if($this->item->quantity > 0) $this->item->quantity--;
        $this->item->save();

        $this->dispatch('cart-item-quantity-changed');
    }

    public function removeFromCart() {

        $this->dispatch('cart-item-removed', $this->item->id);

    }

    public function render()
    {
        return view('livewire.cart-item');
    }
}
