<?php

namespace Database\Seeders;

use App\Models\JenisNarkoba;
use App\Models\PeranNarkoba;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Narkoba extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PeranNarkoba::create([
            'name' => 'Pemakai'
        ]);

        PeranNarkoba::create([
            'name' => 'Pengedar'
        ]);

        JenisNarkoba::create([
            'name' => 'Amphetamine & Metamphetamine'
        ]);

        JenisNarkoba::create([
            'name' => 'Sabu'
        ]);

        JenisNarkoba::create([
            'name' => 'Ganja'
        ]);

        JenisNarkoba::create([
            'name' => 'Ekstasi/ Ineks'
        ]);

        JenisNarkoba::create([
            'name' => 'Lain - lain'
        ]);
    }
}