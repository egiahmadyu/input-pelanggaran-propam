<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $permission = Permission::where('name', 'manage-auth')->first();
        $adminRole->givePermissionTo($permission);
        $user = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole($adminRole);
    }
}
