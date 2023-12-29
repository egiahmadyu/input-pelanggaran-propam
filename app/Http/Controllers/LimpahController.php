<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelanggaranList;
use App\Models\SatuanPolda;
use App\Models\HistoryLimpah;

class LimpahController extends Controller
{
    public function modal_limpah_view($id)
    {
        $data['pelanggar'] = PelanggaranList::find($id);
        $data['poldas'] = SatuanPolda::all();

        $html = view('content.pelanggaran.modal_body.modal_limpah', $data)->render();

        return response()->json([
            'html' => $html
        ]);
    }

    public function save(Request $request)
    {
        HistoryLimpah::create([
            'data_pelanggar_id' => $request->data_pelanggar_id,
            'polda' => $request->polda,
            'polres' => $request->polres,
            'polsek' => $request->polsek,
            'limpah_by' => auth()->user()->id
        ]);
        PelanggaranList::where('id', $request->data_pelanggar_id)
        ->update([
            'polda' => $request->polda,
            'polres' => $request->polres,
            'polsek' => $request->polsek
        ]);
        return redirect()->back();

    }
}
