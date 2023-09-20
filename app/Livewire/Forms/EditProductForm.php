<?php

namespace App\Livewire\Forms;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

use Livewire\Form;

class EditProductForm extends Form
{

  public $name = '';
  public $size = 52;
  public $quantity = 1;
  public $price = 10000;
  public $unit = 'dus';
  public $description = '';
  public $image;


  public function rules () {
    return [
          'name' => 'required|min:3',
          'quantity' => 'required|numeric',
          'price' => 'required|numeric',
          'unit' => 'required|min:3',
          'description' => 'required',
          'image' =>  ''
      ];
  }

}