<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WujudPerbuatanPidana extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'jenis_pelanggaran_id'];
}
