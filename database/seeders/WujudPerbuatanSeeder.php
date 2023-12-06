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
        
        $wujud_perbuatans = array(
            array(
                "id" => 1,
                "jenis_pelanggaran_id" => 1,
                "name" => "3a Tidak setia dan taat sepenuhnya kepada pancasila, undang-undang dasar negara republik indonesia tahun 1945, negara, dan pemerintah",
                "created_at" => "2023-09-30 10:17:09.000",
                "updated_at" => "2023-09-30 10:17:09.000"
            ),
            array(
                "id" => 2,
                "jenis_pelanggaran_id" => 1,
                "name" => "3b Tidak mengutamakan kepentingan negara di atas kepentingan pribadi atau golongan serta menghindari segala sesuatu yang dapat merugikan kepentingan negara",
                "created_at" => "2023-09-30 10:17:09.000",
                "updated_at" => "2023-09-30 10:17:09.000"
            ),
            array(
                "id" => 3,
                "jenis_pelanggaran_id" => 1,
                "name" => "3c Tidak menjunjung tinggi kehormatan dan martabat negara, pemerintah, dan kepolisian negara republik indonesia",
                "created_at" => "2023-09-30 10:17:10.000",
                "updated_at" => "2023-09-30 10:17:10.000"
            ),
            array(
                "id" => 4,
                "jenis_pelanggaran_id" => 1,
                "name" => "3d Tidak menyimpan rahasia negara dan\/atau rahasia jabatan dengan sebaik-baiknya",
                "created_at" => "2023-09-30 10:17:10.000",
                "updated_at" => "2023-09-30 10:17:10.000"
            ),
            array(
                "id" => 5,
                "jenis_pelanggaran_id" => 1,
                "name" => "3e Tidak hormat-menghormati antar pemeluk agama",
                "created_at" => "2023-09-30 10:17:10.000",
                "updated_at" => "2023-09-30 10:17:10.000"
            ),
            array(
                "id" => 6,
                "jenis_pelanggaran_id" => 1,
                "name" => "3f Tidak menjunjung tinggi hak asasi manusia",
                "created_at" => "2023-09-30 10:17:11.000",
                "updated_at" => "2023-09-30 10:17:11.000"
            ),
            array(
                "id" => 7,
                "jenis_pelanggaran_id" => 1,
                "name" => "3g Tidak menaati peraturan perundang-undangan yang berlaku, baik yang berhubungan dengan tugas kedinasan maupun yang berlaku secara umum",
                "created_at" => "2023-09-30 10:17:11.000",
                "updated_at" => "2023-09-30 10:17:11.000"
            ),
            array(
                "id" => 8,
                "jenis_pelanggaran_id" => 1,
                "name" => "3h Tidak melaporkan kepada atasannya apabila mengetahui ada hal yang dapat membahayakan dan\/atau merugikan negara\/ pemerintah",
                "created_at" => "2023-09-30 10:17:11.000",
                "updated_at" => "2023-09-30 10:17:11.000"
            ),
            array(
                "id" => 9,
                "jenis_pelanggaran_id" => 1,
                "name" => "3i Tidak bersikap dan bertingkah laku sopan santun terhadap masyarakat",
                "created_at" => "2023-09-30 10:17:12.000",
                "updated_at" => "2023-09-30 10:17:12.000"
            ),
            array(
                "id" => 10,
                "jenis_pelanggaran_id" => 1,
                "name" => "3j Tidak berpakaian rapi dan pantas",
                "created_at" => "2023-09-30 10:17:12.000",
                "updated_at" => "2023-09-30 10:17:12.000"
            ),
            array(
                "id" => 11,
                "jenis_pelanggaran_id" => 1,
                "name" => "4a Tidak memberikan perlindungan, pengayoman, dan pelayanan dengan sebaik-baiknya kepada masyarakat",
                "created_at" => "2023-09-30 10:17:12.000",
                "updated_at" => "2023-09-30 10:17:12.000"
            ),
            array(
                "id" => 12,
                "jenis_pelanggaran_id" => 1,
                "name" => "4b Tidak memperhatikan dan menyelesaikan dengan sebaik-baiknya laporan dan\/atau pengaduan masyarakat",
                "created_at" => "2023-09-30 10:17:13.000",
                "updated_at" => "2023-09-30 10:17:13.000"
            ),
            array(
                "id" => 13,
                "jenis_pelanggaran_id" => 1,
                "name" => "4c Tidak menaati sumpah atau janji anggota kepolisian negara republik indonesia serta sumpah atau janji jabatan berdasarkan peraturan perundang-undangan yang berlaku",
                "created_at" => "2023-09-30 10:17:13.000",
                "updated_at" => "2023-09-30 10:17:13.000"
            ),
            array(
                "id" => 14,
                "jenis_pelanggaran_id" => 1,
                "name" => "4d Tidak melaksanakan tugas sebaik-baiknya dengan penuh kesadaran dan rasa tanggung jawab",
                "created_at" => "2023-09-30 10:17:13.000",
                "updated_at" => "2023-09-30 10:17:13.000"
            ),
            array(
                "id" => 15,
                "jenis_pelanggaran_id" => 1,
                "name" => "4e Tidak memelihara dan meningkatkan keutuhan, kekompakan, persatuan, dan kesatuan kepolisian negara republik indonesia",
                "created_at" => "2023-09-30 10:17:14.000",
                "updated_at" => "2023-09-30 10:17:14.000"
            ),
            array(
                "id" => 16,
                "jenis_pelanggaran_id" => 1,
                "name" => "4f Tidak menaati segala peraturan perundang-undangan dan peraturan kedinasan yang berlaku",
                "created_at" => "2023-09-30 10:17:14.000",
                "updated_at" => "2023-09-30 10:17:14.000"
            ),
            array(
                "id" => 17,
                "jenis_pelanggaran_id" => 1,
                "name" => "4g Tidak bertindak dan bersikap tegas serta berlaku adil dan bijaksana terhadap bawahannya",
                "created_at" => "2023-09-30 10:17:15.000",
                "updated_at" => "2023-09-30 10:17:15.000"
            ),
            array(
                "id" => 18,
                "jenis_pelanggaran_id" => 1,
                "name" => "4h Tidak membimbing bawahannya dalam melaksanakan tugas",
                "created_at" => "2023-09-30 10:17:15.000",
                "updated_at" => "2023-09-30 10:17:15.000"
            ),
            array(
                "id" => 19,
                "jenis_pelanggaran_id" => 1,
                "name" => "4i Tidak memberikan contoh dan teladan yang baik terhadap bawahannya",
                "created_at" => "2023-09-30 10:17:15.000",
                "updated_at" => "2023-09-30 10:17:15.000"
            ),
            array(
                "id" => 20,
                "jenis_pelanggaran_id" => 1,
                "name" => "4j Tidak mendorong semangat bawahannya untuk meningkatkan prestasi kerja",
                "created_at" => "2023-09-30 10:17:16.000",
                "updated_at" => "2023-09-30 10:17:16.000"
            ),
            array(
                "id" => 21,
                "jenis_pelanggaran_id" => 1,
                "name" => "4k Tidak memberikan kesempatan kepada bawahannya untuk mengembangkan karier",
                "created_at" => "2023-09-30 10:17:17.000",
                "updated_at" => "2023-09-30 10:17:17.000"
            ),
            array(
                "id" => 22,
                "jenis_pelanggaran_id" => 1,
                "name" => "4l Tidak menaati perintah kedinasan yang sah dari atasan yang berwenang",
                "created_at" => "2023-09-30 10:17:18.000",
                "updated_at" => "2023-09-30 10:17:18.000"
            ),
            array(
                "id" => 23,
                "jenis_pelanggaran_id" => 1,
                "name" => "4m Tidak menaati ketentuan jam kerja",
                "created_at" => "2023-09-30 10:17:18.000",
                "updated_at" => "2023-09-30 10:17:18.000"
            ),
            array(
                "id" => 24,
                "jenis_pelanggaran_id" => 1,
                "name" => "4n Tidak menggunakan dan memelihara barang milik dinas dengan sebaik-baiknya",
                "created_at" => "2023-09-30 10:17:18.000",
                "updated_at" => "2023-09-30 10:17:18.000"
            ),
            array(
                "id" => 25,
                "jenis_pelanggaran_id" => 1,
                "name" => "4o Tidak menciptakan dan memelihara suasana kerja yang baik",
                "created_at" => "2023-09-30 10:17:19.000",
                "updated_at" => "2023-09-30 10:17:19.000"
            ),
            array(
                "id" => 26,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Arogansi",
                "created_at" => "2023-09-30 10:17:19.000",
                "updated_at" => "2023-09-30 10:17:19.000"
            ),
            array(
                "id" => 27,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Asusila",
                "created_at" => "2023-09-30 10:17:19.000",
                "updated_at" => "2023-09-30 10:17:19.000"
            ),
            array(
                "id" => 28,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Balapan liar",
                "created_at" => "2023-09-30 10:17:20.000",
                "updated_at" => "2023-09-30 10:17:20.000"
            ),
            array(
                "id" => 29,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Cerai tanpa ijin pimpinan",
                "created_at" => "2023-09-30 10:17:20.000",
                "updated_at" => "2023-09-30 10:17:20.000"
            ),
            array(
                "id" => 30,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Gratifikasi",
                "created_at" => "2023-09-30 10:17:20.000",
                "updated_at" => "2023-09-30 10:17:20.000"
            ),
            array(
                "id" => 31,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Hutang piutang",
                "created_at" => "2023-09-30 10:17:21.000",
                "updated_at" => "2023-09-30 10:17:21.000"
            ),
            array(
                "id" => 32,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Ingkar janji",
                "created_at" => "2023-09-30 10:17:21.000",
                "updated_at" => "2023-09-30 10:17:21.000"
            ),
            array(
                "id" => 33,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Istri lebih dari satu",
                "created_at" => "2023-09-30 10:17:22.000",
                "updated_at" => "2023-09-30 10:17:22.000"
            ),
            array(
                "id" => 34,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Judi",
                "created_at" => "2023-09-30 10:17:23.000",
                "updated_at" => "2023-09-30 10:17:23.000"
            ),
            array(
                "id" => 35,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a KDRT",
                "created_at" => "2023-09-30 10:17:24.000",
                "updated_at" => "2023-09-30 10:17:24.000"
            ),
            array(
                "id" => 36,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Kekerasan",
                "created_at" => "2023-09-30 10:17:25.000",
                "updated_at" => "2023-09-30 10:17:25.000"
            ),
            array(
                "id" => 37,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Korupsi",
                "created_at" => "2023-09-30 10:17:25.000",
                "updated_at" => "2023-09-30 10:17:25.000"
            ),
            array(
                "id" => 38,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Lahgun Anggaran",
                "created_at" => "2023-09-30 10:17:26.000",
                "updated_at" => "2023-09-30 10:17:26.000"
            ),
            array(
                "id" => 39,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Laka lantas menimbulkan korban",
                "created_at" => "2023-09-30 10:17:27.000",
                "updated_at" => "2023-09-30 10:17:27.000"
            ),
            array(
                "id" => 40,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Lalai dalam tugas",
                "created_at" => "2023-09-30 10:17:28.000",
                "updated_at" => "2023-09-30 10:17:28.000"
            ),
            array(
                "id" => 41,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Mabuk minuman keras",
                "created_at" => "2023-09-30 10:17:28.000",
                "updated_at" => "2023-09-30 10:17:28.000"
            ),
            array(
                "id" => 42,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Melanggar prokes",
                "created_at" => "2023-09-30 10:17:29.000",
                "updated_at" => "2023-09-30 10:17:29.000"
            ),
            array(
                "id" => 43,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Mengeluarkan tahanan tidak sesuai prosedur",
                "created_at" => "2023-09-30 10:17:29.000",
                "updated_at" => "2023-09-30 10:17:29.000"
            ),
            array(
                "id" => 44,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Narkoba",
                "created_at" => "2023-09-30 10:17:29.000",
                "updated_at" => "2023-09-30 10:17:29.000"
            ),
            array(
                "id" => 45,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Nikah siri",
                "created_at" => "2023-09-30 10:17:30.000",
                "updated_at" => "2023-09-30 10:17:30.000"
            ),
            array(
                "id" => 46,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Pembunuhan",
                "created_at" => "2023-09-30 10:17:30.000",
                "updated_at" => "2023-09-30 10:17:30.000"
            ),
            array(
                "id" => 47,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Pemerasan",
                "created_at" => "2023-09-30 10:17:31.000",
                "updated_at" => "2023-09-30 10:17:31.000"
            ),
            array(
                "id" => 48,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Pemukulan",
                "created_at" => "2023-09-30 10:17:31.000",
                "updated_at" => "2023-09-30 10:17:31.000"
            ),
            array(
                "id" => 49,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Pencurian",
                "created_at" => "2023-09-30 10:17:31.000",
                "updated_at" => "2023-09-30 10:17:31.000"
            ),
            array(
                "id" => 50,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Pengancaman",
                "created_at" => "2023-09-30 10:17:32.000",
                "updated_at" => "2023-09-30 10:17:32.000"
            ),
            array(
                "id" => 51,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Penganiayaan",
                "created_at" => "2023-09-30 10:17:33.000",
                "updated_at" => "2023-09-30 10:17:33.000"
            ),
            array(
                "id" => 52,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Pengeroyokan",
                "created_at" => "2023-09-30 10:17:33.000",
                "updated_at" => "2023-09-30 10:17:33.000"
            ),
            array(
                "id" => 53,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Penggelapan",
                "created_at" => "2023-09-30 10:17:34.000",
                "updated_at" => "2023-09-30 10:17:34.000"
            ),
            array(
                "id" => 54,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Penimbunan barang subsidi",
                "created_at" => "2023-09-30 10:17:34.000",
                "updated_at" => "2023-09-30 10:17:34.000"
            ),
            array(
                "id" => 55,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Penipuan",
                "created_at" => "2023-09-30 10:17:35.000",
                "updated_at" => "2023-09-30 10:17:35.000"
            ),
            array(
                "id" => 56,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Penyalahgunaan media sosial",
                "created_at" => "2023-09-30 10:17:35.000",
                "updated_at" => "2023-09-30 10:17:35.000"
            ),
            array(
                "id" => 57,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Perbuatan Cabul",
                "created_at" => "2023-09-30 10:17:36.000",
                "updated_at" => "2023-09-30 10:17:36.000"
            ),
            array(
                "id" => 58,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Perbuatan tidak menyenangkan",
                "created_at" => "2023-09-30 10:17:37.000",
                "updated_at" => "2023-09-30 10:17:37.000"
            ),
            array(
                "id" => 59,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Perselingkuhan",
                "created_at" => "2023-09-30 10:17:37.000",
                "updated_at" => "2023-09-30 10:17:37.000"
            ),
            array(
                "id" => 60,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Perzinahan",
                "created_at" => "2023-09-30 10:17:38.000",
                "updated_at" => "2023-09-30 10:17:38.000"
            ),
            array(
                "id" => 61,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Tahanan bunuh diri",
                "created_at" => "2023-09-30 10:17:38.000",
                "updated_at" => "2023-09-30 10:17:38.000"
            ),
            array(
                "id" => 62,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Tahanan melarikan diri",
                "created_at" => "2023-09-30 10:17:38.000",
                "updated_at" => "2023-09-30 10:17:38.000"
            ),
            array(
                "id" => 63,
                "jenis_pelanggaran_id" => 1,
                "name" => "5a Tidak profesional dalam penanganan perkara",
                "created_at" => "2023-09-30 10:17:39.000",
                "updated_at" => "2023-09-30 10:17:39.000"
            ),
            array(
                "id" => 64,
                "jenis_pelanggaran_id" => 1,
                "name" => "5b Melakukan kegiatan politik praktis",
                "created_at" => "2023-09-30 10:17:39.000",
                "updated_at" => "2023-09-30 10:17:39.000"
            ),
            array(
                "id" => 65,
                "jenis_pelanggaran_id" => 1,
                "name" => "5c Mengikuti aliran yang dapat menimbulkan perpecahan atau mengancam persatuan dan kesatuan bangsa",
                "created_at" => "2023-09-30 10:17:40.000",
                "updated_at" => "2023-09-30 10:17:40.000"
            ),
            array(
                "id" => 66,
                "jenis_pelanggaran_id" => 1,
                "name" => "5d Bekerjasama dengan orang lain di dalam atau di luar lingkungan kerja dengan tujuan untuk memperoleh keuntungan pribadi, golongan, atau pihak lain yang secara langsung atau tidak langsung merugikan kepentingan negara",
                "created_at" => "2023-09-30 10:17:40.000",
                "updated_at" => "2023-09-30 10:17:40.000"
            ),
            array(
                "id" => 67,
                "jenis_pelanggaran_id" => 1,
                "name" => "5e Bertindak selaku perantara bagi pengusaha atau golongan untuk mendapatkan pekerjaan atau pesanan dari kantor\/instansi kepolisian negara republik indonesia demi kepentingan pribadi",
                "created_at" => "2023-09-30 10:17:40.000",
                "updated_at" => "2023-09-30 10:17:40.000"
            ),
            array(
                "id" => 68,
                "jenis_pelanggaran_id" => 1,
                "name" => "5f Memiliki saham\/modal dalam perusahaan yang kegiatan usahanya berada dalam ruang lingkup kekuasaannya",
                "created_at" => "2023-09-30 10:17:41.000",
                "updated_at" => "2023-09-30 10:17:41.000"
            ),
            array(
                "id" => 69,
                "jenis_pelanggaran_id" => 1,
                "name" => "5g Bertindak sebagai pelindung di tempat perjudian, prostitusi, dan tempat  hiburan",
                "created_at" => "2023-09-30 10:17:41.000",
                "updated_at" => "2023-09-30 10:17:41.000"
            ),
            array(
                "id" => 70,
                "jenis_pelanggaran_id" => 1,
                "name" => "5h Menjadi penagih piutang atau menjadi pelindung orang yang punya utang",
                "created_at" => "2023-09-30 10:17:41.000",
                "updated_at" => "2023-09-30 10:17:41.000"
            ),
            array(
                "id" => 71,
                "jenis_pelanggaran_id" => 1,
                "name" => "5i Menjadi perantara\/makelar perkara",
                "created_at" => "2023-09-30 10:17:42.000",
                "updated_at" => "2023-09-30 10:17:42.000"
            ),
            array(
                "id" => 72,
                "jenis_pelanggaran_id" => 1,
                "name" => "5j Menelantarkan keluarga",
                "created_at" => "2023-09-30 10:17:43.000",
                "updated_at" => "2023-09-30 10:17:43.000"
            ),
            array(
                "id" => 73,
                "jenis_pelanggaran_id" => 1,
                "name" => "6a Membocorkan rahasia operasi kepolisian",
                "created_at" => "2023-09-30 10:17:44.000",
                "updated_at" => "2023-09-30 10:17:44.000"
            ),
            array(
                "id" => 74,
                "jenis_pelanggaran_id" => 1,
                "name" => "6b Meninggalkan wilayah tugas tanpa izin pimpinan",
                "created_at" => "2023-09-30 10:17:45.000",
                "updated_at" => "2023-09-30 10:17:45.000"
            ),
            array(
                "id" => 75,
                "jenis_pelanggaran_id" => 1,
                "name" => "6c Menghindarkan tanggung jawab dinas",
                "created_at" => "2023-09-30 10:17:45.000",
                "updated_at" => "2023-09-30 10:17:45.000"
            ),
            array(
                "id" => 76,
                "jenis_pelanggaran_id" => 1,
                "name" => "6d Menggunakan fasilitas negara untuk kepentingan pribadi",
                "created_at" => "2023-09-30 10:17:46.000",
                "updated_at" => "2023-09-30 10:17:46.000"
            ),
            array(
                "id" => 77,
                "jenis_pelanggaran_id" => 1,
                "name" => "6e Menguasai barang milik dinas yang bukan diperuntukkan baginya",
                "created_at" => "2023-09-30 10:17:47.000",
                "updated_at" => "2023-09-30 10:17:47.000"
            ),
            array(
                "id" => 78,
                "jenis_pelanggaran_id" => 1,
                "name" => "6f Mengontrakkan\/menyewakan rumah dinas",
                "created_at" => "2023-09-30 10:17:48.000",
                "updated_at" => "2023-09-30 10:17:48.000"
            ),
            array(
                "id" => 79,
                "jenis_pelanggaran_id" => 1,
                "name" => "6g Menguasai rumah dinas lebih dari 1 (satu) unit",
                "created_at" => "2023-09-30 10:17:49.000",
                "updated_at" => "2023-09-30 10:17:49.000"
            ),
            array(
                "id" => 80,
                "jenis_pelanggaran_id" => 1,
                "name" => "6h Mengalihkan rumah dinas kepada yang tidak berhak",
                "created_at" => "2023-09-30 10:17:50.000",
                "updated_at" => "2023-09-30 10:17:50.000"
            ),
            array(
                "id" => 81,
                "jenis_pelanggaran_id" => 1,
                "name" => "6i Menggunakan barang bukti untuk kepentingan pribadi",
                "created_at" => "2023-09-30 10:17:50.000",
                "updated_at" => "2023-09-30 10:17:50.000"
            ),
            array(
                "id" => 82,
                "jenis_pelanggaran_id" => 1,
                "name" => "6j Berpihak dalam perkara pidana yang sedang ditangani",
                "created_at" => "2023-09-30 10:17:50.000",
                "updated_at" => "2023-09-30 10:17:50.000"
            ),
            array(
                "id" => 83,
                "jenis_pelanggaran_id" => 1,
                "name" => "6k Memanipulasi perkara",
                "created_at" => "2023-09-30 10:17:51.000",
                "updated_at" => "2023-09-30 10:17:51.000"
            ),
            array(
                "id" => 84,
                "jenis_pelanggaran_id" => 1,
                "name" => "6l Membuat opini negatif tentang rekan sekerja, pimpinan, dan\/atau kesatuan",
                "created_at" => "2023-09-30 10:17:51.000",
                "updated_at" => "2023-09-30 10:17:51.000"
            ),
            array(
                "id" => 85,
                "jenis_pelanggaran_id" => 1,
                "name" => "6m Mengurusi, mensponsori, dan\/atau mempengaruhi petugas dengan pangkat dan jabatannya dalam penerimaan calon anggota kepolisian negara republik indonesia",
                "created_at" => "2023-09-30 10:17:51.000",
                "updated_at" => "2023-09-30 10:17:51.000"
            ),
            array(
                "id" => 86,
                "jenis_pelanggaran_id" => 1,
                "name" => "6n Mempengaruhi proses penyidikan untuk kepentingan pribadi sehingga mengubah arah kebenaran materil perkara",
                "created_at" => "2023-09-30 10:17:52.000",
                "updated_at" => "2023-09-30 10:17:52.000"
            ),
            array(
                "id" => 87,
                "jenis_pelanggaran_id" => 1,
                "name" => "6o Melakukan upaya paksa penyidikan yang bukan kewenangannya",
                "created_at" => "2023-09-30 10:17:53.000",
                "updated_at" => "2023-09-30 10:17:53.000"
            ),
            array(
                "id" => 88,
                "jenis_pelanggaran_id" => 1,
                "name" => "6p Melakukan tindakan yang dapat mengakibatkan, menghalangi, atau mempersulit salah satu pihak yang dilayaninya sehingga mengakibatkan kerugian bagi pihak yang dilayani",
                "created_at" => "2023-09-30 10:17:54.000",
                "updated_at" => "2023-09-30 10:17:54.000"
            ),
            array(
                "id" => 89,
                "jenis_pelanggaran_id" => 1,
                "name" => "6q Menyalahgunakan wewenang",
                "created_at" => "2023-09-30 10:17:54.000",
                "updated_at" => "2023-09-30 10:17:54.000"
            ),
            array(
                "id" => 90,
                "jenis_pelanggaran_id" => 1,
                "name" => "6r Menghambat kelancaran pelaksanaan tugas kedinasan",
                "created_at" => "2023-09-30 10:17:54.000",
                "updated_at" => "2023-09-30 10:17:54.000"
            ),
            array(
                "id" => 91,
                "jenis_pelanggaran_id" => 1,
                "name" => "6s Bertindak sewenang-wenang terhadap bawahan",
                "created_at" => "2023-09-30 10:17:55.000",
                "updated_at" => "2023-09-30 10:17:55.000"
            ),
            array(
                "id" => 92,
                "jenis_pelanggaran_id" => 1,
                "name" => "6t Menyalahgunakan barang, uang, atau surat berharga milik dinas",
                "created_at" => "2023-09-30 10:17:55.000",
                "updated_at" => "2023-09-30 10:17:55.000"
            ),
            array(
                "id" => 93,
                "jenis_pelanggaran_id" => 1,
                "name" => "6t Menyalahgunakan Senpi",
                "created_at" => "2023-09-30 10:17:55.000",
                "updated_at" => "2023-09-30 10:17:55.000"
            ),
            array(
                "id" => 94,
                "jenis_pelanggaran_id" => 1,
                "name" => "6u Memiliki, menjual, membeli, menggadaikan, menyewakan, meminjamkan, atau menghilangkan barang, dokumen, atau surat berharga milik dinas secara tidak sah",
                "created_at" => "2023-09-30 10:17:56.000",
                "updated_at" => "2023-09-30 10:17:56.000"
            ),
            array(
                "id" => 95,
                "jenis_pelanggaran_id" => 1,
                "name" => "6v Memasuki tempat yang dapat mencemarkan kehormatan atau martabat kepolisian negara republik indonesia, kecuali karena tugasnya",
                "created_at" => "2023-09-30 10:17:57.000",
                "updated_at" => "2023-09-30 10:17:57.000"
            ),
            array(
                "id" => 96,
                "jenis_pelanggaran_id" => 1,
                "name" => "6w Melakukan pungutan tidak sah dalam bentuk apa pun untuk kepentingan pribadi, golongan, atau pihak lain",
                "created_at" => "2023-09-30 10:17:58.000",
                "updated_at" => "2023-09-30 10:17:58.000"
            ),
            array(
                "id" => 97,
                "jenis_pelanggaran_id" => 1,
                "name" => "6x Memakai perhiasan secara berlebihan pada saat berpakaian dinas kepolisian negara republik indonesia",
                "created_at" => "2023-09-30 10:17:58.000",
                "updated_at" => "2023-09-30 10:17:58.000"
            ),
            array(
                "id" => 98,
                "jenis_pelanggaran_id" => 2,
                "name" => "4a Tidak setia kepada Negara Kesatuan Republik Indonesia yang berdasarkan Pancasila dan Undang-Undang Dasar Negara Republik Indonesia Tahun 1945",
                "created_at" => "2023-09-30 10:18:12.000",
                "updated_at" => "2023-09-30 10:18:12.000"
            ),
            array(
                "id" => 99,
                "jenis_pelanggaran_id" => 2,
                "name" => "4b Tidak menjaga keamanan dalam negeri yang meliputi terpeliharanya keamanan dan ketertiban masyarakat, tertib dan tegaknya hukum, terselenggaranya perlindungan, pengayoman, dan pelayanan masyarakat serta terbinanya ketentraman masyarakat dengan menjunjung tinggi hak asasi manusia",
                "created_at" => "2023-09-30 10:18:12.000",
                "updated_at" => "2023-09-30 10:18:12.000"
            ),
            array(
                "id" => 100,
                "jenis_pelanggaran_id" => 2,
                "name" => "4c Tidak menjaga terpeliharanya keutuhan wilayah Negara Kesatuan Republik Indonesia",
                "created_at" => "2023-09-30 10:18:13.000",
                "updated_at" => "2023-09-30 10:18:13.000"
            ),
            array(
                "id" => 101,
                "jenis_pelanggaran_id" => 2,
                "name" => "4d Tidak menjaga terpeliharanya persatuan dan kesatuan bangsa dengan menjunjung tinggi kebhinekatunggalikaan dan toleransi terhadap kemajemukan suku, bahasa, ras dan agama",
                "created_at" => "2023-09-30 10:18:13.000",
                "updated_at" => "2023-09-30 10:18:13.000"
            ),
            array(
                "id" => 102,
                "jenis_pelanggaran_id" => 2,
                "name" => "4e Tidak mengutamakan kepentingan bangsa dan Negara Kesatuan Republik Indonesia daripada kepentingan pribadi, seseorang, dan\/atau golongan",
                "created_at" => "2023-09-30 10:18:14.000",
                "updated_at" => "2023-09-30 10:18:14.000"
            ),
            array(
                "id" => 103,
                "jenis_pelanggaran_id" => 2,
                "name" => "4f Tidak memelihara dan menjaga kehormatan bendera negara sang merah putih, bahasa Indonesia, lambang negara Garuda Pancasila, dan lagu kebangsaan Indonesia Raya sesuai dengan ketentuan peraturan perundangundangan",
                "created_at" => "2023-09-30 10:18:14.000",
                "updated_at" => "2023-09-30 10:18:14.000"
            ),
            array(
                "id" => 104,
                "jenis_pelanggaran_id" => 2,
                "name" => "4g Tidak membangun kerja sama dengan sesama pejabat penyelenggara negara dan pejabat negara dalam pelaksanaan tugas, wewenang dan tanggung jawab",
                "created_at" => "2023-09-30 10:18:14.000",
                "updated_at" => "2023-09-30 10:18:14.000"
            ),
            array(
                "id" => 105,
                "jenis_pelanggaran_id" => 2,
                "name" => "4h Tidak bersikap netral dalam kehidupan politik",
                "created_at" => "2023-09-30 10:18:15.000",
                "updated_at" => "2023-09-30 10:18:15.000"
            ),
            array(
                "id" => 106,
                "jenis_pelanggaran_id" => 2,
                "name" => "4i Tidak mendukung dan mengamankan kebijakan Pemerintah",
                "created_at" => "2023-09-30 10:18:15.000",
                "updated_at" => "2023-09-30 10:18:15.000"
            ),
            array(
                "id" => 107,
                "jenis_pelanggaran_id" => 2,
                "name" => "9a Terlibat dalam kegiatan yang bertujuan untuk mengubah,  mengganti atau menentang Pancasila dan Undang Undang Dasar Negara Republik Indonesia Tahun 1945 secara tidak sah",
                "created_at" => "2023-09-30 10:18:15.000",
                "updated_at" => "2023-09-30 10:18:15.000"
            ),
            array(
                "id" => 108,
                "jenis_pelanggaran_id" => 2,
                "name" => "9b Terlibat dalam kegiatan menentang kebijakan pemerintah",
                "created_at" => "2023-09-30 10:18:16.000",
                "updated_at" => "2023-09-30 10:18:16.000"
            ),
            array(
                "id" => 109,
                "jenis_pelanggaran_id" => 2,
                "name" => "9c Menjadi anggota atau pengurus organisasi atau kelompok yang dilarang pemerintah",
                "created_at" => "2023-09-30 10:18:16.000",
                "updated_at" => "2023-09-30 10:18:16.000"
            ),
            array(
                "id" => 110,
                "jenis_pelanggaran_id" => 2,
                "name" => "9d Menjadi anggota atau pengurus partai politik",
                "created_at" => "2023-09-30 10:18:16.000",
                "updated_at" => "2023-09-30 10:18:16.000"
            ),
            array(
                "id" => 111,
                "jenis_pelanggaran_id" => 2,
                "name" => "9e Menggunakan hak memilih dan dipilih",
                "created_at" => "2023-09-30 10:18:17.000",
                "updated_at" => "2023-09-30 10:18:17.000"
            ),
            array(
                "id" => 112,
                "jenis_pelanggaran_id" => 2,
                "name" => "9f Melibatkan diri pada kegiatan politik praktis",
                "created_at" => "2023-09-30 10:18:17.000",
                "updated_at" => "2023-09-30 10:18:17.000"
            ),
            array(
                "id" => 113,
                "jenis_pelanggaran_id" => 2,
                "name" => "9g Mendukung, mengikuti, atau menjadi simpatisan paham\/aliran terorisme, atau ekstrimisme berbasis kekerasan yang dapat mengarah pada terorisme",
                "created_at" => "2023-09-30 10:18:18.000",
                "updated_at" => "2023-09-30 10:18:18.000"
            ),
            array(
                "id" => 114,
                "jenis_pelanggaran_id" => 2,
                "name" => "9h Mendukung, mengikuti, atau menjadi simpatisan esklusivisme terhadap kemajemukan budaya, suku, bahasa, ras dan agama",
                "created_at" => "2023-09-30 10:18:18.000",
                "updated_at" => "2023-09-30 10:18:18.000"
            ),
            array(
                "id" => 115,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)a Tidak setia kepada Polri sebagai pengabdian kepada masyarakat, bangsa, dan negara dengan memedomani dan menjunjung tinggi Tribrata dan Catur Prasetya",
                "created_at" => "2023-09-30 10:18:18.000",
                "updated_at" => "2023-09-30 10:18:18.000"
            ),
            array(
                "id" => 116,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)b Tidak menjaga dan meningkatkan citra, soliditas, kredibilitas, reputasi, dan kehormatan Polri",
                "created_at" => "2023-09-30 10:18:19.000",
                "updated_at" => "2023-09-30 10:18:19.000"
            ),
            array(
                "id" => 117,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)c Tidak menjalankan tugas, wewenang dan tanggungjawab secara profesional, proporsional, dan prosedural",
                "created_at" => "2023-09-30 10:18:19.000",
                "updated_at" => "2023-09-30 10:18:19.000"
            ),
            array(
                "id" => 118,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)d tidak melaksanakan Perintah Kedinasan dan menyelesaikan tugas, wewenang dan tanggung jawab dengan saksama dan penuh rasa tanggung jawab",
                "created_at" => "2023-09-30 10:18:19.000",
                "updated_at" => "2023-09-30 10:18:19.000"
            ),
            array(
                "id" => 119,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)e Tidak mematuhi hierarki Atasan dalam pelaksanaan tugas, wewenang dan tanggung jawab",
                "created_at" => "2023-09-30 10:18:20.000",
                "updated_at" => "2023-09-30 10:18:20.000"
            ),
            array(
                "id" => 120,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)f Tidak memegang teguh rahasia yang menurut sifatnya atau menurut Perintah Kedinasan harus dirahasiakan",
                "created_at" => "2023-09-30 10:18:20.000",
                "updated_at" => "2023-09-30 10:18:20.000"
            ),
            array(
                "id" => 162,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)f Melakukan penyidikan yang bertentangan dengan ketentuan peraturan perundang-undangan karena adanya campur tangan pihak lain",
                "created_at" => "2023-09-30 10:18:35.000",
                "updated_at" => "2023-09-30 10:18:35.000"
            ),
            array(
                "id" => 121,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)g Tidak menampilkan sikap kepemimpinan melalui keteladanan, ketaatan pada hukum, kejujuran, keadilan, serta menghormati dan menjunjung tinggi hak asasi manusia dalam melaksanakan tugas, wewenang dan tanggung jawab",
                "created_at" => "2023-09-30 10:18:20.000",
                "updated_at" => "2023-09-30 10:18:20.000"
            ),
            array(
                "id" => 122,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)h Tidak menyampaikan pendapat dengan cara sopan dan santun dan menghargai perbedaan pendapat pada saat pelaksanaan rapat, sidang, atau pertemuan yang bersifat kedinasan",
                "created_at" => "2023-09-30 10:18:21.000",
                "updated_at" => "2023-09-30 10:18:21.000"
            ),
            array(
                "id" => 123,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)i Tidak mematuhi dan menaati hasil keputusan yang telah disepakati dalam rapat, sidang, atau pertemuan yang bersifat kedinasan",
                "created_at" => "2023-09-30 10:18:21.000",
                "updated_at" => "2023-09-30 10:18:21.000"
            ),
            array(
                "id" => 124,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)j Tidak mengutamakan kesetaraan dan keadilan gender dalam melaksanakan tugas, wewenang dan tanggung jawab",
                "created_at" => "2023-09-30 10:18:21.000",
                "updated_at" => "2023-09-30 10:18:21.000"
            ),
            array(
                "id" => 125,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)k Tidak mendahulukan peran, tugas, wewenang dan tanggung jawab sesuai dengan ketentuan peraturan perundang-undangan",
                "created_at" => "2023-09-30 10:18:22.000",
                "updated_at" => "2023-09-30 10:18:22.000"
            ),
            array(
                "id" => 126,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)l Tidak menjaga, mengamankan dan merawat senjata api, barang bergerak dan\/atau barang tidak bergerak milik Polri yang dipercayakan kepadanya",
                "created_at" => "2023-09-30 10:18:22.000",
                "updated_at" => "2023-09-30 10:18:22.000"
            ),
            array(
                "id" => 127,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)m Tidak wajib menghargai dan menghormati dalam melaksanakan tugas, wewenang dan tanggungjawab",
                "created_at" => "2023-09-30 10:18:22.000",
                "updated_at" => "2023-09-30 10:18:22.000"
            ),
            array(
                "id" => 128,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)n Tidak wajib bekerja sama dalam meningkatkan kinerja Polri",
                "created_at" => "2023-09-30 10:18:23.000",
                "updated_at" => "2023-09-30 10:18:23.000"
            ),
            array(
                "id" => 129,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)o Tidak melaporkan setiap Pelanggaran KEPP atau disiplin atau tindak pidana yang dilakukan oleh pegawai negeri pada Polri, yang dilihat, dialami atau diketahui secara langsung kepada pejabat yang berwenang",
                "created_at" => "2023-09-30 10:18:23.000",
                "updated_at" => "2023-09-30 10:18:23.000"
            ),
            array(
                "id" => 130,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)p Tidak menunjukan rasa kesetiakawanan dengan menjunjung tinggi prinsip saling menghormati",
                "created_at" => "2023-09-30 10:18:23.000",
                "updated_at" => "2023-09-30 10:18:23.000"
            ),
            array(
                "id" => 131,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(1)q Tidak melindungi dan memberikan pertolongan kepada sesama  dalam melaksanakan tugas, wewenang dan tanggung jawab",
                "created_at" => "2023-09-30 10:18:24.000",
                "updated_at" => "2023-09-30 10:18:24.000"
            ),
            array(
                "id" => 132,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(2) Tidak melaksanakan tugas sesuai dengan tugas pokok dan fungsinya",
                "created_at" => "2023-09-30 10:18:24.000",
                "updated_at" => "2023-09-30 10:18:24.000"
            ),
            array(
                "id" => 133,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(3) Tidak melaksanakan tugas sesuai dengan lingkup kewenangannya",
                "created_at" => "2023-09-30 10:18:25.000",
                "updated_at" => "2023-09-30 10:18:25.000"
            ),
            array(
                "id" => 134,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(4) Tidak melaksanakan tugas sesuai dengan standar operasional prosedur",
                "created_at" => "2023-09-30 10:18:25.000",
                "updated_at" => "2023-09-30 10:18:25.000"
            ),
            array(
                "id" => 135,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(5)a Tidak mengikuti pendidikan dan pelatihan dalam rangka pembinaan karier dan peningkatan kemampuan profesionalisme Polri",
                "created_at" => "2023-09-30 10:18:25.000",
                "updated_at" => "2023-09-30 10:18:25.000"
            ),
            array(
                "id" => 136,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(5)b Tidak melaksanakan mutasi baik promosi, setara maupun demosi",
                "created_at" => "2023-09-30 10:18:26.000",
                "updated_at" => "2023-09-30 10:18:26.000"
            ),
            array(
                "id" => 137,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(5)c Tidak melakukan penegakan disiplin dan KEPP berdasarkan Laporan atau Pengaduan masyarakat tentang adanya dugaan Pelanggaran disiplin dan\/atau Pelanggaran KEPP sesuai dengan kewenangannya",
                "created_at" => "2023-09-30 10:18:26.000",
                "updated_at" => "2023-09-30 10:18:26.000"
            ),
            array(
                "id" => 138,
                "jenis_pelanggaran_id" => 2,
                "name" => "5(5)d Tidak melakukan kegiatan pengawasan dan\/atau pemeriksaan yang dilaksanakan oleh fungsi pengawasan internal Polri",
                "created_at" => "2023-09-30 10:18:26.000",
                "updated_at" => "2023-09-30 10:18:26.000"
            ),
            array(
                "id" => 139,
                "jenis_pelanggaran_id" => 2,
                "name" => "6(1)a Sebagai atasan tidak menunjukan keteladanan dan kepemimpinan yang melayani, menjadi konsultan yang dapat menyelesaikan masalah serta menjamin kualitas kinerja Bawahan dan kesatuan Polri",
                "created_at" => "2023-09-30 10:18:27.000",
                "updated_at" => "2023-09-30 10:18:27.000"
            ),
            array(
                "id" => 140,
                "jenis_pelanggaran_id" => 2,
                "name" => "6(1)b Sebagai atasan tidak menindaklanjuti dan menyelesaikan hambatan tugas yang dilaporkan oleh Bawahan sesuai tingkat kewenangannya",
                "created_at" => "2023-09-30 10:18:27.000",
                "updated_at" => "2023-09-30 10:18:27.000"
            ),
            array(
                "id" => 141,
                "jenis_pelanggaran_id" => 2,
                "name" => "6(1)c Sebagai atasan tidak segera menyelesaikan dugaan Pelanggaran yang dilakukan oleh Bawahan dan",
                "created_at" => "2023-09-30 10:18:27.000",
                "updated_at" => "2023-09-30 10:18:27.000"
            ),
            array(
                "id" => 142,
                "jenis_pelanggaran_id" => 2,
                "name" => "6(1)d Sebagai atasan tidak mengarahkan, mengawasi dan mengendalikan pelaksanaan tugas, wewenang dan tanggung jawab yang dilaksanakan oleh bawahannya",
                "created_at" => "2023-09-30 10:18:28.000",
                "updated_at" => "2023-09-30 10:18:28.000"
            ),
            array(
                "id" => 143,
                "jenis_pelanggaran_id" => 2,
                "name" => "6(2)a Sebagai atasan tidak melaksanakan perintah Atasan terkait dengan  pelaksanaan tugas, fungsi, dan kewenangannya dan melaporkan kepada Atasan",
                "created_at" => "2023-09-30 10:18:28.000",
                "updated_at" => "2023-09-30 10:18:28.000"
            ),
            array(
                "id" => 144,
                "jenis_pelanggaran_id" => 2,
                "name" => "6(2)b Sebagai atasan tidak menolak perintah Atasan yang bertentangan dengan norma hukum, norma agama, dan norma kesusilaan",
                "created_at" => "2023-09-30 10:18:28.000",
                "updated_at" => "2023-09-30 10:18:28.000"
            ),
            array(
                "id" => 145,
                "jenis_pelanggaran_id" => 2,
                "name" => "6(2)c Sebagai atasan tidak melaporkan kepada Atasan pemberi perintah atas penolakan perintah yang dilakukannya untuk mendapatkan perlindungan hukum dari Atasan pemberi perintah",
                "created_at" => "2023-09-30 10:18:29.000",
                "updated_at" => "2023-09-30 10:18:29.000"
            ),
            array(
                "id" => 146,
                "jenis_pelanggaran_id" => 2,
                "name" => "6(3) Sebagai atasan pemberi perintah tidak memberikan perlindungan",
                "created_at" => "2023-09-30 10:18:29.000",
                "updated_at" => "2023-09-30 10:18:29.000"
            ),
            array(
                "id" => 147,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(1)a1 Melakukan perbuatan yang tidak sesuai dengan ketentuan peraturan perundang-undangan, dan\/atau standar operasional prosedur dalam penegakan hukum",
                "created_at" => "2023-09-30 10:18:29.000",
                "updated_at" => "2023-09-30 10:18:29.000"
            ),
            array(
                "id" => 148,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(1)a2 Melakukan perbuatan yang tidak sesuai dengan ketentuan peraturan perundang-undangan, dan\/atau standar operasional prosedur dalam pengadaan barang dan jasa",
                "created_at" => "2023-09-30 10:18:30.000",
                "updated_at" => "2023-09-30 10:18:30.000"
            ),
            array(
                "id" => 149,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(1)a3 Melakukan perbuatan yang tidak sesuai dengan ketentuan peraturan perundang-undangan, dan\/atau standar operasional prosedur dalam penerimaan anggota Polri dan seleksi pendidikan pengembangan",
                "created_at" => "2023-09-30 10:18:31.000",
                "updated_at" => "2023-09-30 10:18:31.000"
            ),
            array(
                "id" => 150,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(1)a4 Melakukan perbuatan yang tidak sesuai dengan ketentuan peraturan perundang-undangan, dan\/atau standar operasional prosedur dalam penerbitan dokumen dan\/atau produk Kepolisian terkait pelayanan masyarakat",
                "created_at" => "2023-09-30 10:18:31.000",
                "updated_at" => "2023-09-30 10:18:31.000"
            ),
            array(
                "id" => 151,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(1)a5 Melakukan perbuatan yang tidak sesuai dengan ketentuan peraturan perundang-undangan, dan\/atau standar operasional prosedur dalam penyalahgunaan barang milik negara atau barang yang dikuasai secara tidak sah",
                "created_at" => "2023-09-30 10:18:32.000",
                "updated_at" => "2023-09-30 10:18:32.000"
            ),
            array(
                "id" => 152,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(1)b Menyampaikan dan menyebarluaskan informasi yang tidak dapat dipertangungjawabkan kebenarannya tentang Polri dan\/atau pribadi pegawai negeri pada Polri",
                "created_at" => "2023-09-30 10:18:32.000",
                "updated_at" => "2023-09-30 10:18:32.000"
            ),
            array(
                "id" => 153,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(1)c Menghindar dan\/atau menolak Perintah Kedinasan dalam rangka Pemeriksaan internal yang dilakukan oleh fungsi pengawasan terkait dengan Laporan atau Pengaduan masyarakat",
                "created_at" => "2023-09-30 10:18:32.000",
                "updated_at" => "2023-09-30 10:18:32.000"
            ),
            array(
                "id" => 154,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(1)d Menyalahgunakan kewenangan dalam melaksanakan tugas kedinasan",
                "created_at" => "2023-09-30 10:18:33.000",
                "updated_at" => "2023-09-30 10:18:33.000"
            ),
            array(
                "id" => 155,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(1)e Melaksanakan tugas tanpa Perintah Kedinasan dari pejabat yang berwenang, kecuali ditentukan lain dalam ketentuan peraturan perundang-undangan",
                "created_at" => "2023-09-30 10:18:33.000",
                "updated_at" => "2023-09-30 10:18:33.000"
            ),
            array(
                "id" => 156,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(1)f Melakukan permufakatan Pelanggaran KEPP atau disiplin atau tindak pidana",
                "created_at" => "2023-09-30 10:18:33.000",
                "updated_at" => "2023-09-30 10:18:33.000"
            ),
            array(
                "id" => 157,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)a Mengabaikan kepentingan pelapor, terlapor, atau pihak lain yang terkait dalam perkara yang bertentangan dengan ketentuan peraturan perundang-undangan",
                "created_at" => "2023-09-30 10:18:34.000",
                "updated_at" => "2023-09-30 10:18:34.000"
            ),
            array(
                "id" => 158,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)b Menempatkan tersangka di tempat bukan rumah tahanan negara\/Polri dan tidak memberitahukan kepada keluarga atau kuasa hukum tersangka",
                "created_at" => "2023-09-30 10:18:34.000",
                "updated_at" => "2023-09-30 10:18:34.000"
            ),
            array(
                "id" => 159,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)c Merekayasa dan memanipulasi perkara yang menjadi tanggung jawabnya dalam rangka penegakan hukum",
                "created_at" => "2023-09-30 10:18:35.000",
                "updated_at" => "2023-09-30 10:18:35.000"
            ),
            array(
                "id" => 160,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)d Mengeluarkan tahanan tanpa perintah tertulis dari penyidik, Atasan penyidik atau Penuntut umum, atau hakim yang berwenang",
                "created_at" => "2023-09-30 10:18:35.000",
                "updated_at" => "2023-09-30 10:18:35.000"
            ),
            array(
                "id" => 161,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)e Melakukan Pemeriksaan terhadap seseorang dengan cara memaksa, intimidasi dan atau kekerasan untuk mendapatkan pengakuan",
                "created_at" => "2023-09-30 10:18:35.000",
                "updated_at" => "2023-09-30 10:18:35.000"
            ),
            array(
                "id" => 163,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)g Menghambat kepentingan pelapor, terlapor, dan pihak terkait lainnya yang sedang berperkara untuk memperoleh haknya dan\/atau melaksanakan kewajibannya",
                "created_at" => "2023-09-30 10:18:36.000",
                "updated_at" => "2023-09-30 10:18:36.000"
            ),
            array(
                "id" => 164,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)h Mengurangi, menambahkan, merusak, menghilangan dan\/atau merekayasa barang bukti",
                "created_at" => "2023-09-30 10:18:36.000",
                "updated_at" => "2023-09-30 10:18:36.000"
            ),
            array(
                "id" => 165,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)i Menghambat dan menunda waktu penyerahan barang bukti yang disita kepada pihak yang berhak\/berwenang sesuai dengan ketentuan peraturan perundang-undangan",
                "created_at" => "2023-09-30 10:18:36.000",
                "updated_at" => "2023-09-30 10:18:36.000"
            ),
            array(
                "id" => 166,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)j Menghambat dan menunda waktu penyerahan tersangka dan barang bukti kepada jaksa penuntut umum",
                "created_at" => "2023-09-30 10:18:37.000",
                "updated_at" => "2023-09-30 10:18:37.000"
            ),
            array(
                "id" => 167,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)k Melakukan penghentian atau membuka kembali penyidikan tindak pidana yang tidak sesuai dengan ketentuan peraturan perundang-undangan",
                "created_at" => "2023-09-30 10:18:37.000",
                "updated_at" => "2023-09-30 10:18:37.000"
            ),
            array(
                "id" => 168,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)l Melakukan hubungan atau pertemuan secara langsung atau tidak langsung di luar kepentingan dinas dengan pihak-pihak terkait dengan perkara yang sedang ditangani dengan landasan itikad buruk",
                "created_at" => "2023-09-30 10:18:37.000",
                "updated_at" => "2023-09-30 10:18:37.000"
            ),
            array(
                "id" => 169,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)m Melakukan Pemeriksaan di luar kantor penyidik kecuali ditentukan lain sesuai dengan ketentuan peraturan perundang-undangan",
                "created_at" => "2023-09-30 10:18:38.000",
                "updated_at" => "2023-09-30 10:18:38.000"
            ),
            array(
                "id" => 170,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(2)n Melakukan keberpihakan dalam menangani perkara",
                "created_at" => "2023-09-30 10:18:38.000",
                "updated_at" => "2023-09-30 10:18:38.000"
            ),
            array(
                "id" => 171,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(3)a Dalam pengadaan barang dan jasa telah memberikan fakta, data dan informasi yang tidak benar dan\/atau segala sesuatu yang belum pasti atau diputuskan",
                "created_at" => "2023-09-30 10:18:38.000",
                "updated_at" => "2023-09-30 10:18:38.000"
            ),
            array(
                "id" => 172,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(3)b Dalam pengadaan barang dan jasa telah melakukan pembahasan proses pengadaan barang\/jasa dengan calon penyedia barang\/jasa, kuasa atau wakil, dan\/atau perusahaan yang mempunyai afiliasi dengan calon penyedia barang\/jasa di luar kewenangannya baik langsung maupun tidak langsung",
                "created_at" => "2023-09-30 10:18:39.000",
                "updated_at" => "2023-09-30 10:18:39.000"
            ),
            array(
                "id" => 173,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(3)c Dalam pengadaan barang dan jasa telah menghambat proses pemilihan penyedia dala pengadaan barang\/jasa",
                "created_at" => "2023-09-30 10:18:39.000",
                "updated_at" => "2023-09-30 10:18:39.000"
            ),
            array(
                "id" => 174,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(3)d Dalam pengadaan barang dan jasa telah saling mempengaruhi antar personel Unit Kerja Pengadaan Barang dan Jasa dan pihak yang berkepentingan lainnya, baik langsung maupun tidak langsung yang mengakibatkan persaingan usaha tidak sehat",
                "created_at" => "2023-09-30 10:18:39.000",
                "updated_at" => "2023-09-30 10:18:39.000"
            ),
            array(
                "id" => 175,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(3)e Dalam pengadaan barang dan jasa telah menerima, menawarkan atau menjanjikan untuk memberi atau menerima hadiah, imbalan, komisi, rabat, atau berupa apa saja dari atau kepada siapapun yang diketahui atau patut diduga berkaitan dengan pengadaan barang\/jasa",
                "created_at" => "2023-09-30 10:18:40.000",
                "updated_at" => "2023-09-30 10:18:40.000"
            ),
            array(
                "id" => 176,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(4)a Dalam melaksanakan tugas penerimaan anggota Polri dan seleksi pendidikan pengembangan telah membocorkan dan menyebarluaskan materi yang diujikan",
                "created_at" => "2023-09-30 10:18:40.000",
                "updated_at" => "2023-09-30 10:18:40.000"
            ),
            array(
                "id" => 177,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(4)b Dalam melaksanakan tugas penerimaan anggota Polri dan seleksi pendidikan pengembangan telah merekayasa hasil tes yang diujikan",
                "created_at" => "2023-09-30 10:18:41.000",
                "updated_at" => "2023-09-30 10:18:41.000"
            ),
            array(
                "id" => 178,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(4)c Dalam melaksanakan tugas penerimaan anggota Polri dan seleksi pendidikan pengembangan telah memberikan prioritas atau fasilitas khusus kepada calon peserta didik tertentu",
                "created_at" => "2023-09-30 10:18:41.000",
                "updated_at" => "2023-09-30 10:18:41.000"
            ),
            array(
                "id" => 179,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(4)d Dalam melaksanakan tugas penerimaan anggota Polri dan seleksi pendidikan pengembangan telah meluluskan calon pegawai negeri pada Polri atau calon peserta seleksi pendidikan pengembangan tidak melalui prosedur",
                "created_at" => "2023-09-30 10:18:41.000",
                "updated_at" => "2023-09-30 10:18:41.000"
            ),
            array(
                "id" => 180,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(4)e Dalam melaksanakan tugas penerimaan anggota Polri dan seleksi pendidikan pengembangan telah menyelenggarakan kursus atau pelatihan materi yang diujikan dalam seleksi penerimaan anggota Polri calon peserta seleksi menjadi anggota Polri atau calon peserta seleksi pendidikan pengembangan",
                "created_at" => "2023-09-30 10:18:42.000",
                "updated_at" => "2023-09-30 10:18:42.000"
            ),
            array(
                "id" => 181,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(4)f Dalam melaksanakan tugas penerimaan anggota Polri dan seleksi pendidikan pengembangan telah menerima imbalan dalam proses seleksi penerimaan anggota Polri maupun pendidikan pengembangan",
                "created_at" => "2023-09-30 10:18:42.000",
                "updated_at" => "2023-09-30 10:18:42.000"
            ),
            array(
                "id" => 182,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(4)g Dalam melaksanakan tugas penerimaan anggota Polri dan seleksi pendidikan pengembangan telah menawarkan dan\/atau menjanjikan kelulusan kepada peserta seleksi penerimaan anggota Polri maupun pendidikan pengembangan",
                "created_at" => "2023-09-30 10:18:42.000",
                "updated_at" => "2023-09-30 10:18:42.000"
            ),
            array(
                "id" => 183,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(5)a Dalam penerbitan dokumen dan\/atau produk kepolisian terkait pelayanan masyarakat telah menerbitkan tanpa melalui prosedur yang berlaku",
                "created_at" => "2023-09-30 10:18:42.000",
                "updated_at" => "2023-09-30 10:18:42.000"
            ),
            array(
                "id" => 184,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(5)b Dalam penerbitan dokumen dan\/atau produk kepolisian terkait pelayanan masyarakat telah menentukan biaya tidak sesuai ketentuan",
                "created_at" => "2023-09-30 10:18:43.000",
                "updated_at" => "2023-09-30 10:18:43.000"
            ),
            array(
                "id" => 185,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(5)c Dalam penerbitan dokumen dan\/atau produk kepolisian terkait pelayanan masyarakat telah mempersulit masyarakat untuk memperoleh surat yang dimohonkan",
                "created_at" => "2023-09-30 10:18:43.000",
                "updated_at" => "2023-09-30 10:18:43.000"
            ),
            array(
                "id" => 186,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(5)d Dalam penerbitan dokumen dan\/atau produk kepolisian terkait pelayanan masyarakat telah merekayasa keterangan ke dalam surat yang diterbitkan",
                "created_at" => "2023-09-30 10:18:43.000",
                "updated_at" => "2023-09-30 10:18:43.000"
            ),
            array(
                "id" => 187,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(5)e Dalam penerbitan dokumen dan\/atau produk kepolisian terkait pelayanan masyarakat telah menggunakan bahan baku dan\/atau material tidak sesuai standar yang telah ditetapkan",
                "created_at" => "2023-09-30 10:18:44.000",
                "updated_at" => "2023-09-30 10:18:44.000"
            ),
            array(
                "id" => 188,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(6)a Telah menjual, memberikan, menghibahkan, meminjamkan, dan\/atau menyewakan senjata api, amunisi, bahan peledak, barang bergerak dan\/atau barang tidak bergerak milik Polri atau yang diperole secara tidak sah kepada pihak lain secara ilegal",
                "created_at" => "2023-09-30 10:18:44.000",
                "updated_at" => "2023-09-30 10:18:44.000"
            ),
            array(
                "id" => 189,
                "jenis_pelanggaran_id" => 2,
                "name" => "10(6)b Menerima dan menguasai secara tidak sah senjata api, amunisi, bahan peledak, barang bergerak dan\/atau barang tidak bergerak dari pihak lain",
                "created_at" => "2023-09-30 10:18:44.000",
                "updated_at" => "2023-09-30 10:18:44.000"
            ),
            array(
                "id" => 190,
                "jenis_pelanggaran_id" => 2,
                "name" => "11(1)a Sebagai atasan telah  memberi perintah yang bertentangan dengan norma hukum, norma agama, dan norma kesusilaan",
                "created_at" => "2023-09-30 10:18:45.000",
                "updated_at" => "2023-09-30 10:18:45.000"
            ),
            array(
                "id" => 191,
                "jenis_pelanggaran_id" => 2,
                "name" => "11(1)b Sebagai atasan telah  menggunakan kewenangannya secara tidak bertanggung jawab",
                "created_at" => "2023-09-30 10:18:45.000",
                "updated_at" => "2023-09-30 10:18:45.000"
            ),
            array(
                "id" => 192,
                "jenis_pelanggaran_id" => 2,
                "name" => "11(1)c Sebagai atasan telah menghalangi dan\/atau menghambat proses penegakan hukum terhadap bawahannya yang dilaksanakan oleh fungsi penegakan hukum",
                "created_at" => "2023-09-30 10:18:45.000",
                "updated_at" => "2023-09-30 10:18:45.000"
            ),
            array(
                "id" => 193,
                "jenis_pelanggaran_id" => 2,
                "name" => "11(2)a Sebagai bawahan telah melawan atau menentang Atasan",
                "created_at" => "2023-09-30 10:18:46.000",
                "updated_at" => "2023-09-30 10:18:46.000"
            ),
            array(
                "id" => 194,
                "jenis_pelanggaran_id" => 2,
                "name" => "11(2)b Sebagai bawahan telah menyampaikan Laporan yang tidak benar kepada Atasan",
                "created_at" => "2023-09-30 10:18:46.000",
                "updated_at" => "2023-09-30 10:18:46.000"
            ),
            array(
                "id" => 195,
                "jenis_pelanggaran_id" => 2,
                "name" => "7a Tidak menghormati harkat dan martabat manusia berdasarkan prinsip dasar hak asasi manusia",
                "created_at" => "2023-09-30 10:18:46.000",
                "updated_at" => "2023-09-30 10:18:46.000"
            ),
            array(
                "id" => 196,
                "jenis_pelanggaran_id" => 2,
                "name" => "7b Tidak menjunjung tinggi prinsip kesetaraan bagi setiap warga negara di hadapan hukum",
                "created_at" => "2023-09-30 10:18:47.000",
                "updated_at" => "2023-09-30 10:18:47.000"
            ),
            array(
                "id" => 197,
                "jenis_pelanggaran_id" => 2,
                "name" => "7c Tidak memberikan pelayanan kepada masyarakat  dengan cepat, tepat, mudah, nyaman, transparan, dan akuntabel sesuai dengan ketentuan peraturan perundangundangan",
                "created_at" => "2023-09-30 10:18:47.000",
                "updated_at" => "2023-09-30 10:18:47.000"
            ),
            array(
                "id" => 198,
                "jenis_pelanggaran_id" => 2,
                "name" => "7d Tidak melakukan tindakan pertama kepolisian sebagaimana yang diwajibkan dalam tugas wewenang dan tanggungjawab kepolisian, baik sedang bertugas maupun di luar tugas",
                "created_at" => "2023-09-30 10:18:47.000",
                "updated_at" => "2023-09-30 10:18:47.000"
            ),
            array(
                "id" => 199,
                "jenis_pelanggaran_id" => 2,
                "name" => "7e Tidak memberikan pelayanan informasi publik kepada masyarakat  sesuai dengan ketentuan peraturan perundang-undangan",
                "created_at" => "2023-09-30 10:18:48.000",
                "updated_at" => "2023-09-30 10:18:48.000"
            ),
            array(
                "id" => 200,
                "jenis_pelanggaran_id" => 2,
                "name" => "7f Tidak menjunjung tinggi kejujuran, kebenaran, keadilan, dan menjaga kehormatan dalam berhubungan dengan masyarakat",
                "created_at" => "2023-09-30 10:18:48.000",
                "updated_at" => "2023-09-30 10:18:48.000"
            ),
            array(
                "id" => 201,
                "jenis_pelanggaran_id" => 2,
                "name" => "7g Tidak melaksanakan moderasi beragama berupa sikap atau cara pandang perilaku beragama yang moderat, toleran, menghargai perbedaan agama dan selalu mewujudkan kemaslahatan bersama",
                "created_at" => "2023-09-30 10:18:48.000",
                "updated_at" => "2023-09-30 10:18:48.000"
            ),
            array(
                "id" => 202,
                "jenis_pelanggaran_id" => 2,
                "name" => "12a Menolak atau mengabaikan permintaan pertolongan, bantuan, atau Laporan dan Pengaduan masyarakat yang menjadi lingkup tugas, fungsi dan kewenangannya",
                "created_at" => "2023-09-30 10:18:49.000",
                "updated_at" => "2023-09-30 10:18:49.000"
            ),
            array(
                "id" => 203,
                "jenis_pelanggaran_id" => 2,
                "name" => "12b Mencari-cari kesalahan masyarakat",
                "created_at" => "2023-09-30 10:18:49.000",
                "updated_at" => "2023-09-30 10:18:49.000"
            ),
            array(
                "id" => 204,
                "jenis_pelanggaran_id" => 2,
                "name" => "12c Menyebarluaskan berita bohong dan\/atau menyampaikan ketidakpatutan berita yang dapat meresahkan masyarakat",
                "created_at" => "2023-09-30 10:18:49.000",
                "updated_at" => "2023-09-30 10:18:49.000"
            ),
            array(
                "id" => 205,
                "jenis_pelanggaran_id" => 2,
                "name" => "12d Mengeluarkan ucapan, isyarat, dan\/atau tindakan dengan maksud untuk mendapatkan imbalan atau keuntungan pribadi dalam memberikan pelayanan masyarakat",
                "created_at" => "2023-09-30 10:18:49.000",
                "updated_at" => "2023-09-30 10:18:49.000"
            ),
            array(
                "id" => 206,
                "jenis_pelanggaran_id" => 2,
                "name" => "12e Bersikap, berucap, dan bertindak sewenang-wenang",
                "created_at" => "2023-09-30 10:18:50.000",
                "updated_at" => "2023-09-30 10:18:50.000"
            ),
            array(
                "id" => 207,
                "jenis_pelanggaran_id" => 2,
                "name" => "12f Mempersulit masyarakat yang membutuhkan perlindungan, pengayoman, dan pelayanan",
                "created_at" => "2023-09-30 10:18:51.000",
                "updated_at" => "2023-09-30 10:18:51.000"
            ),
            array(
                "id" => 208,
                "jenis_pelanggaran_id" => 2,
                "name" => "12g Melakukan perbuatan yang dapat merendahkan kehormatan perempuan pada saat melakukan tindakan kepolisian",
                "created_at" => "2023-09-30 10:18:52.000",
                "updated_at" => "2023-09-30 10:18:52.000"
            ),
            array(
                "id" => 209,
                "jenis_pelanggaran_id" => 2,
                "name" => "12h Membebankan biaya dalam memberikan pelayanan di luar ketentuan peraturan perundang-undangan",
                "created_at" => "2023-09-30 10:18:52.000",
                "updated_at" => "2023-09-30 10:18:52.000"
            ),
            array(
                "id" => 210,
                "jenis_pelanggaran_id" => 2,
                "name" => "12i Bersikap diskriminatif dalam melayani masyarakat",
                "created_at" => "2023-09-30 10:18:52.000",
                "updated_at" => "2023-09-30 10:18:52.000"
            ),
            array(
                "id" => 211,
                "jenis_pelanggaran_id" => 2,
                "name" => "12j Bersikap tidak perduli dan tidak sopan dalam melayani pemohon",
                "created_at" => "2023-09-30 10:18:53.000",
                "updated_at" => "2023-09-30 10:18:53.000"
            ),
            array(
                "id" => 212,
                "jenis_pelanggaran_id" => 2,
                "name" => "8a Tidak beriman dan bertakwa kepada Tuhan Yang Maha Esa",
                "created_at" => "2023-09-30 10:18:53.000",
                "updated_at" => "2023-09-30 10:18:53.000"
            ),
            array(
                "id" => 213,
                "jenis_pelanggaran_id" => 2,
                "name" => "8b Tidak bertanggung jawab, jujur, disiplin, bekerja sama, adil, peduli, responsif, tegas, dan humanis",
                "created_at" => "2023-09-30 10:18:53.000",
                "updated_at" => "2023-09-30 10:18:53.000"
            ),
            array(
                "id" => 214,
                "jenis_pelanggaran_id" => 2,
                "name" => "8c1 Tidak menaati dan menghormati:   norma hukum",
                "created_at" => "2023-09-30 10:18:53.000",
                "updated_at" => "2023-09-30 10:18:53.000"
            ),
            array(
                "id" => 215,
                "jenis_pelanggaran_id" => 2,
                "name" => "8c2 Tidak menaati dan menghormati:   norma agama",
                "created_at" => "2023-09-30 10:18:54.000",
                "updated_at" => "2023-09-30 10:18:54.000"
            ),
            array(
                "id" => 216,
                "jenis_pelanggaran_id" => 2,
                "name" => "8c3 Tidak menaati dan menghormati:   norma kesusilaan",
                "created_at" => "2023-09-30 10:18:54.000",
                "updated_at" => "2023-09-30 10:18:54.000"
            ),
            array(
                "id" => 217,
                "jenis_pelanggaran_id" => 2,
                "name" => "8c4 Tidak menaati dan menghormati:   nilai-nilai kearifan lokal",
                "created_at" => "2023-09-30 10:18:55.000",
                "updated_at" => "2023-09-30 10:18:55.000"
            ),
            array(
                "id" => 218,
                "jenis_pelanggaran_id" => 2,
                "name" => "8d Tidak menjaga dan memelihara kehidupan berkeluarga, bermasyarakat, berbangsa, dan bernegara secara santun",
                "created_at" => "2023-09-30 10:18:55.000",
                "updated_at" => "2023-09-30 10:18:55.000"
            ),
            array(
                "id" => 219,
                "jenis_pelanggaran_id" => 2,
                "name" => "8e Tidak melaksanakan tugas kenegaraan, kelembagaan, dan kemasyarakatan dengan niat tulus\/ikhlas, sebagai wujud nyata amal ibadahnya",
                "created_at" => "2023-09-30 10:18:55.000",
                "updated_at" => "2023-09-30 10:18:55.000"
            ),
            array(
                "id" => 220,
                "jenis_pelanggaran_id" => 2,
                "name" => "8f Tidak menjaga sopan santun dan etika dalam pergaulan dan penggunaan sarana media sosial dan media lainnya",
                "created_at" => "2023-09-30 10:18:56.000",
                "updated_at" => "2023-09-30 10:18:56.000"
            ),
            array(
                "id" => 221,
                "jenis_pelanggaran_id" => 2,
                "name" => "13a Menganut paham radikal dan\/atau eksklusivisme terhadap kemajemukan budaya, suku, bahasa, ras dan agama",
                "created_at" => "2023-09-30 10:18:57.000",
                "updated_at" => "2023-09-30 10:18:57.000"
            ),
            array(
                "id" => 222,
                "jenis_pelanggaran_id" => 2,
                "name" => "13b Mempengaruhi atau memaksa sesama anggota Polri untuk mengikuti cara beribadah di luar keyakinannya",
                "created_at" => "2023-09-30 10:18:57.000",
                "updated_at" => "2023-09-30 10:18:57.000"
            ),
            array(
                "id" => 223,
                "jenis_pelanggaran_id" => 2,
                "name" => "13c Menampilkan sikap dan perilaku menghujat, serta menista kesatuan, Atasan dan\/atau sesama anggota Polri",
                "created_at" => "2023-09-30 10:18:58.000",
                "updated_at" => "2023-09-30 10:18:58.000"
            ),
            array(
                "id" => 224,
                "jenis_pelanggaran_id" => 2,
                "name" => "13d Melakukan perilaku penyimpangan seksual atau disorientasi seksual",
                "created_at" => "2023-09-30 10:18:58.000",
                "updated_at" => "2023-09-30 10:18:58.000"
            ),
            array(
                "id" => 225,
                "jenis_pelanggaran_id" => 2,
                "name" => "13e Melakukan penyalahgunaan narkotika, psikotropika dan obat terlarang meliputi menyimpan, menggunakan, mengedarkan dan\/atau memproduksi narkotika, psikotropika dan obat terlarang",
                "created_at" => "2023-09-30 10:18:59.000",
                "updated_at" => "2023-09-30 10:18:59.000"
            ),
            array(
                "id" => 226,
                "jenis_pelanggaran_id" => 2,
                "name" => "13f Melakukan perzinaan dan\/atau perselingkuhan",
                "created_at" => "2023-09-30 10:18:59.000",
                "updated_at" => "2023-09-30 10:18:59.000"
            ),
            array(
                "id" => 227,
                "jenis_pelanggaran_id" => 2,
                "name" => "13g1 Mengunakan sarana media sosial dan media lainnya untuk aktivitas atau kegiatan mengunggah, memposting dan menyebarluaskan berita yang tidak benar dan\/atau ujaran kebencian",
                "created_at" => "2023-09-30 10:18:59.000",
                "updated_at" => "2023-09-30 10:18:59.000"
            ),
            array(
                "id" => 228,
                "jenis_pelanggaran_id" => 2,
                "name" => "13g2 Mengunakan sarana media sosial dan media lainnya untuk aktivitas atau kegiatan mengunggah, memposting dan menyebarluaskan perilaku memamerkan kekayaan dan\/atau gaya hidup mewah",
                "created_at" => "2023-09-30 10:19:00.000",
                "updated_at" => "2023-09-30 10:19:00.000"
            ),
            array(
                "id" => 229,
                "jenis_pelanggaran_id" => 2,
                "name" => "13g3 Mengunakan sarana media sosial dan media lainnya untuk aktivitas atau kegiatan mengunggah, memposting dan menyebarluaskan aliran atau paham terorisme, radikalisme\/ekstremisme yang dapat menimbulkan perpecahan Negara Kesatuan Republik Indonesia",
                "created_at" => "2023-09-30 10:19:01.000",
                "updated_at" => "2023-09-30 10:19:01.000"
            ),
            array(
                "id" => 230,
                "jenis_pelanggaran_id" => 2,
                "name" => "13g4 Mengunakan sarana media sosial dan media lainnya untuk aktivitas atau kegiatan mengunggah, memposting dan menyebarluaskan konten yang bersifat eksklusivisme terhadap kemajemukan budaya, suku, bahasa, ras dan agama",
                "created_at" => "2023-09-30 10:19:02.000",
                "updated_at" => "2023-09-30 10:19:02.000"
            ),
            array(
                "id" => 231,
                "jenis_pelanggaran_id" => 2,
                "name" => "13g5 Mengunakan sarana media sosial dan media lainnya untuk aktivitas atau kegiatan mengunggah, memposting dan menyebarluaskan pornografi dan pornoaksi",
                "created_at" => "2023-09-30 10:19:02.000",
                "updated_at" => "2023-09-30 10:19:02.000"
            ),
            array(
                "id" => 232,
                "jenis_pelanggaran_id" => 2,
                "name" => "13h Melakukan tindakan kekerasan dalam rumah tangga",
                "created_at" => "2023-09-30 10:19:02.000",
                "updated_at" => "2023-09-30 10:19:02.000"
            ),
            array(
                "id" => 233,
                "jenis_pelanggaran_id" => 2,
                "name" => "13i Mengikuti aliran atau ajaran yang tidak sah dan\/atau tidak dibenarkan oleh peraturan perundang-undangan",
                "created_at" => "2023-09-30 10:19:03.000",
                "updated_at" => "2023-09-30 10:19:03.000"
            ),
            array(
                "id" => 234,
                "jenis_pelanggaran_id" => 2,
                "name" => "13j Menyimpan, memiliki, menggunakan, dan\/atau memperjualbelikan barang bergerak atau tidak bergerak secara tidak sah",
                "created_at" => "2023-09-30 10:19:03.000",
                "updated_at" => "2023-09-30 10:19:03.000"
            ),
            array(
                "id" => 235,
                "jenis_pelanggaran_id" => 2,
                "name" => "13k Menista dan\/atau menghina",
                "created_at" => "2023-09-30 10:19:03.000",
                "updated_at" => "2023-09-30 10:19:03.000"
            ),
            array(
                "id" => 236,
                "jenis_pelanggaran_id" => 2,
                "name" => "13l Melakukan tindakan yang diskriminatif",
                "created_at" => "2023-09-30 10:19:04.000",
                "updated_at" => "2023-09-30 10:19:04.000"
            ),
            array(
                "id" => 237,
                "jenis_pelanggaran_id" => 2,
                "name" => "13m Melakukan tindakan kekerasan, berperilaku kasar dan tidak patut",
                "created_at" => "2023-09-30 10:19:04.000",
                "updated_at" => "2023-09-30 10:19:04.000"
            ),
            array(
                "id" => 247,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 4b Tidak Menghadiri Dan Mengucapkan Sumpah\/Janji Jabatan.",
                "created_at" => "2023-09-30 10:24:16.000",
                "updated_at" => "2023-10-03 04:22:19.000"
            ),
            array(
                "id" => 246,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 4a Tidak Menghadiri Dan Mengucapkan Sumpah\/ Janji PNS.",
                "created_at" => "2023-09-30 10:24:15.000",
                "updated_at" => "2023-10-03 04:22:46.000"
            ),
            array(
                "id" => 244,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 3g Tidak Menyimpan Rahasia Jabatan Dan Hanya Dapat Mengemukakan Rahasia Jabatan Sesuai Dengan Ketentuan Peraturan Perundang-Undangan.",
                "created_at" => "2023-09-30 10:24:15.000",
                "updated_at" => "2023-10-03 04:23:19.000"
            ),
            array(
                "id" => 243,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 3f Tidak Menunjukkan Integritas Dan Keteladanan Dalam Sikap, Perilaku, Ucapan, Dan Tindakan Kepada Setiap Orang, Baik Di Dalam Maupun Di Luar Kedinasan.",
                "created_at" => "2023-09-30 10:24:15.000",
                "updated_at" => "2023-10-03 04:23:40.000"
            ),
            array(
                "id" => 242,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 3e Tidak Melaksanakan Tugas Kedinasan Dengan Penuh Pengabdian, Kejujuran, Kesadaran, Dan Tanggung Jawab.",
                "created_at" => "2023-09-30 10:24:14.000",
                "updated_at" => "2023-10-03 04:23:54.000"
            ),
            array(
                "id" => 241,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 3d Tidak Menaati Ketentuan Peraturan Perundang-Undangan.",
                "created_at" => "2023-09-30 10:24:14.000",
                "updated_at" => "2023-10-03 04:24:15.000"
            ),
            array(
                "id" => 240,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 3c Tidak Melaksanakan Kebijakan Yang Ditetapkan Oleh Pejabat Pemerintah Yang Berwenang.",
                "created_at" => "2023-09-30 10:24:14.000",
                "updated_at" => "2023-10-03 04:24:31.000"
            ),
            array(
                "id" => 239,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 3b Tidak Menjaga Persatuan Dan Kesatuan Bangsa.",
                "created_at" => "2023-09-30 10:24:13.000",
                "updated_at" => "2023-10-03 04:24:46.000"
            ),
            array(
                "id" => 238,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 3a Tidak Setia Dan Taat Sepenuhnya Kepada Pancasila, Undang- Undang Dasar Negara Republik Indonesia Tahun 1945,  Negara Kesatuan Republik Indonesia, Dan Pemerintah.",
                "created_at" => "2023-09-30 10:24:13.000",
                "updated_at" => "2023-10-03 04:25:03.000"
            ),
            array(
                "id" => 268,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5n Memberikan Dukungan Kepada Calon Presiden\/Wakil Presiden, Calon Kepala Daerah\/Wakil Kepala Daerah, Calon Anggota Dewan Perwakilan Rakyat, Calon Anggota Dewan Perwakilan Daerah, Atau Calon Anggota Dewan Perwakilan Rakyat Daerah.",
                "created_at" => "2023-09-30 10:24:20.000",
                "updated_at" => "2023-10-03 04:13:44.000"
            ),
            array(
                "id" => 267,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5m Melakukan Tindakan Atau Tidak Melakukan Tindakan Yang Dapat Mengakibatkan Kerugian Bagi Yang Dilayani.",
                "created_at" => "2023-09-30 10:24:20.000",
                "updated_at" => "2023-10-03 04:14:21.000"
            ),
            array(
                "id" => 266,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5l Meminta Sesuatu Yang Berhubungan Dengan Jabatan.",
                "created_at" => "2023-09-30 10:24:20.000",
                "updated_at" => "2023-10-03 04:14:42.000"
            ),
            array(
                "id" => 265,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5k Menerima Hadiah Yang Berhubungan Dengan Jabatan Dan\/ Atau Pekerjaan.",
                "created_at" => "2023-09-30 10:24:20.000",
                "updated_at" => "2023-10-03 04:14:58.000"
            ),
            array(
                "id" => 264,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5j Menghalangi Berjalannya Tugas Kedinasan.",
                "created_at" => "2023-09-30 10:24:19.000",
                "updated_at" => "2023-10-03 04:15:28.000"
            ),
            array(
                "id" => 263,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5i Bertindak Sewenang-Wenang Terhadap Bawahan.",
                "created_at" => "2023-09-30 10:24:19.000",
                "updated_at" => "2023-10-03 04:16:29.000"
            ),
            array(
                "id" => 262,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5h Melakukan Kegiatan Yang Merugikan Negara.",
                "created_at" => "2023-09-30 10:24:19.000",
                "updated_at" => "2023-10-03 04:17:30.000"
            ),
            array(
                "id" => 261,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5g Melakukan Pungutan Di Luar Ketentuan.",
                "created_at" => "2023-09-30 10:24:19.000",
                "updated_at" => "2023-10-03 04:17:53.000"
            ),
            array(
                "id" => 260,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5f Memiliki, Menjual, Membeli, Menggadaikan, Menyewakan, Atau Meminjamkan Barang Baik Bergerak Atau Tidak Bergerak, Dokumen, Atau Surat Berharga Milik Negara Secara Tidak Sah.",
                "created_at" => "2023-09-30 10:24:18.000",
                "updated_at" => "2023-10-03 04:18:09.000"
            ),
            array(
                "id" => 259,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5e Bekerja Pada Perusahaan Asing, Konsultan Asing, Atau Lembaga Swadaya Masyarakat Asing Kecuali Ditugaskan Oleh Pejabat Pembina Kepegawaian.",
                "created_at" => "2023-09-30 10:24:18.000",
                "updated_at" => "2023-10-03 04:18:29.000"
            ),
            array(
                "id" => 258,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5d Bekerja Pada Lembaga Atau Organisasi Internasional Tanpa Izin Atau Tanpa Ditugaskan Oleh Pejabat Pembina Kepegawaian.",
                "created_at" => "2023-09-30 10:24:18.000",
                "updated_at" => "2023-10-03 04:18:47.000"
            ),
            array(
                "id" => 257,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5c Menjadi Pegawai Atau Bekerja Untuk Negara Lain.",
                "created_at" => "2023-09-30 10:24:18.000",
                "updated_at" => "2023-10-03 04:19:08.000"
            ),
            array(
                "id" => 256,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5b Menjadi Perantara Untuk Mendapatkan Keuntungan Pribadi Dan\/ Atau Orang Lain Dengan Menggunakan Kewenangan Orang Lain Yang Diduga Terjadi Konflik Kepentingan Dengan Jabatan.",
                "created_at" => "2023-09-30 10:24:18.000",
                "updated_at" => "2023-10-03 04:19:25.000"
            ),
            array(
                "id" => 255,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 5a Menyalahgunakan Wewenang.",
                "created_at" => "2023-09-30 10:24:17.000",
                "updated_at" => "2023-10-03 04:19:42.000"
            ),
            array(
                "id" => 254,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 4i Tidak Menolak Segala Bentuk Pemberian Yang Berkaitan Dengan Tugas Dan Fungsi Kecuali Penghasilan Sesuai Dengan Ketentuan Peraturan Perundang-Undangan.",
                "created_at" => "2023-09-30 10:24:17.000",
                "updated_at" => "2023-10-03 04:20:05.000"
            ),
            array(
                "id" => 253,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 4h Tidak Memberikan Kesempatan Kepada Bawahan Untuk Mengembangkan Kompetensi.",
                "created_at" => "2023-09-30 10:24:17.000",
                "updated_at" => "2023-10-03 04:20:25.000"
            ),
            array(
                "id" => 252,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 4g Tidak Menggunakan Dan Memelihara Barang Milik Negara Dengan Sebaik-Baiknya.",
                "created_at" => "2023-09-30 10:24:17.000",
                "updated_at" => "2023-10-03 04:20:49.000"
            ),
            array(
                "id" => 251,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 4f Tidak Masuk Kerja Dan Menaati Ketentuan Jam Kerja.",
                "created_at" => "2023-09-30 10:24:16.000",
                "updated_at" => "2023-10-03 04:21:09.000"
            ),
            array(
                "id" => 250,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 4e Tidak Melaporkan Harta Kekayaan Kepada Pejabat Yang Berwenang Sesuai Dengan Ketentuan Peraturan Perundang-Undangan.",
                "created_at" => "2023-09-30 10:24:16.000",
                "updated_at" => "2023-10-03 04:21:23.000"
            ),
            array(
                "id" => 249,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 4d Tidak Melaporkan Dengan Segera Kepada Atasannya Apabila Mengetahui Ada Hal Yang Dapat Membahayakan Keamanan Negara Atau Merugikan Keuangan Negara.",
                "created_at" => "2023-09-30 10:24:16.000",
                "updated_at" => "2023-10-03 04:21:45.000"
            ),
            array(
                "id" => 248,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 4c Tidak Mengutamakan Kepentingan Negara Daripada Kepentingan Pribadi, Seseorang, Dan\/ Atau Golongan.",
                "created_at" => "2023-09-30 10:24:16.000",
                "updated_at" => "2023-10-03 04:22:00.000"
            ),
            array(
                "id" => 245,
                "jenis_pelanggaran_id" => 1,
                "name" => "ASN 3h Tidak Bersedia Ditempatkan Di Seluruh Wilayah Negara Kesatuan Republik Indonesia.",
                "created_at" => "2023-09-30 10:24:15.000",
                "updated_at" => "2023-10-03 04:23:03.000"
            )
        );
        foreach ($wujud_perbuatans as $key => $value) {
            WujudPerbuatan::insert([
                "id" => $value['id'],
                "name" => $value['name'],
                'jenis_pelanggaran_id' => $value['jenis_pelanggaran_id']
            ]);
        }

    }
}
