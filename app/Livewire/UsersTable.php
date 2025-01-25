<?php

namespace App\Livewire;

use App\Exports\UserExport;
use App\Models\User;
use App\View\Components\Column;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;

class UsersTable extends Table
{
    public $search = '';

    public $createUrl = '/users/create';


    public function query(): Builder
    {
        return User::filter($this->search);
    }

    public function columns(): array
    {
        return [
            Column::make('name', 'Name'),
            Column::make('email', 'Email'),
            Column::make('roles', 'Role'),
            Column::make('created_at', 'Created At')->component('columns.common.human-diff'),
            Column::make('actions', 'Actions')->component('columns.users.action'),
        ];
    }

    public function export()
    {
        $user = $this->query();
        // Nomor jual, nama customer, type motor, plat, warna, harga, dp, angsuran, sama Jangka waktu prosesnya berapa lama
        // sales_code, customer_name, motor_type, motor_plate_number, motor_color, motor_price, motor_dp, motor_installment_amount,
        return Excel::download(new UserExport($user), 'customer.xlsx');
    }
}
