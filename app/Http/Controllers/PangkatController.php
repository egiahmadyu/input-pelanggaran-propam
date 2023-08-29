<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    public function pangkatByType($type)
    {
        $pangkat = null;
        if ($type == 'asn') $pangkat = Pangkat::whereIn('pangkat_pelanggar_id', [6])->get();
        elseif ($type == 'polri') $pangkat = Pangkat::whereNotIn('pangkat_pelanggar_id', [6])->get();
        return response()->json([
            'status' => 200,
            'data' => $pangkat
        ]);
    }
}
