<?php

namespace App\Http\Controllers;

use App\Models\WujudPerbuatan;
use Illuminate\Http\Request;

class WujudPerbuatanController extends Controller
{
    public function getWPbyType($type)
    {
        $data = WujudPerbuatan::where('jenis_pelanggaran_id', $type)->get();

        return response()->json([
            'data' => $data
        ]);
    }
}