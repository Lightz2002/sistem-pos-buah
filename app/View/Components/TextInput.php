<?php

// app/View/Components/MyInput.php

namespace App\View\Components;
use Illuminate\View\Component;

class TextInput extends Component {
  public $type;
  public $readonly;
  public $model;

  public function __construct($type = 'text', $model = '', $readonly = false)
  {
      $this->type = $type;
      $this->model = $model;
      $this->readonly = $readonly;
  }

  public function render()
  {
      return view('components.text-input');
  }
}