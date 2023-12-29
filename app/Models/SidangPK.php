<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidangPK extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_putusan', 'tanggal_putusan', 'putusan_sidang_pk', 'data_pelanggar_id'
    ];
}
