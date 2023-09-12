<?php

namespace App\Livewire;

use App\Livewire\Forms\EditProductForm;
use App\Models\CartItems;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewProduct extends Component
{
    use WithFileUploads;
    public $product;
    public $isEdit = false;
    public $isNewPhoto = false;

    public EditProductForm $form;

    public $quantityToCart = 1;

    public function rules () {
        return [
            'quantityToCart' => "required|numeric|min:1|max:" . $this->product->quantity,
        ];
    }

    public function mount() {
        $this->form->name = $this->product->name;
        $this->form->unit = $this->product->unit;
        $this->form->price = $this->product->price;
        $this->form->quantity = $this->product->quantity;
        $this->form->description = $this->product->description;
    }

    public function render()
    {
        return view('livewire.view-product');
    }

    public function save()
    {

        $this->form->validate();

        if ($this->form->image) {
            Storage::disk('public')->delete($this->product->image);

            $fileName = $this->form->image->getClientOriginalName();

            $imageName = now()->timestamp . '_' . $fileName;
            $imagePath = $this->form->image->storeAs('images', $imageName, 'public');

            $this->form->image = $imagePath;

        } else {
            $this->form->image = $this->product->image;
        }


        $this->product->update(
            $this->form->all()
        );

        return redirect()->route('products');
    }


    public function increaseQuantityToCart() {
        if($this->quantityToCart < $this->product->quantity) $this->quantityToCart++;
    }

    public function decreaseQuantityToCart() {
        if($this->quantityToCart > 0) $this->quantityToCart--;
    }

    public function addToCart()
    {
        $this->validate();

        $now = now()->toDateTimeString();

        CartItems::create([
            'product_id' => $this->product->id,
            'quantity' => $this->quantityToCart,
            'user_id' => auth()->user()->id,
            'subtotal_amount' => $this->product->price * $this->quantityToCart,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        $this->dispatch('add-to-cart');
    }
}
