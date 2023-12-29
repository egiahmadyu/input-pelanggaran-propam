<?php

namespace Database\Seeders;

use App\Models\AlasanBerhenti;
use App\Models\Gender;
use App\Models\JenisPelanggaran;
use App\Models\Pangkat;
use App\Models\PangkatPelanggaran;
use App\Models\Putusan;
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


        // $file_to_read = fopen(storage_path('app/putusan_sidang_disiplin.csv'), 'r');
        // while (($data = fgetcsv($file_to_read, 20000, ',')) !== FALSE) {
        //     for ($i = 0; $i < count($data); $i++) {
        //         echo $data[$i] . '<br>';
        //         if (strlen($data[$i])) {
        //             if (!Putusan::where('name', $data[$i])->where('jenis_pelanggaran_id', 1)->first()) {
        //                 Putusan::create([
        //                     'name' => $data[$i],
        //                     'jenis_pelanggaran_id' => 1
        //                 ]);
        //             }
        //         }
        //     }
        // }
        // fclose($file_to_read);

        // $file_to_read = fopen(storage_path('app/putusan_sidang_kepp.csv'), 'r');
        // while (($data = fgetcsv($file_to_read, 20000, ',')) !== FALSE) {
        //     for ($i = 0; $i < count($data); $i++) {
        //         echo $data[$i] . '<br>';
        //         if (strlen($data[$i])) {
        //             if (!Putusan::where('name', $data[$i])->where('jenis_pelanggaran_id', 2)->first()) {
        //                 Putusan::create([
        //                     'name' => $data[$i],
        //                     'jenis_pelanggaran_id' => 2
        //                 ]);
        //             }
        //         }
        //     }
        // }
        // fclose($file_to_read);


        // $file_to_read = fopen(storage_path('app/pangkat_lengkap.csv'), 'r');
        // while (($data = fgetcsv($file_to_read, 20000, ',')) !== FALSE) {
        //     echo $data[1] . '<br>';
        //     if (!$pangkat = PangkatPelanggaran::where('name', $data[0])->first()) {
        //         $pangkat = PangkatPelanggaran::create([
        //             'name' => $data[0]
        //         ]);
        //     }
        //     if (!$pangkatt = Pangkat::where('name', $data[1])->where('pangkat_pelanggar_id', $pangkat->id)->first()) {
        //         Pangkat::create([
        //             'name' => $data[1],
        //             'pangkat_pelanggar_id' => $pangkat->id
        //         ]);
        //     }
        // }
        // fclose($file_to_read);

        $file_to_read = fopen(storage_path('app/alasan_dihentikan.csv'), 'r');
        while (($data = fgetcsv($file_to_read, 20000, ',')) !== FALSE) {
            for ($i = 0; $i < count($data); $i++) {
                echo $data[$i] . '<br>';
                if (strlen($data[$i])) {
                    if (!AlasanBerhenti::where('name', $data[$i])->first()) {
                        AlasanBerhenti::create([
                            'name' => $data[$i]
                        ]);
                    }
                }
            }
        }
        fclose($file_to_read);

    }
}
