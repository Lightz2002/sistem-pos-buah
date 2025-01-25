<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ListProduct extends Component
{
    use WithPagination;
    public $page = 1;
    public $perPage = 10;
    public $search = '';
    public $createUrl = '';

    public $numberOfPaginatorsRendered = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->setCreateUrl();
    }

    public function render()
    {
        return view('livewire.list-product', [
            'products' => Product::search($this->search)->paginate($this->perPage)
        ]);
    }

    private function setCreateUrl()
    {
        if (auth()->user()->hasRole('customer')) $this->createUrl = '';
        else $this->createUrl = '/products/create';
    }
}
