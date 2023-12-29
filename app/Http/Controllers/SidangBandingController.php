<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SidangBanding;
use App\Models\PelanggaranList;
use App\Models\PutusanSidangBanding;
use App\Models\Putusan;

class SidangBandingController extends Controller
{
    public function sidang_banding_view($id)
    {
        $data['sidang_banding'] = SidangBanding::where('data_pelanggar_id', $id)->first();
        $data['id'] = $id;
        if($data['sidang_banding']) $data['list_putusan'] = PutusanSidangBanding::where('sidang_banding_id', $data['sidang_banding']->id)->get()->toArray();
        $data['putusans'] = Putusan::where('jenis_pelanggaran_id', 2)->get();
        return view('content.pelanggaran.putusan_sidang_banding', $data);
    }

    public function save(Request $request, $id)
    {
        $sidang_banding = SidangBanding::where('data_pelanggar_id', $id)->first();
        if($sidang_banding) {
            $sidang_banding->tanggal_putusan = $request->tanggal_putusan;
            $sidang_banding->putusan_sidang_banding = $request->putusan_sidang_banding;
            $sidang_banding->no_putusan = $request->no_putusan;
            $sidang_banding->save();

            PutusanSidangBanding::where('sidang_banding_id', $sidang_banding->id)->delete();
        } else {
            $sidang_banding = SidangBanding::create([
                'data_pelanggar_id' => $id,
                'tanggal_putusan' => $request->tanggal_putusan,
                'putusan_sidang_banding' => $request->putusan_sidang_banding,
                'no_putusan' => $request->no_putusan
            ]);
        }

        $i = 2;
        foreach ($request->putusan as $key => $value) {
            if ($value) {
                PutusanSidangBanding::create([
                    'sidang_banding_id' => $sidang_banding->id,
                    'putusan' => 'putusan_'.$i,
                    'putusan_id' => $value
                ]);
                $i++;
            }
        }

        return redirect()->back();
    }
}
