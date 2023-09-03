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
            'sort' => 2,
            'url' => 'pelanggaran-data'
        ]);

        SideMenu::create([
            'name' => 'Tambah Data Pelanggaran',
            'icon' => 'fa fa-plus',
            'type' => 1,
            'sort' => 3,
            'url' => 'tambah-data'
        ]);

        $data_master = SideMenu::create([
            'name' => 'Data-Master',
            'icon' => 'fa fa-database',
            'type' => 2,
            'sort' => 4,
            'url' => 'data-master'
        ]);

        SideMenu::create([
            'name' => 'Polda / Sederajat',
            'url' => 'satuan-polda',
            'type' => 3,
            'sort' => 1,
            'parent_id' => $data_master->id
        ]);

        SideMenu::create([
            'name' => 'Polres',
            'url' => 'satuan-polres',
            'type' => 3,
            'sort' => 1,
            'parent_id' => $data_master->id
        ]);

        SideMenu::create([
            'name' => 'Polsek',
            'url' => 'satuan-polsek',
            'type' => 3,
            'sort' => 1,
            'parent_id' => $data_master->id
        ]);

        SideMenu::create([
            'name' => 'Wujud Perbuatan',
            'url' => 'wujud-perbuatan',
            'type' => 3,
            'sort' => 1,
            'parent_id' => $data_master->id
        ]);

        SideMenu::create([
            'name' => 'Wujud Perbuatan Pidana',
            'url' => 'wujud-perbuatan-pidana',
            'type' => 3,
            'sort' => 1,
            'parent_id' => $data_master->id
        ]);

        $manage = SideMenu::create([
            'name' => 'Manage',
            'icon' => 'fa fa-cog',
            'type' => 2,
            'sort' => 5,
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
