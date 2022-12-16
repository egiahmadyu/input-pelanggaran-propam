<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use App\Models\Putusan;
use App\Models\WujudPerbuatan;
use App\Models\WujudPerbuatanPidana;
use Illuminate\Http\Request;

class ImportReffController extends Controller
{
    public function importReff()
    {
        $file_to_read = fopen(storage_path('app\pangkat.csv'), 'r');
        while(($data = fgetcsv($file_to_read, 20000, ',')) !== FALSE){
            for($i = 0; $i < count($data); $i++) {
                echo $data[$i].'<br>';
                if (strlen($data[$i]))
                {
                    Putusan::create([
                        'name' => $data[$i],
                        'type' => 12
                    ]);
                }

            }


        }

        fclose($file_to_read);
    }
}