<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\JenisPelanggaran;
use App\Models\Pangkat;
use App\Models\SatuanPolda;
use App\Models\SatuanPolres;
use App\Models\SatuanPolsek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create([
            'gender' => 'Laki - Laki'
        ]);

        Gender::create([
            'gender' => 'Perempuan'
        ]);

        Pangkat::create([
            'name' => 'Kapolda'
        ]);

        SatuanPolda::create([
            'name' => 'Polda Jabar'
        ]);

        SatuanPolres::create([
            'name' => 'Polres Cianjur'
        ]);

        SatuanPolsek::create([
            'name' => 'Polsek Cilaku'
        ]);
    }
}
