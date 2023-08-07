<?php

namespace App\Http\Controllers;

use App\Models\Putusan;
use Illuminate\Http\Request;

class PutusanController extends Controller
{
    public function getPutusanByType($type)
    {
        $data = Putusan::where('jenis_pelanggaran_id', $type)->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
