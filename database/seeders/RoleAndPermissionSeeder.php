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
    $roles = ['boss', 'admin', 'sales', 'customer'];

    foreach ($roles as $role) {
      if (!Role::where('name', $role)->exists()) {
        Role::create(['name' => $role]);
      }
    }
  }
}
