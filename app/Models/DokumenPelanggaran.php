<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPelanggaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'dokumen_keputusan_sidang', 'data_pelanggar_id', 'title'
    ];
}
