<?php

namespace Database\Seeders;

use App\Models\WujudPerbuatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WujudPerbuatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'Arogansi',
            'Asusila',
            'Balapan Liar',
            'Bekerjasama dengan orang lain untuk keuntungan pribadi atau golongan'
        );

        for ($i=0; $i < count($data); $i++) {
            WujudPerbuatan::create([
                'name' => $data[$i]
            ]);
        }
    }
}