<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WujudPerbuatanPelanggar extends Model
{
    use HasFactory;
    protected $fillable = [
        'pelanggar_id', 'wujud_perbuatan_id'
    ];
}
