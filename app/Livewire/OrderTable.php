<?php

namespace App\Livewire;

use App\Exports\OrderExport;
use App\Models\Order;
use App\Models\User;
use App\View\Components\Column;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;

class OrderTable extends Table
{
    public $sortBy = 'date';
    public $filterComponent = 'filter.order';
    public $search = '';

    #[Url]
    public $status = 'all';

    public $createUrl = '';


    public function query(): Builder
    {
        return Order::filter($this->search, $this->status);
    }

    public function columns(): array
    {
        $columns = [
            Column::make('date', 'Date'),
            Column::make('customer_name', 'Customer'),
            Column::make('customer_address', 'Address'),
            Column::make('total', 'Total'),
            Column::make('status', 'Status')->component('columns.customer.status'),
            Column::make('actions', 'Actions')->component('columns.customer.action'),
        ];

        if (auth()->user()->hasRole('customer')) {
            $columns = [
                Column::make('date', 'Date'),
                Column::make('customer_address', 'Address'),
                Column::make('total', 'Total'),
                Column::make('status', 'Status')->component('columns.customer.status'),
                Column::make('actions', 'Actions')->component('columns.customer.action'),
            ];
        }

        return $columns;
    }

    public function filterStatus(string $status)
    {
        $this->status = $status;
    }

    public function export()
    {
        $orders = $this->query();

        return Excel::download(new OrderExport($orders), 'orders.xlsx');
    }
}
