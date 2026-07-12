<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['admin', 'manager', 'cashier'] as $name) {
            Role::firstOrCreate(['name' => $name], ['display_name' => ucfirst($name)]);
        }

        $adminUser = User::firstOrCreate(
            ['email' => 'admin@lmucpos.lk'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );
        $adminUser->syncRole('admin');

        $cashierUser = User::firstOrCreate(
            ['email' => 'cashier@lmucpos.lk'],
            ['name' => 'Cashier', 'password' => Hash::make('password')]
        );
        $cashierUser->syncRole('cashier');

        $managerUser = User::firstOrCreate(
            ['email' => 'manager@lmucpos.lk'],
            ['name' => 'Manager', 'password' => Hash::make('password')]
        );
        $managerUser->syncRole('manager');
    }
}
