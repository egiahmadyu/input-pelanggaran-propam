<?php

namespace Database\Seeders;

use App\Models\Diktuk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiktukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array('Diktuk Bintara', 'Diktuk Tamtama', 'Akpol', 'SIPSS');

        for ($i=0; $i < count($data); $i++) {
            Diktuk::create([
                'name' => $data[$i]
            ]);
        }
    }
}