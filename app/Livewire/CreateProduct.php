<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateProductForm;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class CreateProduct extends Component
{
    use WithFileUploads;

    public CreateProductForm $form;


    public function render()
    {
        return view('livewire.create-product');
    }

    public function save()
    {

        $this->form->validate();

        $fileName = $this->form->image->getClientOriginalName();

        $imageName = now()->timestamp . '_' . $fileName;
        $imagePath = $this->form->image->storeAs('images', $imageName, 'public');

        $this->form->image = $imagePath;

        Product::create(
            $this->form->all()
        );

        return redirect()->route('products');
    }
}
