<?php

namespace App\Livewire\Forms;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

use Livewire\Form;

class CreateProductForm extends Form
{

  #[Rule('required|min:3')]
  public $name = '';
  #[Rule('required|numeric')]
  public $quantity = 1;
  #[Rule('required|numeric')]
  public $price = 10000;
  #[Rule('required|min:2')]
  public $unit = 'pcs';
  #[Rule('required')]
  public $description = '';
  #[Rule('image|max:1024')]
  public $image;

}