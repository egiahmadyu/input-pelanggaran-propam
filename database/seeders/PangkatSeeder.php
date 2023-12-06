<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pangkat;

class PangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pangkats = array(
            array(
                "id" => 1,
                "pangkat_pelanggar_id" => 1,
                "name" => "Jenderal Polisi",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 2,
                "pangkat_pelanggar_id" => 1,
                "name" => "Komjen Pol",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 3,
                "pangkat_pelanggar_id" => 1,
                "name" => "Irjen Pol",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 4,
                "pangkat_pelanggar_id" => 1,
                "name" => "Brigjen Pol",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 5,
                "pangkat_pelanggar_id" => 2,
                "name" => "Kombes Pol",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 6,
                "pangkat_pelanggar_id" => 2,
                "name" => "AKBP",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 7,
                "pangkat_pelanggar_id" => 2,
                "name" => "Kompol",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 8,
                "pangkat_pelanggar_id" => 3,
                "name" => "AKP",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 9,
                "pangkat_pelanggar_id" => 3,
                "name" => "IPTU",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 10,
                "pangkat_pelanggar_id" => 3,
                "name" => "IPDA",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 11,
                "pangkat_pelanggar_id" => 4,
                "name" => "AIPTU",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 12,
                "pangkat_pelanggar_id" => 4,
                "name" => "AIPDA",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 13,
                "pangkat_pelanggar_id" => 4,
                "name" => "BRIPKA",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 14,
                "pangkat_pelanggar_id" => 4,
                "name" => "BRIGADIR",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 15,
                "pangkat_pelanggar_id" => 4,
                "name" => "BRIPTU",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 16,
                "pangkat_pelanggar_id" => 4,
                "name" => "BRIPDA",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 17,
                "pangkat_pelanggar_id" => 5,
                "name" => "ABRIP",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 18,
                "pangkat_pelanggar_id" => 5,
                "name" => "ABRIPTU",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 19,
                "pangkat_pelanggar_id" => 5,
                "name" => "ABRIPDA",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 20,
                "pangkat_pelanggar_id" => 5,
                "name" => "BHARAKA",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 21,
                "pangkat_pelanggar_id" => 5,
                "name" => "BHARATU",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 22,
                "pangkat_pelanggar_id" => 5,
                "name" => "BHARADA",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 23,
                "pangkat_pelanggar_id" => 6,
                "name" => "Pembina Utama",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 24,
                "pangkat_pelanggar_id" => 6,
                "name" => "Pembina Madya",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 25,
                "pangkat_pelanggar_id" => 6,
                "name" => "Pembina Muda",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 26,
                "pangkat_pelanggar_id" => 6,
                "name" => "Pembina Tk I",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 27,
                "pangkat_pelanggar_id" => 6,
                "name" => "Pembina",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 28,
                "pangkat_pelanggar_id" => 6,
                "name" => "Penata Tk I",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 29,
                "pangkat_pelanggar_id" => 6,
                "name" => "Penata",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 30,
                "pangkat_pelanggar_id" => 6,
                "name" => "Penda Tk I",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 31,
                "pangkat_pelanggar_id" => 6,
                "name" => "Penda",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 32,
                "pangkat_pelanggar_id" => 6,
                "name" => "Pengatur Tk I",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 33,
                "pangkat_pelanggar_id" => 6,
                "name" => "Pengatur",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 34,
                "pangkat_pelanggar_id" => 6,
                "name" => "Pengda Tk I",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 35,
                "pangkat_pelanggar_id" => 6,
                "name" => "Pengda",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 36,
                "pangkat_pelanggar_id" => 6,
                "name" => "Juru Tk I",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 37,
                "pangkat_pelanggar_id" => 6,
                "name" => "Juru",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 38,
                "pangkat_pelanggar_id" => 6,
                "name" => "Juru Muda Tk I",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            )
        );

        foreach ($pangkats as $key => $value) {
            Pangkat::insert([
                "id" => $value['id'],
                "name" => $value['name'],
                'pangkat_pelanggar_id' => $value['pangkat_pelanggar_id']
            ]);
        }
    }
}
