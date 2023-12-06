<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Putusan;

class PutusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $putusans = array(
            array(
                "id" => 1,
                "jenis_pelanggaran_id" => 1,
                "name" => "Teguran tertulis",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 2,
                "jenis_pelanggaran_id" => 1,
                "name" => "Penundaan mengikuti pendidikan",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 3,
                "jenis_pelanggaran_id" => 1,
                "name" => "Penundaan kenaikan gaji berkala",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 4,
                "jenis_pelanggaran_id" => 1,
                "name" => "Penundaan kenaikan pangkat",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 5,
                "jenis_pelanggaran_id" => 1,
                "name" => "Mutasi yang bersifat demosi",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 6,
                "jenis_pelanggaran_id" => 1,
                "name" => "Pembebasan dari jabatan",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 7,
                "jenis_pelanggaran_id" => 1,
                "name" => "Penempatan pada tempat khusus",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 8,
                "jenis_pelanggaran_id" => 1,
                "name" => "Ganti rugi",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 9,
                "jenis_pelanggaran_id" => 1,
                "name" => "Tidak terbukti",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 18,
                "jenis_pelanggaran_id" => 2,
                "name" => "Perbuatan pelanggar dinyatakan sebagai perbuatan tercela",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 19,
                "jenis_pelanggaran_id" => 2,
                "name" => "Permintaan maaf secara lisan dan tertulis pada Sidang KKEP",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 20,
                "jenis_pelanggaran_id" => 2,
                "name" => "Kewajiban Pelanggar untuk mengikuti pembinaan rohani, mental dan pengetahuan profesi",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 21,
                "jenis_pelanggaran_id" => 2,
                "name" => "Mutasi demosi",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 22,
                "jenis_pelanggaran_id" => 2,
                "name" => "Penundaan kenaikan pangkat",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 23,
                "jenis_pelanggaran_id" => 2,
                "name" => "Penundaan pendidikan",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 24,
                "jenis_pelanggaran_id" => 2,
                "name" => "PTDH",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 25,
                "jenis_pelanggaran_id" => 2,
                "name" => "Patsus",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 26,
                "jenis_pelanggaran_id" => 2,
                "name" => "Tidak Terbukti",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 10,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN Teguran lisan",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 11,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN Pernyataan tidak puas secara tertulis",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 12,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN Pemotongan Tunkin 25% selama 6 bulan",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 13,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN Pemotongan Tunkin 25% selama 9 bulan",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 14,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN Pemotongan Tunkin 25% selama 12 bulan",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 15,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN Penurunan jabatan setingkat lebih rendah selama 12 bulan",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 16,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN Pembebasan dari jabatannya menjadi jabatan pelaksana selama 12 bulan",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            ),
            array(
                "id" => 17,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN Pemberhentian dengan hormat tidak atas permintaan sendiri sebagai PNS",
                "created_at" => "2023-09-03 14:48:32.000",
                "updated_at" => "2023-09-03 14:48:32.000"
            )
        );

        foreach ($putusans as $key => $value) {
            Putusan::insert([
                "id" => $value['id'],
                "name" => $value['name'],
                'jenis_pelanggaran_id' => $value['jenis_pelanggaran_id']
            ]);
        }
    }
}
