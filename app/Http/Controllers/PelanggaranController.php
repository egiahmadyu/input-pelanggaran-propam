<?php

namespace App\Http\Controllers;

use App\Models\Diktuk;
use App\Models\Gender;
use App\Models\JenisNarkoba;
use App\Models\JenisPelanggaran;
use App\Models\Pangkat;
use App\Models\PangkatPelanggaran;
use App\Models\PelanggaranList;
use App\Models\PeranNarkoba;
use App\Models\Putusan;
use App\Models\SatuanPolda;
use App\Models\WujudPerbuatan;
use App\Models\WujudPerbuatanPidana;
use Illuminate\Http\Request;
use DataTables;

class PelanggaranController extends Controller
{

    public function index()
    {
        $data = [
            'jenis_pelanggarans' => JenisPelanggaran::all(),
            'jenis_kelamins' => Gender::all(),
            'pangkats' => Pangkat::all(),
            'wujud_perbuatans' => WujudPerbuatan::all(),
            'poldas' => SatuanPolda::all()
        ];

        return view('content.pelanggaran.index', $data);
    }

    public function formEdit($id)
    {
        $data['list_petusan'] = PelanggaranList::find($id)->toArray();
        $data['id'] = $id;
        // dd($data['putusans']['putusan_1']);
        return view('content.pelanggaran.edit_putusan', $data);
    }

    public function show(Request $request)
    {
        $data = PelanggaranList::with('getJenisPelanggar');
        return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="/pelanggaran-data/edit/'.$row->id.'" class="btn btn-secondary btn-sm">Update Putusan</a> | <a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function form()
    {
        $data['genders'] = Gender::all();
        $data = [
            'jenis_pelanggarans' => JenisPelanggaran::all(),
            'genders' => Gender::all(),
            'pangkats' => Pangkat::all(),
            'diktuks' => Diktuk::all(),
            'wujud_perbuatans' => WujudPerbuatan::all(),
            'wujud_perbuatanPidanas' => WujudPerbuatanPidana::all(),
            'poldas' => SatuanPolda::all(),
            'jenis_narkobas' => JenisNarkoba::all(),
            'peran_narkobas' => PeranNarkoba::all(),
        ];
        return view('content.pelanggaran.tambah', $data);
    }

    public function save(Request $request)
    {
        $data = PelanggaranList::create($request->all());
        return redirect('/');
    }

    public function saveEdit(Request $request, $id)
    {
        // dd($id);
        unset($request['_token']);
        // dd($request->all());
        PelanggaranList::where('id', $id)->update($request->all());

        return redirect()->back();

    }
}