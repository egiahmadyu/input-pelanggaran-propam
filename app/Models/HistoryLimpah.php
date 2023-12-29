<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLimpah extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_pelanggar_id', 'polda', 'polres', 'polsek', 'limpah_by'
    ];
}
