<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanPolres extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'polda_id'];

    public function satuan_poldas()
    {
        return $this->hasOne(SatuanPolda::class, 'id', 'polda_id');
    }
}
