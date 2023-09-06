<?php

namespace App\Livewire;

use App\Models\User;
use App\View\Components\Column;
use Illuminate\Database\Eloquent\Builder;


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

}
