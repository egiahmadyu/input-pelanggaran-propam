<?php

namespace Database\Seeders;

use App\Models\SideMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SideBarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SideMenu::create([
            'name' => 'Dasboard',
            'icon' => 'fa fa-home',
            'type' => 1,
            'sort' => 1
        ]);

        SideMenu::create([
            'name' => 'Data Pelanggaran',
            'icon' => 'fa fa-database',
            'type' => 1,
            'sort' => 2
        ]);

        SideMenu::create([
            'name' => 'Tambah Data Pelanggaran',
            'icon' => 'fa fa-plus',
            'type' => 1,
            'sort' => 3
        ]);

        $manage = SideMenu::create([
            'name' => 'Manage',
            'icon' => 'fa fa-cog',
            'type' => 2,
            'sort' => 4,
            'url' => 'manage'
        ]);
        SideMenu::create([
            'name' => 'User',
            'url' => 'user',
            'type' => 3,
            'sort' => 1,
            'parent_id' => $manage->id
        ]);
        SideMenu::create([
            'name' => 'Role',
            'url' => 'roles',
            'type' => 3,
            'sort' => 2,
            'parent_id' => $manage->id
        ]);

        SideMenu::create([
            'name' => 'Permission',
            'url' => 'permission',
            'type' => 3,
            'sort' => 3,
            'parent_id' => $manage->id
        ]);

        SideMenu::create([
            'name' => 'Menu Sidebar',
            'url' => 'sidebar',
            'type' => 3,
            'sort' => 4,
            'parent_id' => $manage->id
        ]);
    }
}
