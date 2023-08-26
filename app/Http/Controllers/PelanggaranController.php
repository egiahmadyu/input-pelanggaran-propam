<?php

namespace App\Http\Controllers;

use App\Models\AlasanBerhenti;
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
use App\Models\User;
use App\Models\WujudPerbuatan;
use App\Models\WujudPerbuatanPidana;
use Illuminate\Http\Request;
use DataTables;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PelanggaranController extends Controller
{
    private $headerStyle;
    private $fontStyle;
    private $fontStylePdf;
    private $status;
    private $role;
    private $province_id;
    private $dati_id;

    public function __construct()
    {
        $this->headerStyle = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FCE0E0E0',
                ],
            ],
        ];

        $this->fontStyle = [
            'font' => [
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ],
        ];

        $this->fontStylePdf = [
            'font' => [
                'size' => 25,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ],
        ];
    }

    public function index()
    {
        $data = [
            'jenis_pelanggarans' => JenisPelanggaran::all(),
            'jenis_kelamins' => Gender::all(),
            'pangkats' => Pangkat::all(),
            'wujud_perbuatans' => WujudPerbuatan::all(),
            'poldas' => SatuanPolda::all(),
            'alasan_berhentis' => AlasanBerhenti::all(),
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
        $data  = $this->getData($request);


        return Datatables::eloquent($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $res = base64_encode(json_encode($row));
                $btn = '<a href="/pelanggaran-data/edit/' . $row->id . '" class="btn btn-secondary btn-sm">Update Putusan</a> | <a href="javascript:void(0)" onclick="openDetail(' . $row->id . ')" class="btn btn-primary btn-sm">View</a>';
                $user = User::find(auth()->user()->id);
                if ($user->can('manage-auth')) {
                    $btn .= ' | <a href="/pelanggaran-data/edit-data/' . $row->id . '" class="btn btn-secondary btn-sm">Edit Data</a> | <button class="btn btn-danger btn-sm" onclick="deletePelanggaran(' . $row->id . ')">Delete</button>';
                }
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    private function getData(Request $request)
    {
        // if ($request->button == 'export') return $this->exportData($request);

        $data = PelanggaranList::with('jenis_pelanggarans')->with('satuan_poldas')->with('pangkats');

        if ($request->polda) $data = $data->where('polda', $request->polda);

        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);

        if ($request->jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $request->jenis_pelanggaran);

        if ($request->wujud_perbuatan) $data = $data->where('wujud_perbuatan', $request->wujud_perbuatan);

        if ($request->nama_pelanggar) $data = $data->where('nama', 'like', '%' . $request->nama_pelanggar . '%');

        if ($request->nrp) $data = $data->where('nrp_nip', 'like', '%' . $request->nrp . '%');

        if ($request->tanggal_mulai) $data = $data->where('created_at', '>=', $request->tanggal_mulai);

        if ($request->tanggal_akhir) $data = $data->where('created_at', '<=', $request->tanggal_akhir);


        if ($request->jabatan) {
            $jabatan = $request->jabatan;
            $data = $data->join('satuan_poldas', 'satuan_poldas.id', 'polda')
                ->join('satuan_polres', 'satuan_polres.id', 'polres')
                ->join('satuan_polseks', 'satuan_polseks.id', 'polsek');

            $data = $data->where(function ($query) use ($jabatan) {
                $query->where('jabatan', 'like', '%' . $jabatan . '%')
                    ->orWhere('satuan_poldas.name', 'like', '%' . $jabatan . '%')
                    ->orWhere('satuan_polres.name', 'like', '%' . $jabatan . '%')
                    ->orWhere('satuan_polseks.name', 'like', '%' . $jabatan . '%');
            });
            $data = $data->select('pelanggaran_lists.*');
        }

        return $data;
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
            'alasan_berhentis' => AlasanBerhenti::all(),
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

    public function editData($id)
    {
        $pelanggaran = PelanggaranList::find($id);
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
            'putusans' => Putusan::where('jenis_pelanggaran_id', $pelanggaran->jenis_pelanggaran)->get(),
            'data' => $pelanggaran
        ];
        $data['id'] = $id;
        $data['list_petusan'] = PelanggaranList::find($id)->toArray();
        return view('content.pelanggaran.edit', $data);
    }

    public function saveEdit(Request $request, $id)
    {
        // dd($id);
        unset($request['_token']);
        // dd($request->all());
        PelanggaranList::where('id', $id)->update($request->all());
        $data = PelanggaranList::find($id);
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
        return redirect()->back();
    }

    public function getDetail($id)
    {
        $data = PelanggaranList::with('jenis_pelanggarans')->with('satuan_poldas')->with('pangkats')
            ->with('getDiktuk')
            ->where('id', $id)->first();

        return response()->json([
            'data' => $data
        ]);
    }

    public function deleteData($id)
    {
        $data = PelanggaranList::where('id', $id)->delete();
        return response()->json([
            'data' => $data
        ]);
    }

    public function exportData(Request $request)
    {
        $data = $this->getData($request);
        $data = $data->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setCellValue('A1', 'Jeni Pelanggaran');
        $sheet->setCellValue('B1', 'NRP / NIP');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Jenis Kelamin');
        $sheet->setCellValue('E1', 'Pangkat');
        $sheet->setCellValue('F1', 'Jabatan');
        $sheet->setCellValue('G1', 'Diktuk');
        $sheet->setCellValue('H1', 'Polda / Sederajat');
        $sheet->setCellValue('I1', 'Polres / Sederajat');
        $sheet->setCellValue('J1', 'Polsek / Sederajat');
        $sheet->setCellValue('K1', 'NO. LP');
        $sheet->setCellValue('L1', 'Tgl LP');
        $sheet->setCellValue('M1', 'Wujud Perbuatan');
        $sheet->setCellValue('N1', 'Kronologi Singkat');
        $sheet->setCellValue('O1', 'Pasal Pelanggaran');
        $sheet->setCellValue('P1', 'PIDANA');
        $sheet->setCellValue('Q1', 'Wujud Perbuatan Pidana');
        $sheet->setCellValue('R1', 'No. LP Pidana');
        $sheet->setCellValue('S1', 'Tgl LP Pidana');
        $sheet->setCellValue('T1', 'Pasal Pidana');
        $sheet->setCellValue('U1', 'Peran Narkoba');
        $sheet->setCellValue('V1', 'Jenis Narkoba');
        $sheet->setCellValue('W1', 'Putusan Sidang Pidana');
        $sheet->setCellValue('X1', 'NO. Kep');
        $sheet->setCellValue('Y1', 'Tgl. Kep');
        $sheet->setCellValue('Z1', 'Putusan 1');
        $sheet->setCellValue('AA1', 'Putusan 2');
        $sheet->setCellValue('AB1', 'Putusan 3');
        $sheet->setCellValue('AC1', 'Putusan 4');
        $sheet->setCellValue('AD1', 'Putusan 5');
        $sheet->setCellValue('AE1', 'Putusan 6');
        $sheet->setCellValue('AF1', 'Putusan 7');
        $sheet->setCellValue('AG1', 'Putusan 8');
        $sheet->setCellValue('AH1', 'Putusan 9');
        $sheet->setCellValue('AI1', 'Putusan 10');
        $sheet->setCellValue('AJ1', 'Putusan 11');
        $sheet->setCellValue('AK1', 'Putusan 12');
        $sheet->setCellValue('AL1', 'No KEP sp3');
        $sheet->setCellValue('AM1', 'Tgl KEP sp3');
        $spreadsheet->getActiveSheet()->getStyle('A1:AM1')->applyFromArray($this->headerStyle);
        $startRow = 2;
        $startCol = 'A';

        foreach ($data as $key => $value) {
            $sheet->setCellValue("{$startCol}{$startRow}", $value->jenis_pelanggarans->name);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->nrp_nip);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->nama);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->getJenisKelamin->gender ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->pangkats->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->jabatan);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->getDiktuk->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->satuan_poldas->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->getPolres->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->getPolsek->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->nolp);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->tgllp);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->getWujudPerbuatan->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->kronolog_singkat);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->pasal_pelanggaran ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->pidana);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->getWujudPerbuatanPidana->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->nolp_pidana);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->tgllp_pidana);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->pasal_pidana);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->getPeranNarkoba->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->getJenisNarkoba->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->putusan_sidang_pidana ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->no_kep);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->tgk_kep);
            $startCol++;
            for ($i = 1; $i < 13; $i++) {
                $putusan = 'getPutusan' . $i;
                $sheet->setCellValue("{$startCol}{$startRow}", $value->$putusan->name ?? '');
                $startCol++;
            }
            $sheet->setCellValue("{$startCol}{$startRow}", $value->nokepsp3);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->tglkepsp3);
            $startCol++;
            $startRow++;
            $startCol = 'A';
        }
        $row = 'a';
        // $row++;
        // $row++;
        // dd($row);
        for ($i = 1; $i < 42; $i++) {
            $spreadsheet->getActiveSheet()->getColumnDimension($row)->setAutoSize(true);
            $row++;
        }
        $startRow--;
        $spreadsheet->getActiveSheet()
            ->getStyle("A1:J{$startRow}")
            ->applyFromArray($this->fontStyle);
        $writer = new Xlsx($spreadsheet);
        $path = storage_path("/app/data_pelanggar.xlsx");
        $writer->save($path);
        return response()->download($path, 'data_pelanggar' . time() . '.xlsx');
    }
}
