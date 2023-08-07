<?php

namespace Database\Seeders;

use App\Models\JenisPelanggaran;
use App\Models\Putusan;
use App\Models\WujudPerbuatanPidana;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionPageSeeder::class,
            UserSeeder::class,
            SideBarSeeder::class,
            ViolationSeeder::class,
            GenderSeeder::class,
            DiktukSeeder::class,
            WujudPerbuatanSeeder::class,
            Narkoba::class,
        ]);

        JenisPelanggaran::create([
            'name' => 'Disiplin'
        ]);

        JenisPelanggaran::create([
            'name' => 'KEPP (Kode Etik Profesi Polri)'
        ]);

        $disiplin = array(
            'Patsus',
            'Teguran Tertulis',
            'Tunda DIK',
            'Tunda UKP',
            'Tunda Gaji Berkala',
            'Mutasi Demosi',
            'Pembebasan dari jabatan',
            'Ganti Rugi',
            'Tidak terbukti'
        );

        for ($i = 0; $i < count($disiplin); $i++) {
            Putusan::create([
                'name' => $disiplin[$i],
                'jenis_pelanggaran_id' => 1
            ]);
        }

        $kodeetik = array(
            'Perilaku dinyatakan sebagai sebagai perbuatan tercela',
            'Kewajiban pelanggar untuk meminta maaf',
            'Pembinaan mental kepribadian, kejiwaan, keagamaan dan pengetahuan profesi.',
            'Tunda Kenaikan Pangkat (Perpol 7 2022)',
            'Tunda Pendidikan (Perpol 7 2022)',
            'Patsus (Perpol 7 2022)',
            'Dipindahtugaskan ke jabatan berbeda yang bersifat demosi',
            'PTDH',
            'Tidak terbukti'
        );

        for ($i = 0; $i < count($kodeetik); $i++) {
            Putusan::create([
                'name' => $kodeetik[$i],
                'jenis_pelanggaran_id' => 2
            ]);
        }

        $pidanaKepp = array(
            'Narkoba',
            'Asusila',
            'Perzinahan',
            'Perbuatan Cabul',
            'Perselingkuhan',
            'Penganiayaan',
            'Pemukulan',
            'Pengeroyookan',
            'Kekerasan',
            'Pembunuhan',
            'Pencurian',
            'Penipuan',
            'Penggelapan',
            'Korupsi'
        );

        for ($i = 0; $i < count($pidanaKepp); $i++) {
            WujudPerbuatanPidana::create([
                'name' => $pidanaKepp[$i],
                'jenis_pelanggaran_id' => 2
            ]);
        }

        $pidanadisiplin = array(
            'Narkoba',
            'Asusila',
            'Perzinahan',
            'Perbuatan Cabul',
            'Perselingkuhan',
            'Penganiayaan',
            'Arogansi',
            'Pencurian',
            'Penipuan',
            'Penggelapan',
            'Pungli',
            'Gratifikasi',
            'Penyimpangan anggaran korupsi',
            'Korupsi'
        );

        for ($i = 0; $i < count($pidanadisiplin); $i++) {
            WujudPerbuatanPidana::create([
                'name' => $pidanadisiplin[$i],
                'jenis_pelanggaran_id' => 1
            ]);
        }
    }
}
