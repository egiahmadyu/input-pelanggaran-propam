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
        $data = array(
            'Arogansi',
            'Asusila',
            'Balapan Liar',
            'Bekerjasama dengan orang lain untuk keuntungan pribadi atau golongan'
        );

        for ($i = 0; $i < count($data); $i++) {
            WujudPerbuatan::create([
                'name' => $data[$i],
                'jenis_pelanggaran_id' => 1
            ]);
        }


        $data = array(
            'Terlibat Dalam Kegiatan Yang Bertujuan Untuk Mengubah, Mengganti Atau Menentang Pancasila Dan Undang- Undang Dasar Negara Republik Indonesia Tahun 1945 Secara Tidak Sah',
            'Melibatkan Diri Pada Kegiatan Politik Praktis',
            'Menggunakan Hak Memilih Dan Dipilih',
            'Mendukung, Mengikuti, Atau Menjadi Simpatisan Paham/Aliran Terorisme, Atau Ekstrimisme Berbasis Kekerasan Yang Dapat Mengarah Pada Terorisme'
        );

        for ($i = 0; $i < count($data); $i++) {
            WujudPerbuatan::create([
                'name' => $data[$i],
                'jenis_pelanggaran_id' => 2
            ]);
        }
    }
}
