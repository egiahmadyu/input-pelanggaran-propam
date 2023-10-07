<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanPolsek extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'polres_id'];

    public function satuan_polreses()
    {
        return $this->hasOne(SatuanPolres::class, 'id', 'polres_id');
    }
}
