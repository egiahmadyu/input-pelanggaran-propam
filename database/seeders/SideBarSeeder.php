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
      'icon' => 'bx-home-circle',
      'type' => 1,
      'sort' => 1
    ]);

    $manage = SideMenu::create([
      'name' => 'Dasboard',
      'icon' => 'bx-home-circle',
      'type' => 2,
      'sort' => 2
    ]);
    SideMenu::create([
      'name' => 'User',
      'url' => 'manage',
      'type' => 3,
      'sort' => 1,
      'parent_id' => $manage->id
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
