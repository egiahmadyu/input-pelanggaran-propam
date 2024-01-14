<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolresTerduga extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'polda_terduga_id'];

    public function satuan_poldas()
    {
        return $this->hasOne(PoldaTerduga::class, 'id', 'polda_terduga_id');
    }
}
