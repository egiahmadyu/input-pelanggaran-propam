<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PutusanPelanggar extends Model
{
    use HasFactory;
    protected $fillable = [
        'pelanggar_id', 'putusan', 'putusan_id'
    ];
}
