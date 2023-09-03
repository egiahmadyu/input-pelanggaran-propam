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
        $file_to_read = fopen(storage_path('app/wpdisiplin.csv'), 'r');
        while (($data = fgetcsv($file_to_read, 2000000, '.')) !== FALSE) {
            for ($i = 0; $i < count($data); $i++) {
                echo $data[$i] . strlen($data[$i]) . '<br>';
                if (!$wpkepp = WujudPerbuatan::where('name', $data[$i])->where('jenis_pelanggaran_id', 1)->first() and strlen($data[$i]) !== 0) {
                    WujudPerbuatan::create([
                        'name' => $data[$i],
                        'jenis_pelanggaran_id' => 1
                    ]);
                }
            }
        }
        fclose($file_to_read);

        $file_to_read = fopen(storage_path('app/wpkepp.csv'), 'r');
        while (($data = fgetcsv($file_to_read, 2000000, '.')) !== FALSE) {
            for ($i = 0; $i < count($data); $i++) {
                echo $data[$i] . '<br>';
                if (!$wpkepp = WujudPerbuatan::where('name', $data[$i])->where('jenis_pelanggaran_id', 2)->first() and strlen($data[$i]) !== 0) {
                    WujudPerbuatan::create([
                        'name' => $data[$i],
                        'jenis_pelanggaran_id' => 2
                    ]);
                }
            }
        }

        fclose($file_to_read);
    }
}
