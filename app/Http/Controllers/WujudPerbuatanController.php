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

    public function checkNarkoba($wp)
    {
        $data = WujudPerbuatan::where('id', $wp)
            ->where(function ($query) {
                $query->where('name', 'like', '%narkotika%');
                $query->orwhere('name', 'like', '%Narkoba%');
            })
            ->exists();
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
}
