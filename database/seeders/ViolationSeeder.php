<?php

namespace Database\Seeders;

use App\Models\PangkatPelanggaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViolationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PangkatPelanggaran::create([
            'name' => 'Pati'
        ]);

        PangkatPelanggaran::create([
            'name' => 'Pamen'
        ]);

        PangkatPelanggaran::create([
            'name' => 'Pama'
        ]);

        PangkatPelanggaran::create([
            'name' => 'Bintara'
        ]);

        PangkatPelanggaran::create([
            'name' => 'Tamtama'
        ]);

        PangkatPelanggaran::create([
            'name' => 'PNS'
        ]);
        
    }
}