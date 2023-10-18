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
        'putusan_9', 'putusan_10', 'putusan_11', 'putusan_12', 'nokepsp3', 'tglkepsp3', 'penyelesaian', 'pelanggar',
        'alasan_dihentikan', 'putusan_sidang_pidana', 'pasal_pidana', 'created_by', 'updated_by', 'is_delete', 'edited_by'
    ];

    public function satuan_poldas()
    {
        return $this->hasOne(SatuanPolda::class, 'id', 'polda');
    }

    public function satuan_polres()
    {
        return $this->hasOne(SatuanPolres::class, 'id', 'polres');
    }

    public function satuan_polseks()
    {
        return $this->hasOne(SatuanPolsek::class, 'id', 'polsek');
    }

    public function pangkats()
    {
        return $this->hasOne(Pangkat::class, 'id', 'pangkat');
    }

    public function getDiktuk()
    {
        return $this->hasOne(Diktuk::class, 'id', 'diktuk');
    }

    public function jenis_pelanggarans()
    {
        return $this->hasOne(JenisPelanggaran::class, 'id', 'jenis_pelanggaran');
    }

    public function getjenisKelamin()
    {
        return $this->hasOne(Gender::class, 'id', 'jenis_kelamin');
    }

    public function genders()
    {
        return $this->hasOne(Gender::class, 'id', 'jenis_kelamin');
    }

    public function getWujudPerbuatan()
    {
        return $this->hasOne(WujudPerbuatan::class, 'id', 'wujud_perbuatan');
    }

    public function wujud_perbuatans()
    {
        return $this->hasOne(WujudPerbuatan::class, 'id', 'wujud_perbuatan');
    }

    public function getWujudPerbuatanPidana()
    {
        return $this->hasOne(WujudPerbuatanPidana::class, 'id', 'wujud_perbuatan_pidana');
    }

    public function getPeranNarkoba()
    {
        return $this->hasOne(PeranNarkoba::class, 'id', 'peran_narkoba');
    }

    public function getJenisNarkoba()
    {
        return $this->hasOne(JenisNarkoba::class, 'id', 'jenis_narkoba');
    }

    public function getPutusan1()
    {
        return $this->hasOne(Putusan::class, 'id', 'putusan_1');
    }

    public function getPutusan2()
    {
        return $this->hasOne(Putusan::class, 'id', 'putusan_2');
    }

    public function getPutusan3()
    {
        return $this->hasOne(Putusan::class, 'id', 'putusan_3');
    }

    public function getPutusan4()
    {
        return $this->hasOne(Putusan::class, 'id', 'putusan_4');
    }

    public function getPutusan5()
    {
        return $this->hasOne(Putusan::class, 'id', 'putusan_5');
    }

    public function getPutusan6()
    {
        return $this->hasOne(Putusan::class, 'id', 'putusan_6');
    }

    public function getPutusan7()
    {
        return $this->hasOne(Putusan::class, 'id', 'putusan_8');
    }

    public function getPutusan9()
    {
        return $this->hasOne(Putusan::class, 'id', 'putusan_9');
    }

    public function getPutusan10()
    {
        return $this->hasOne(Putusan::class, 'id', 'putusan_10');
    }

    public function getPutusan11()
    {
        return $this->hasOne(Putusan::class, 'id', 'putusan_11');
    }

    public function getPutusan12()
    {
        return $this->hasOne(Putusan::class, 'id', 'putusan_12');
    }

    public function alasan_berhentis()
    {
        return $this->hasOne(AlasanBerhenti::class, 'id', 'alasan_dihentikan');
    }

    public function pembuat()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function pengupdate()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }
}
