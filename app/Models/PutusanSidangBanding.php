<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PutusanSidangBanding extends Model
{
    use HasFactory;
    protected $fillable = [
        'sidang_banding_id', 'putusan', 'putusan_id'
    ];
}
