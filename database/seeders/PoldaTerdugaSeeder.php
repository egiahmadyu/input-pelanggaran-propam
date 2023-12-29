<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PoldaTerduga;

class PoldaTerdugaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuan_poldas = array(
            array(
                "id" => 39,
                "name" => "MABES POLRI",
                "created_at" => "2023-10-19 04:22:34.000",
                "updated_at" => "2023-10-19 04:22:34.000"
            ),
            array(
                "id" => 40,
                "name" => "POLDA ACEH",
                "created_at" => "2023-10-19 04:22:34.000",
                "updated_at" => "2023-10-19 04:22:34.000"
            ),
            array(
                "id" => 41,
                "name" => "POLDA SUMATERA UTARA",
                "created_at" => "2023-10-19 04:22:34.000",
                "updated_at" => "2023-10-19 04:22:34.000"
            ),
            array(
                "id" => 42,
                "name" => "POLDA SUMATERA BARAT",
                "created_at" => "2023-10-19 04:22:35.000",
                "updated_at" => "2023-10-19 04:22:35.000"
            ),
            array(
                "id" => 43,
                "name" => "POLDA RIAU",
                "created_at" => "2023-10-19 04:22:35.000",
                "updated_at" => "2023-10-19 04:22:35.000"
            ),
            array(
                "id" => 44,
                "name" => "POLDA JAMBI",
                "created_at" => "2023-10-19 04:22:35.000",
                "updated_at" => "2023-10-19 04:22:35.000"
            ),
            array(
                "id" => 45,
                "name" => "POLDA SUMATERA SELATAN",
                "created_at" => "2023-10-19 04:22:36.000",
                "updated_at" => "2023-10-19 04:22:36.000"
            ),
            array(
                "id" => 46,
                "name" => "POLDA BENGKULU",
                "created_at" => "2023-10-19 04:22:36.000",
                "updated_at" => "2023-10-19 04:22:36.000"
            ),
            array(
                "id" => 47,
                "name" => "POLDA LAMPUNG",
                "created_at" => "2023-10-19 04:22:36.000",
                "updated_at" => "2023-10-19 04:22:36.000"
            ),
            array(
                "id" => 48,
                "name" => "POLDA KEP BANGKA BELITUNG",
                "created_at" => "2023-10-19 04:22:37.000",
                "updated_at" => "2023-10-19 04:22:37.000"
            ),
            array(
                "id" => 49,
                "name" => "POLDA KEPULAUAN RIAU",
                "created_at" => "2023-10-19 04:22:37.000",
                "updated_at" => "2023-10-19 04:22:37.000"
            ),
            array(
                "id" => 50,
                "name" => "POLDA METRO JAYA",
                "created_at" => "2023-10-19 04:22:37.000",
                "updated_at" => "2023-10-19 04:22:37.000"
            ),
            array(
                "id" => 51,
                "name" => "POLDA JAWA BARAT",
                "created_at" => "2023-10-19 04:22:37.000",
                "updated_at" => "2023-10-19 04:22:37.000"
            ),
            array(
                "id" => 52,
                "name" => "POLDA JAWA TENGAH",
                "created_at" => "2023-10-19 04:22:38.000",
                "updated_at" => "2023-10-19 04:22:38.000"
            ),
            array(
                "id" => 53,
                "name" => "POLDA DIY",
                "created_at" => "2023-10-19 04:22:39.000",
                "updated_at" => "2023-10-19 04:22:39.000"
            ),
            array(
                "id" => 54,
                "name" => "POLDA JAWA TIMUR",
                "created_at" => "2023-10-19 04:22:39.000",
                "updated_at" => "2023-10-19 04:22:39.000"
            ),
            array(
                "id" => 55,
                "name" => "POLDA BANTEN",
                "created_at" => "2023-10-19 04:22:40.000",
                "updated_at" => "2023-10-19 04:22:40.000"
            ),
            array(
                "id" => 56,
                "name" => "POLDA BALI",
                "created_at" => "2023-10-19 04:22:40.000",
                "updated_at" => "2023-10-19 04:22:40.000"
            ),
            array(
                "id" => 57,
                "name" => "POLDA NUSA TENGGARA BARAT",
                "created_at" => "2023-10-19 04:22:41.000",
                "updated_at" => "2023-10-19 04:22:41.000"
            ),
            array(
                "id" => 58,
                "name" => "POLDA NUSA TENGGARA TIMUR",
                "created_at" => "2023-10-19 04:22:41.000",
                "updated_at" => "2023-10-19 04:22:41.000"
            ),
            array(
                "id" => 59,
                "name" => "POLDA KALIMANTAN  BARAT",
                "created_at" => "2023-10-19 04:22:41.000",
                "updated_at" => "2023-10-19 04:22:41.000"
            ),
            array(
                "id" => 60,
                "name" => "POLDA KALIMANTAN TENGAH",
                "created_at" => "2023-10-19 04:22:42.000",
                "updated_at" => "2023-10-19 04:22:42.000"
            ),
            array(
                "id" => 61,
                "name" => "POLDA KALIMANTAN SELATAN",
                "created_at" => "2023-10-19 04:22:42.000",
                "updated_at" => "2023-10-19 04:22:42.000"
            ),
            array(
                "id" => 62,
                "name" => "POLDA KALIMANTAN TIMUR",
                "created_at" => "2023-10-19 04:22:42.000",
                "updated_at" => "2023-10-19 04:22:42.000"
            ),
            array(
                "id" => 63,
                "name" => "POLDA KALIMANTAN UTARA",
                "created_at" => "2023-10-19 04:22:42.000",
                "updated_at" => "2023-10-19 04:22:42.000"
            ),
            array(
                "id" => 64,
                "name" => "POLDA SULAWESI UTARA",
                "created_at" => "2023-10-19 04:22:43.000",
                "updated_at" => "2023-10-19 04:22:43.000"
            ),
            array(
                "id" => 65,
                "name" => "POLDA SULAWESI TENGAH",
                "created_at" => "2023-10-19 04:22:43.000",
                "updated_at" => "2023-10-19 04:22:43.000"
            ),
            array(
                "id" => 66,
                "name" => "POLDA SULAWESI SELATAN",
                "created_at" => "2023-10-19 04:22:43.000",
                "updated_at" => "2023-10-19 04:22:43.000"
            ),
            array(
                "id" => 67,
                "name" => "POLDA SULAWESI TENGGARA",
                "created_at" => "2023-10-19 04:22:44.000",
                "updated_at" => "2023-10-19 04:22:44.000"
            ),
            array(
                "id" => 68,
                "name" => "POLDA GORONTALO",
                "created_at" => "2023-10-19 04:22:44.000",
                "updated_at" => "2023-10-19 04:22:44.000"
            ),
            array(
                "id" => 69,
                "name" => "POLDA SULAWESI BARAT",
                "created_at" => "2023-10-19 04:22:44.000",
                "updated_at" => "2023-10-19 04:22:44.000"
            ),
            array(
                "id" => 70,
                "name" => "POLDA MALUKU",
                "created_at" => "2023-10-19 04:22:44.000",
                "updated_at" => "2023-10-19 04:22:44.000"
            ),
            array(
                "id" => 71,
                "name" => "POLDA MALUKU UTARA",
                "created_at" => "2023-10-19 04:22:45.000",
                "updated_at" => "2023-10-19 04:22:45.000"
            ),
            array(
                "id" => 72,
                "name" => "POLDA PAPUA",
                "created_at" => "2023-10-19 04:22:45.000",
                "updated_at" => "2023-10-19 04:22:45.000"
            ),
            array(
                "id" => 73,
                "name" => "POLDA PAPUA BARAT",
                "created_at" => "2023-10-19 04:22:45.000",
                "updated_at" => "2023-10-19 04:22:45.000"
            ),
            array(
                "id" => 74,
                "name" => "KORPOLAIRUD BAHARKAM POLRI",
                "created_at" => "2023-11-01 11:20:49.000",
                "updated_at" => "2023-11-01 11:20:49.000"
            ),
            array(
                "id" => 78,
                "name" => "KORBRIMOB POLRI",
                "created_at" => "2023-11-01 12:50:36.000",
                "updated_at" => "2023-11-01 12:50:36.000"
            ),
            array(
                "id" => 79,
                "name" => "LEMDIKLAT POLRI",
                "created_at" => "2023-11-01 12:50:46.000",
                "updated_at" => "2023-11-01 12:50:46.000"
            )
        );

        foreach ($satuan_poldas as $key => $value) {
            PoldaTerduga::insert([
                "id" => $value['id'],
                "name" => $value['name']
            ]);
        }
    }
}
