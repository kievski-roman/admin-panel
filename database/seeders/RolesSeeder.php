<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {

            $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
            $manageUsers = Permission::firstOrCreate(['name' => 'manage users', 'guard_name' => 'web']);

            foreach (['manager', 'driver', 'client'] as $name) {
                Role::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
            }


            if (! $adminRole->hasPermissionTo($manageUsers)) {
                $adminRole->givePermissionTo($manageUsers);
            }

            if ($user = User::find(1)) {
                if (! $user->hasRole($adminRole)) {
                    $user->assignRole($adminRole);
                }
            }
        });
    }
}
