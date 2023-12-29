<?php

namespace App\Http\Controllers;

use App\Models\PelanggaranList;
use App\Models\SatuanPolda;
use App\Models\SatuanPolres;
use App\Models\SatuanPolsek;
use App\Models\PolresTerduga;
use App\Models\PolsekTerduga;
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

    public function getPolresByPoldaTerduga($polda_id)
    {
        $data = PolresTerduga::where('polda_terduga_id', $polda_id)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function getPolseByPolresTerduga($polres_id)
    {
        $data = PolsekTerduga::where('polres_terduga_id', $polres_id)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function deletePolres($polres_id)
    {
        $pelanggar = PelanggaranList::where('polres', $polres_id)->exists();
        if ($pelanggar) {
            return response()->json([
                'status' => 400,
                'message' => 'Polres tidak bisa dihapus karena sudah ada data pelanggar',
                'data' => $pelanggar
            ]);
        }

        SatuanPolres::where('id', $polres_id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Data Berhasil Dihapus'
        ]);
    }

    public function deletePolda($polda_id)
    {
        $pelanggar = PelanggaranList::where('polda', $polda_id)->exists();
        if ($pelanggar) {
            return response()->json([
                'status' => 400,
                'message' => 'Polres tidak bisa dihapus karena sudah ada data pelanggar',
                'data' => $pelanggar
            ]);
        }

        SatuanPolda::where('id', $polda_id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Data Berhasil Dihapus'
        ]);
    }
}
