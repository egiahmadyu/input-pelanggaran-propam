<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
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
use App\Models\PutusanPelanggar;
use App\Models\SatuanPolda;
use App\Models\User;
use App\Models\WujudPerbuatan;
use App\Models\WujudPerbuatanPelanggar;
use App\Models\WujudPerbuatanPidana;
use App\Models\HistoryEdit;
use App\Models\SatuanPolres;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataKesatuanController extends Controller
{
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
            'jabatans' => PelanggaranList::groupBy(DB::raw('to_char(jabatan)'))->select(DB::raw('to_char(jabatan)'))->get()
        ];

        if (auth()->user()->hasRole('polda')) {
            $data['polres'] = SatuanPolres::where('polda_id', auth()->user()->polda_id)->get();
        }
        return view('content.pelanggaran_kesatuan.index', $data);
    }

    private function getData(Request $request)
    {
        $data = PelanggaranList::with('jenis_pelanggarans')->with('satuan_poldas')->with('pangkats')
            ->with('genders')->with('wujud_perbuatans')->with('pembuat')->with('pengupdate')
            ->where('is_delete', 0);


        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda_terduga', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres_terduga', auth()->user()->polres_id);
        } else if (auth()->user()->getRoleNames()[0] == 'mabes') {
            if (auth()->user()->mabes == 'provos') $data = $data->where('jenis_pelanggaran', 1);
            else if (auth()->user()->mabes == 'wabprof') $data = $data->where('jenis_pelanggaran', 2);
            if ($request->polda) $data = $data->where('polda_terduga', $request->polda);
        } else {
            if ($request->polda) $data = $data->where('polda_terduga', $request->polda);
        }



        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }

        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);

        if ($request->jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $request->jenis_pelanggaran);

        if ($request->wujud_perbuatan) $data = $data->where('wujud_perbuatan', $request->wujud_perbuatan);

        if ($request->nama_pelanggar) $data = $data->where(DB::raw('upper(nama)'), 'like', '%' . strtoupper($request->nama_pelanggar) . '%');

        if ($request->nrp) $data = $data->where('nrp_nip', 'like', '%' . $request->nrp . '%');

        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);

        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if ($request->tanggal_mulai_kep) $data = $data->where('tgl_kep', '>=', $request->tanggal_mulai_kep);

        if ($request->tanggal_akhir_kep) $data = $data->where('tgl_kep', '<=', $request->tanggal_akhir_kep);

        if ($request->tanggal_mulai_sp) $data = $data->where('tglkepsp3', '>=', $request->tanggal_mulai_sp);

        if ($request->tanggal_akhir_sp) $data = $data->where('tglkepsp3', '<=', $request->tanggal_akhir_sp);


        if ($request->jabatan) {
            $data = $data->where(DB::raw('upper(jabatan)'), 'like', '%' . strtoupper($request->jabatan) . '%');
            // $jabatan = $request->jabatan;
            // $data = $data->join('satuan_poldas', 'satuan_poldas.id', 'polda')
            //     ->join('satuan_polres', 'satuan_polres.id', 'polres')
            //     ->join('satuan_polseks', 'satuan_polseks.id', 'polsek');

            // $data = $data->where(function ($query) use ($jabatan) {
            //     $query->where('jabatan', 'like', '%' . $jabatan . '%')
            //         ->orWhere('satuan_poldas.name', 'like', '%' . $jabatan . '%')
            //         ->orWhere('satuan_polres.name', 'like', '%' . $jabatan . '%')
            //         ->orWhere('satuan_polseks.name', 'like', '%' . $jabatan . '%');
            // });
            // $data = $data->select('pelanggaran_lists.*');
        }
        $data = $data->orderBy('tgllp', 'desc');
        return $data;
    }

    public function show(Request $request)
    {
        $data  = $this->getData($request);
        // dd($data->get());
        return Datatables::eloquent($data)->addIndexColumn()
            ->setRowAttr([
                'style' => function ($data) {
                    return $data->penyelesaian ? 'background-color: #2f13bd;color:white' : '';
                }
            ])
            ->addColumn('kesatuan_satker', function ($row) {
                $result = '';
                if ($row->polda) $result .= $row->satuan_poldas->name;
                if ($row->polres) $result .= '<br>'.$row->satuan_polres->name;
                if ($row->polsek) $result .= '<br>'.$row->satuan_polseks->name;
                return $result;
            })
            ->addColumn('kesatuan_terduga', function ($row) {
                $result = '';
                if ($row->polda_terduga) $result .= $row->terduga_polda->name;
                if ($row->polres_terduga) $result .= '<br>'.$row->terduga_polres->name;
                if ($row->polsek_terduga) $result .= '<br>'.$row->terduga_polsek->name;
                return $result;
            })
            ->addColumn('created', function ($data) {
                return $data->created_by ? $data->pembuat->name : '-';
            })
            ->addColumn('updated', function ($data) {
                return $data->updated_by ? $data->pengupdate->name : '-';
            })
            ->editColumn('tgllp', function($data) {
                return $data->tgllp ? date('d-m-Y', strtotime($data->tgllp)) : '-';
            })
            ->rawColumns(['kesatuan_terduga', 'kesatuan_satker'])
            ->make(true);
    }

    public function exportData(Request $request)
    {
        $data = $this->getData($request);
        $data = $data->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setCellValue('A1', 'Jenis Pelanggaran');
        $sheet->setCellValue('B1', 'NRP / NIP');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Jenis Kelamin');
        $sheet->setCellValue('E1', 'Pangkat');
        $sheet->setCellValue('F1', 'Jabatan');
        $sheet->setCellValue('G1', 'Diktuk');
        $sheet->setCellValue('H1', 'Mabes / Polda Yang Menangani');
        $sheet->setCellValue('I1', 'Satker Yang Menangani');
        $sheet->setCellValue('J1', 'Satker Polda / Satker Polres / Polsek Yang Menangani');
        $sheet->setCellValue('K1', 'Mabes / Polda Terduga');
        $sheet->setCellValue('L1', 'Satker Terduga');
        $sheet->setCellValue('M1', 'Satker Polda / Satker Polres / Polsek Terduga');
        $sheet->setCellValue('N1', 'NO. LP');
        $sheet->setCellValue('O1', 'Tgl LP');
        $sheet->setCellValue('P1', 'Wujud Perbuatan');
        $sheet->setCellValue('Q1', 'Kronologi Singkat');
        $sheet->setCellValue('R1', 'Pasal Pelanggaran');
        $sheet->setCellValue('S1', 'PIDANA');
        $sheet->setCellValue('T1', 'Wujud Perbuatan Pidana');
        $sheet->setCellValue('U1', 'No. LP Pidana');
        $sheet->setCellValue('V1', 'Tgl LP Pidana');
        $sheet->setCellValue('W1', 'Pasal Pidana');
        $sheet->setCellValue('X1', 'Putusan Pidana');
        $sheet->setCellValue('Y1', 'Peran Narkoba');
        $sheet->setCellValue('Z1', 'Jenis Narkoba');
        $sheet->setCellValue('AA1', 'NO. Kep');
        $sheet->setCellValue('AB1', 'Tgl. Kep');
        $sheet->setCellValue('AC1', 'NO. DP3D / BP3KEPP');
        $sheet->setCellValue('AD1', 'Tanggal DP3D / BP3KEPP'); $position = 'AE';
        $sheet->setCellValue($position.'1', 'Putusan 1'); $position++;
        $sheet->setCellValue($position.'1', 'Putusan 2'); $position++;
        $sheet->setCellValue($position.'1', 'Putusan 3'); $position++;
        $sheet->setCellValue($position.'1', 'Putusan 4'); $position++;
        $sheet->setCellValue($position.'1', 'Putusan 5'); $position++;
        $sheet->setCellValue($position.'1', 'Putusan 6'); $position++;
        $sheet->setCellValue($position.'1', 'Putusan 7'); $position++;
        $sheet->setCellValue($position.'1', 'Putusan 8'); $position++;
        $sheet->setCellValue($position.'1', 'Putusan 9'); $position++;
        $sheet->setCellValue($position.'1', 'Putusan 10'); $position++;
        $sheet->setCellValue($position.'1', 'Putusan 11'); $position++;
        $sheet->setCellValue($position.'1', 'Putusan 12'); $position++;
        $sheet->setCellValue($position.'1', 'No Kep Penghentian'); $position++;
        $sheet->setCellValue($position.'1', 'Tgl Kep Penghentian'); $position++;
        $sheet->setCellValue($position.'1', 'Alasan Dihentikan'); $position++;
        $sheet->setCellValue($position.'1', 'Dibuat oleh'); $position++;
        $sheet->setCellValue($position.'1', 'Diupdate oleh'); $position++;
        $sheet->setCellValue($position.'1', 'Diedit oleh');
        $spreadsheet->getActiveSheet()->getStyle('A1:AQ1')->applyFromArray($this->headerStyle);
        $startRow = 2;
        $startCol = 'A';

        foreach ($data as $key => $value) {
            $sheet->setCellValue("{$startCol}{$startRow}", $value->jenis_pelanggarans->name);
            $startCol++;
            $sheet->setCellValueExplicit("{$startCol}{$startRow}", $value->nrp_nip, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
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
            $sheet->setCellValue("{$startCol}{$startRow}", $value->satuan_polres->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->satuan_polseks->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->terduga_polda->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->terduga_polres->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->terduga_polsek->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->nolp);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->tgllp);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->getWujudPerbuatan->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->kronologi_singkat);
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
            $sheet->setCellValue("{$startCol}{$startRow}", $value->putusan_sidang_pidana);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->getPeranNarkoba->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->getJenisNarkoba->name ?? '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->no_kep);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->tgl_kep);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->dp3d_bp3kkepp);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->tanggal_dp3d_bp3kkepp);
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
            $sheet->setCellValue("{$startCol}{$startRow}", $value->alasan_dihentikan ? $value->alasan_berhentis->name : '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->created_by ? $value->pembuat->name . ' : ' . Helper::tanggal($value->created_at) : '');
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->updated_by ? $value->pengupdate->name . ' : ' . Helper::tanggal($value->updated_at) : '');
            $startCol++;
            if ($value->edited_by) {
                $history = HistoryEdit::where('data_pelanggar_id', $value->id)
                    ->orderBy('id', 'desc')
                    ->first();
                $sheet->setCellValue("{$startCol}{$startRow}", $value->edited_by ? $value->pengedit->name . ' : ' . Helper::tanggal($history->updated_at) : '');
            }
            $startCol++;
            $startRow++;
            $startCol = 'A';
        }
        $row = 'a';
        // $row++;
        // $row++;
        // dd($row);
        for ($i = 1; $i < 47; $i++) {
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
