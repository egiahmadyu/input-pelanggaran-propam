<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelanggaranList;
use App\Models\DokumenPelanggaran;

class DokumenPelanggaranController extends Controller
{
    public function modal_dokumen($id)
    {
        $data['pelanggar'] = PelanggaranList::find($id);
        $data['dokumen'] = DokumenPelanggaran::where('data_pelanggar_id', $id)->get();
        $html = view('content.pelanggaran.modal_body.dokumen_pelanggar', $data)->render();
        return response()->json([
            'html' => $html
        ]);
    }

    public function upload_dokumen(Request $request)
    {
        $filename = time() . '.' . $request->dokumen->extension();
        try {
            $request->dokumen->move(public_path('dokumen_pelanggar'), $filename);
            DokumenPelanggaran::create([
                'data_pelanggar_id' => $request->data_pelanggar,
                'title' => $request->title,
                'dokumen_keputusan_sidang' => 'dokumen_pelanggar/' . $filename

            ]);

        // save uploaded image filename here to your database

            return response()->json([
                'message' => 'Document uploaded successfully.',
                'image' => 'dokumen_pelanggar/' . $filename
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }

    }
}
