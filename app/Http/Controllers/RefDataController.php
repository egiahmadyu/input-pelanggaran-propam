<?php

namespace App\Http\Controllers;

use App\Models\JenisNarkoba;
use App\Models\JenisPelanggaran;
use App\Models\PelanggaranList;
use App\Models\SatuanPolda;
use App\Models\SatuanPolres;
use App\Models\SatuanPolsek;
use App\Models\WujudPerbuatan;
use App\Models\WujudPerbuatanPidana;
use Database\Seeders\Narkoba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\DataTables;

class RefDataController extends Controller
{
    public function wujudPerbuatanPidana(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = WujudPerbuatanPidana::orderBy('id', 'desc');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $res = base64_encode(json_encode($row));
                    $btn = '<button class="btn btn-warning btn-sm" onclick=modalEdit(' . $row->id . ')>Edit</button> | <a href="/wujud-perbuatan-pidana/delete/' . $row->id . '" class="btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('content.refData.wujud_perbuatan_pidana');
    }

    public function wujudPerbuatan(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = WujudPerbuatan::orderBy('id', 'desc')->with('jenisPelanggaran');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $res = base64_encode(json_encode($row));
                    $btn = '<button class="btn btn-warning btn-sm" onclick=modalEdit(' . $row->id . ')>Edit</button> | <a href="/data-master/wujud-perbuatan/delete/' . $row->id . '" class="btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data['jenis_pelanggaran'] = JenisPelanggaran::all();

        return view('content.refData.wujud_perbuatan', $data);
    }

    public function saveWPP(Request $request)
    {
        $data = WujudPerbuatanPidana::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function saveEditWPP(Request $request)
    {
        $data = WujudPerbuatanPidana::where('id', $request->id)
            ->update([
                'name' => $request->name
            ]);

        return redirect()->back()->with('success', 'Berhasil Edit Data');
    }

    public function saveEditWP(Request $request)
    {
        $data = WujudPerbuatan::where('id', $request->id)
            ->update([
                'name' => $request->name
            ]);

        return redirect()->back()->with('success', 'Berhasil Edit Data');
    }

    public function deleteWPP($id)
    {
        $data = WujudPerbuatanPidana::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function deleteWujudPerbuatan($id)
    {
        $data = WujudPerbuatan::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function saveWujudPerbuatan(Request $request)
    {
        $data = WujudPerbuatan::create([
            'name' => $request->name,
            'jenis_pelanggaran_id' => $request->jenis_pelanggaran_id
        ]);
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function satuanPolda()
    {
        $data = [
            'url_data' => 'satuan-data/polda',
            'modal_id' => 'modalPolda',
            'poldas' => array(),
            'polres' => array(),
            'type' => 'Polda / Mabes'

        ];
        return view('content.refData.satuanPolri', $data);
    }

    public function getPolda()
    {
        $data = SatuanPolda::select('*');
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $res = base64_encode(json_encode($row));
                $btn = '<button onclick="deletePolda(' . $row->id . ')" class="btn btn-danger btn-sm">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function satuanPolres()
    {
        $data = [
            'url_data' => 'satuan-data/polres',
            'modal_id' => 'modalPolres',
            'poldas' => SatuanPolda::all(),
            'polres' => array()

        ];
        return view('content.refData.satuan-polres', $data);
    }

    public function satuanPolsek()
    {
        $data = [
            'url_data' => 'satuan-data/polsek',
            'modal_id' => 'modalPolsek',
            'polres' => SatuanPolres::all(),
            'poldas' => array()

        ];
        return view('content.refData.satuan-polsek', $data);
    }

    public function getPolres()
    {
        $data = SatuanPolres::with('satuan_poldas');
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $res = base64_encode(json_encode($row));
                $btn = '<button onclick="deletePolres(' . $row->id . ')" class="btn btn-danger btn-sm">Delete</button>';
                return $btn;
            })
            ->orderColumn('satuan_poldas.name', function ($query, $order) {
                $query->orderBy('satuan_poldas.name', $order);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getPolsek()
    {
        $data = SatuanPolsek::with('satuan_polreses', 'satuan_polreses.satuan_poldas');
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $res = base64_encode(json_encode($row));
                $btn = '<a href="/satuan-data/polsek/delete/' . $row->id . '" class="btn btn-danger btn-sm">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function savePolda(Request $request)
    {
        $data = SatuanPolda::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function savePolres(Request $request)
    {

        $data = SatuanPolres::create([
            'name' => $request->name,
            'polda_id' => $request->polda_id
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function savePolsek(Request $request)
    {
        $data = SatuanPolsek::create([
            'name' => $request->name,
            'polres_id' => $request->polres_id
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function deletePolsek($id)
    {
        $data = SatuanPolsek::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function deletePolres($id)
    {
        $polsek = SatuanPolsek::where('polres_id', $id)->delete();
        $polres = SatuanPolres::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function deletePolda($id)
    {
        // $polsek = SatuanPolsek::where('polres_id', $id)->delete();
        $polres = SatuanPolres::where('polda_id', $id)->get();
        // dd($id);

        foreach ($polres as $key => $value) {
            $polsek = SatuanPolsek::where('polres_id', $value->id)->delete();
        }

        SatuanPolres::where('polda_id', $id)->delete();
        $polda = SatuanPolda::where('id', $id)->delete();


        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function viewNarkoba()
    {
        $data['narkobas'] = JenisNarkoba::all();
        return view('content.refData.narkoba', $data);
    }

    public function deleteNarkoba($id)
    {
        $check = PelanggaranList::where('jenis_narkoba', $id)->get();
        if (count($check) > 0) {
            return redirect()->back()->with('error', 'Data terhubung ke pelanggar tidak bisa dihapus');
        }
        JenisNarkoba::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Data');
    }

    public function importPolda(Request $request)
    {
        $the_file = $request->file('uploaded_file');
        $the_file->move('file_upload', $the_file->getClientOriginalName());
        $spreadsheet = IOFactory::load('file_upload/' . $the_file->getClientOriginalName());
        $sheet        = $spreadsheet->getActiveSheet();
        $row_limit    = $sheet->getHighestDataRow();
        $column_limit = $sheet->getHighestDataColumn();
        $row_range    = range(2, $row_limit);
        $column_range = range('F', $column_limit);
        $startcount = 2;
        foreach ($row_range as $row) {
            $polda_name = $sheet->getCell('A' . $row)->getValue();
            if ($polda_name) {
                if (!$polda = SatuanPolda::where(DB::raw('upper(name)'), 'like', '%' . strtoupper($polda_name) . '%')->first()) {
                    echo $polda_name . '<br>';
                    $polda = SatuanPolda::create([
                        'name' => strtoupper($polda_name)
                    ]);
                }
            }
        }
        return redirect()->back()->with('success', 'import data berhasil');
    }

    public function importPolres(Request $request)
    {
        ini_set('max_execution_time', '0');
        $the_file = $request->file('uploaded_file');
        // dd($request->all());
        $the_file->move('file_upload', $the_file->getClientOriginalName());
        $spreadsheet = IOFactory::load('file_upload/' . $the_file->getClientOriginalName());
        $sheet        = $spreadsheet->getActiveSheet();
        $row_limit    = $sheet->getHighestDataRow();
        $column_limit = $sheet->getHighestDataColumn();
        $row_range    = range(2, $row_limit);
        $column_range = range('F', $column_limit);
        $startcount = 2;
        foreach ($row_range as $row) {
            $polda_name = $sheet->getCell('A' . $row)->getValue();
            if ($polda_name) {
                if (!$polda = SatuanPolda::where(DB::raw('upper(name)'), 'like', '%' . strtoupper($polda_name) . '%')->first()) {
                    echo $polda_name . '<br>';
                    $polda = SatuanPolda::create([
                        'name' => strtoupper($polda_name)
                    ]);
                }
            }
            $polres_name = $sheet->getCell('B' . $row)->getValue();
            if ($polres_name) {
                if (!$polres = SatuanPolres::where(DB::raw('upper(name)'), 'like', '%' . strtoupper($polres_name) . '%')->where('polda_id', $polda->id)->first()) {
                    echo $polres_name . '<br>';
                    $polres = SatuanPolres::create([
                        'polda_id' => $polda->id,
                        'name' => strtoupper($polres_name)
                    ]);
                }
            }
        }
        return redirect()->back()->with('success', 'import data berhasil');
    }

    public function importPolsek(Request $request)
    {
        ini_set('max_execution_time', '0');
        $the_file = $request->file('uploaded_file');
        // dd($request->all());
        $the_file->move('file_upload', $the_file->getClientOriginalName());
        $spreadsheet = IOFactory::load('file_upload/' . $the_file->getClientOriginalName());
        $sheet        = $spreadsheet->getActiveSheet();
        $row_limit    = $sheet->getHighestDataRow();
        $column_limit = $sheet->getHighestDataColumn();
        $row_range    = range(2, $row_limit);
        $column_range = range('F', $column_limit);
        $startcount = 2;
        foreach ($row_range as $row) {
            $polda_name = $sheet->getCell('A' . $row)->getValue();
            if ($polda_name) {
                if (!$polda = SatuanPolda::where(DB::raw('upper(name)'), 'like', '%' . strtoupper($polda_name) . '%')->first()) {
                    echo $polda_name . '<br>';
                    $polda = SatuanPolda::create([
                        'name' => strtoupper($polda_name)
                    ]);
                }
            }
            $polres_name = $sheet->getCell('B' . $row)->getValue();
            if ($polres_name) {
                if (!$polres = SatuanPolres::where(DB::raw('upper(name)'), 'like', '%' . strtoupper($polres_name) . '%')->where('polda_id', $polda->id)->first()) {
                    echo $polres_name . '<br>';
                    $polres = SatuanPolres::create([
                        'polda_id' => $polda->id,
                        'name' => strtoupper($polres_name)
                    ]);
                }
            }
            $polsek_name = $sheet->getCell('C' . $row)->getValue();
            if ($polsek_name) {
                if (!$polsek = SatuanPolsek::where('polres_id', $polres->id)->where('name', strtoupper($polsek_name))->first()) {
                    $polsek = SatuanPolsek::create([
                        'polres_id' => $polres->id,
                        'name' => strtoupper($polsek_name)
                    ]);
                }
            }
        }
        return redirect()->back()->with('success', 'import data berhasil');
    }
}
