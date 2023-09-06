<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $bossRole = Role::create(['name' => 'boss']);
    $adminRole = Role::create(['name' => 'admin']);
    $salesRole = Role::create(['name' => 'sales']);
    $customerRole = Role::create(['name' => 'customer']);
  }
}
