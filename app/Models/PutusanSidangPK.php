<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PutusanSidangPK extends Model
{
    use HasFactory;
    protected $fillable = [
        'sidang_pk_id', 'putusan', 'putusan_id'
    ];
}
