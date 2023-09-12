<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userBoss = new User();
        $userBoss->name = 'boss1';
        $userBoss->email = 'boss1@gmail.com';
        $userBoss->password = Hash::make('123');
        $userBoss->assignRole('boss');
        $userBoss->save();

        $userSurveyor = new User();
        $userSurveyor->name = 'admin1';
        $userSurveyor->email = 'admin1@gmail.com';
        $userSurveyor->password = Hash::make('123');
        $userSurveyor->assignRole('admin');
        $userSurveyor->save();

        $userAdminData = new User();
        $userAdminData->name = 'sales1';
        $userAdminData->email = 'sales1@gmail.com';
        $userAdminData->password = Hash::make('123');
        $userAdminData->assignRole('sales');
        $userAdminData->save();

        $userAdminData = new User();
        $userAdminData->name = 'customer1';
        $userAdminData->email = 'customer1@gmail.com';
        $userAdminData->password = Hash::make('123');
        $userAdminData->assignRole('customer');
        $userAdminData->save();
    }
}
