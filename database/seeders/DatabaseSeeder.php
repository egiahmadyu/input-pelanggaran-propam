<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      // PermissionPageSeeder::class,
      // UserSeeder::class,
      // SideBarSeeder::class,
    //   ViolationSeeder::class,
        // GenderSeeder::class,
        // DiktukSeeder::class,
        // WujudPerbuatanSeeder::class,
        Narkoba::class,
    ]);
  }
}