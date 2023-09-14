<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Payment;
use Livewire\Component;

class ShowOrder extends Component
{
    protected $layout = 'layouts.app';
    public Order $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.show-order');
    }
}
