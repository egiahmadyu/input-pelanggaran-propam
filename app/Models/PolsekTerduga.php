<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolsekTerduga extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'polres_terduga_id'];
}