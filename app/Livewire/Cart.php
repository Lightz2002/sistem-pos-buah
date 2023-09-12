<?php

namespace App\Livewire;

use App\Models\CartItems;
use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{
  public $cartitems;
  protected $layout = 'layouts.app';

  public $totalAmount;

  private function sumItemTotal() {
    return $this->cartitems->sum(function ($item) {
      return $item->quantity * $item->product->price;
    });
  }


  public function mount() {
    $this->cartitems = CartItems::with(['product', 'user'])->self()->get();
    $this->totalAmount = $this->sumItemTotal();
  }

  #[On('cart-item-removed')]
  public function deleteCartItem(CartItems $cartItem) {
    $cartItem->delete();
    $this->mount();
  }

  #[On('cart-item-quantity-changed')]
  public function refreshTotal() {
    $this->totalAmount = $this->sumItemTotal();
  }

  public function render()
  {
      return view('livewire.cart');
  }
}