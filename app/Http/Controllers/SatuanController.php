<?php

namespace App\Http\Controllers;

use App\Models\SatuanPolres;
use App\Models\SatuanPolsek;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function getPolresByPolda($polda_id)
    {
        $data = SatuanPolres::where('polda_id', $polda_id)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function getPolseByPolres($polres_id)
    {
        $data = SatuanPolsek::where('polres_id', $polres_id)->get();
        return response()->json([
            'data' => $data
        ]);
    }
}