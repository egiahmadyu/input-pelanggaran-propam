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
            'poldas' => SatuanPolda::all(),
            'jabatans' => PelanggaranList::groupBy('jabatan')->select('jabatan')->get()
        ];

        return view('content.pelanggaran.index', $data);
    }

    public function formEdit($id)
    {
        $data['list_petusan'] = PelanggaranList::find($id)->toArray();
        $data['putusans'] = Putusan::where('jenis_pelanggaran_id', $data['list_petusan']['jenis_pelanggaran'])->get();
        $data['id'] = $id;
        // dd($data['list_petusan']);
        return view('content.pelanggaran.edit_putusan', $data);
    }

    public function show(Request $request)
    {
        $data = PelanggaranList::with('getJenisPelanggar')->with('getPolda')->with('getPangkat');

        if ($request->polda) $data = $data->where('polda', $request->polda);

        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);

        if ($request->jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $request->jenis_pelanggaran);

        if ($request->wujud_perbuatan) $data = $data->where('wujud_perbuatan', $request->wujud_perbuatan);




        return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $res = base64_encode(json_encode($row));
                $btn = '<a href="/pelanggaran-data/edit/' . $row->id . '" class="btn btn-secondary btn-sm">Update Putusan</a> | <a href="javascript:void(0)" onclick="openDetail(' . $row->id . ')" class="btn btn-primary btn-sm">View</a>';
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
        if ($request->pidana == 'TIDAK') {
            $data->wujud_perbuatan_pidana = null;
            $data->nolp_pidana = null;
            $data->tgllp_pidana = null;
            $data->peran_narkoba = null;
            $data->jenis_narkoba = null;
        } else {
            $wpp = WujudPerbuatanPidana::find($request->wujud_perbuatan_pidana)->first();
            if ($wpp->name != 'Narkoba') {
                $data->peran_narkoba = null;
                $data->jenis_narkoba = null;
            }
        }
        $data->save();
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

    public function getDetail($id)
    {
        $data = PelanggaranList::with('getJenisPelanggar')->with('getPolda')->with('getPangkat')
            ->with('getDiktuk')
            ->where('id', $id)->first();

        return response()->json([
            'data' => $data
        ]);
    }
}
