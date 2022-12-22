<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelanggaranList extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_pelanggaran', 'nrp_nip', 'nama', 'jenis_kelamin', 'pangkat', 'jabatan', 'diktuk', 'polda', 'polres', 'polsek', 'nolp', 'tgllp',
        'wujud_perbuatan', 'kronologi_singkat', 'pasal_pelanggaran', 'pidana', 'wujud_perbuatan_pidana', 'nolp_pidana', 'tgllp_pidana', 'peran_narkoba',
        'jenis_narkoba', 'no_kep', 'tgl_kep', 'putusan_1', 'putusan_2', 'putusan_3', 'putusan_4', 'putusan_5', 'putusan_6', 'putusan_7', 'putusan_8',
        'putusan_9', 'putusan_10', 'putusan_11', 'putusan_12', 'nokepsp3', 'tglkepsp3'
    ];

    public function getPolda()
    {
        return $this->hasOne(SatuanPolda::class, 'id', 'polda');
    }

    public function getJenisPelanggar()
    {
        return $this->hasOne(JenisPelanggaran::class, 'id', 'jenis_pelanggaran');
    }

}