<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use App\Models\PangkatPelanggaran;
use App\Models\Putusan;
use App\Models\SatuanPolda;
use App\Models\SatuanPolres;
use App\Models\SatuanPolsek;
use App\Models\WujudPerbuatan;
use App\Models\WujudPerbuatanPidana;
use Illuminate\Http\Request;

class ImportReffController extends Controller
{
    public function importReff()
    {
        $file_to_read = fopen(storage_path('app/pangkat.csv'), 'r');
        while (($data = fgetcsv($file_to_read, 20000, ',')) !== FALSE) {
            for ($i = 0; $i < count($data); $i++) {
                echo $data[$i] . '<br>';
                if (strlen($data[$i])) {
                    PangkatPelanggaran::create([
                        'name' => $data[$i]
                    ]);
                }
            }
        }
        fclose($file_to_read);
    }

    public function importPangkat()
    {
        $file_to_read = fopen(storage_path('app/pangkat_lengkap.csv'), 'r');
        while (($data = fgetcsv($file_to_read, 20000, ',')) !== FALSE) {
            echo $data[1] . '<br>';
            if (!$pangkat = PangkatPelanggaran::where('name', $data[0])->first()) {
                $pangkat = PangkatPelanggaran::create([
                    'name' => $data[0]
                ]);
            }
            if (!$pangkatt = Pangkat::where('name', $data[1])->where('pangkat_pelanggar_id', $pangkat->id)->first()) {
                Pangkat::create([
                    'name' => $data[1],
                    'pangkat_pelanggar_id' => $pangkat->id
                ]);
            }
        }
        fclose($file_to_read);
    }

    public function importSatuan()
    {
        $file_to_read = fopen(storage_path('app/polda_indonesia.csv'), 'r');
        while (($data = fgetcsv($file_to_read, 300000, ',')) !== FALSE) {
            print_r($data);
            for ($i = 0; $i < count($data); $i++) {
                if ($i == 0) {
                    if (!$polda = SatuanPolda::where('name', $data[$i])->first()) {
                        $polda = SatuanPolda::create([
                            'name' => $data[$i]
                        ]);
                    }
                } elseif ($i == 1) {
                    $polda = SatuanPolda::where('name', $data[$i - 1])->first();
                    if (!$polres = SatuanPolres::where('name', $data[$i])->where('polda_id', $polda->id)->first()) {
                        $polres = SatuanPolres::create([
                            'name' => $data[$i],
                            'polda_id' => $polda->id
                        ]);
                    }
                } elseif ($i == 2) {
                    $polda = SatuanPolda::where('name', $data[$i - 2])->first();
                    $polres = SatuanPolres::where('name', $data[$i - 1])->where('polda_id', $polda->id)->first();
                    if (!$polsek = SatuanPolsek::where('polres_id', $polres->id)->where('name', $data[$i])->first()) {
                        $polsek = SatuanPolsek::create([
                            'polres_id' => $polres->id,
                            'name' => $data[$i]
                        ]);
                    }
                }
            }
            echo '-------------------------------<br>';
        }
        fclose($file_to_read);
    }

    public function importWpKepp()
    {

        $file_to_read = fopen(storage_path('app/fix.csv'), 'r');
        while (($data = fgetcsv($file_to_read, 20000, ',')) !== FALSE) {
            for ($i = 0; $i < count($data); $i++) {
                echo $data[$i] . '<br>';
                if (!$wpkepp = WujudPerbuatan::where('name', $data[$i])->where('jenis_pelanggaran_id', 2)->first()) {
                    WujudPerbuatan::create([
                        'name' => $data[$i],
                        'jenis_pelanggaran_id' => 2
                    ]);
                }
            }
        }
        fclose($file_to_read);
    }

    public function importWpDisiplin()
    {

        $file_to_read = fopen(storage_path('app/wpdisiplin.csv'), 'r');
        while (($data = fgetcsv($file_to_read, 20000, ',')) !== FALSE) {
            for ($i = 0; $i < count($data); $i++) {
                echo $data[$i] . '<br>';
                if (!$wpkepp = WujudPerbuatan::where('name', $data[$i])->where('jenis_pelanggaran_id', 1)->first()) {
                    WujudPerbuatan::create([
                        'name' => $data[$i],
                        'jenis_pelanggaran_id' => 1
                    ]);
                }
            }
        }
        fclose($file_to_read);
    }

    public function importPutusan()
    {
        $file_to_read = fopen(storage_path('app/putusan_sidang_disiplin.csv'), 'r');
        while (($data = fgetcsv($file_to_read, 20000, ',')) !== FALSE) {
            for ($i = 0; $i < count($data); $i++) {
                echo $data[$i] . '<br>';
                if (strlen($data[$i])) {
                    if (!Putusan::where('name', $data[$i])->where('jenis_pelanggaran_id', 1)->first()) {
                        Putusan::create([
                            'name' => $data[$i],
                            'jenis_pelanggaran_id' => 1
                        ]);
                    }
                }
            }
        }
        fclose($file_to_read);

        $file_to_read = fopen(storage_path('app/putusan_sidang_kepp.csv'), 'r');
        while (($data = fgetcsv($file_to_read, 20000, ',')) !== FALSE) {
            for ($i = 0; $i < count($data); $i++) {
                echo $data[$i] . '<br>';
                if (strlen($data[$i])) {
                    if (!Putusan::where('name', $data[$i])->where('jenis_pelanggaran_id', 2)->first()) {
                        Putusan::create([
                            'name' => $data[$i],
                            'jenis_pelanggaran_id' => 2
                        ]);
                    }
                }
            }
        }
        fclose($file_to_read);
    }
}
