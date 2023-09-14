<?php

namespace App\Livewire;

use App\Livewire\Forms\CreatePaymentForm;
use App\Models\CartItems;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePayment extends Component
{
    use WithFileUploads;
    public CreatePaymentForm $form;
    protected $layout = 'layouts.app';

    public function render()
    {
        return view('livewire.create-payment');
    }

    public function save()
    {
        $this->form->validate();

        $fileName = $this->form->payment_proof->getClientOriginalName();

        $imageName = now()->timestamp . '_' . $fileName;
        $imagePath = $this->form->payment_proof->storeAs('images', $imageName, 'public');

        $this->form->payment_proof = $imagePath;

        $payment = new Payment();
        $payment->account_no = $this->form->account_no;
        $payment->account_name = $this->form->account_name;
        $payment->account_bank = $this->form->account_bank;
        $payment->date = $this->form->date;
        $payment->payment_proof = $this->form->payment_proof;
        $payment->user_id = auth()->user()->id;
        $payment->save();


        // get current cart items
        $cartItems = CartItems::self();

        // create order
        $order = new Order();
        $order->date = $payment->date;
        $order->customer_address = $this->form->customer_address;
        $order->payment_id = $payment->id;
        $order->total_amount = $cartItems->get()->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        $order->customer_id = auth()->user()->id;
        $order->status_id = Status::verifying()->first()->id;
        $order->save();

        // save payment order
        $payment->order_id = $order->id;
        $payment->save();

        // save cart items order to the order id
        $cartItems->update([
            'order_id' => $order->id,
            'has_checkout' => true
        ]);

        return redirect()->route('orders');
    }
}
