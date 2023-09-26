<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use App\Models\PelanggaranList;
use App\Models\Putusan;
use App\Models\PutusanPelanggar;
use App\Models\SatuanPolda;
use App\Models\SatuanPolres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DashboardController extends Controller
{
    private $headerStyle;
    private $fontStyle;
    private $fontStylePdf;
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
    public function index(Request $request)
    {

        $data = [
            'pelanggarans' => $this->getAllPelanggaran($request),
            'putusans_disiplin' => $this->get_putusan($request, 1),
            'putusans_kepp' => $this->get_putusan($request, 2),
            'chartPoldaNew' => $this->getChartPoldaNew($request),
            'dataByGender' => $this->getDataByGender($request),
            'dataByWpp' => $this->getDataByWpp($request),
            'dataWujudPerbuatan' => $this->getWujudPerbuatan($request),
            'dataWujudPerbuatanDisiplin' => $this->getWujudPerbuatan($request, 1),
            'dataWujudPerbuatanKepp' => $this->getWujudPerbuatan($request, 2),
            'dataWujudPerbuatanPidana' => $this->getWujudPerbuatanPidana($request, 1),
            'dataPangkatPelanggar' => $this->getDataByPangkatPelanggar($request),
            'totalPelanggarNarkoba' => $this->getDataByPelanggarNarkoba($request),
            'disiplin' => $this->getJenisPelanggaran($request, 1),
            'kodeEtik' => $this->getJenisPelanggaran($request, 2),
            'penyalahGunaanNarkoba' => $this->getDataPenggunaanNarkoba($request),
            'jenisNarkoba' => $this->getDataJenisNarkoba($request),
            'dataPungli' => $this->getDataPungli($request),
            'poldas' => SatuanPolda::all(),
            'pangkats' => Pangkat::all(),
            'disiplin_selesai' => $this->disiplin_selesai($request),
            'kepp_selesai' => $this->kepp_selesai($request)
        ];

        if ($request->submit == 'print') {
            $pdf = PDF::loadView('content.dashboard.index', $data);
            return $pdf->stream();
        }


        if (auth()->user()->getRoleNames()[0] != 'admin') {
            $data['chart_polres'] = $this->chartPolres($request);
            if (auth()->user()->getRoleNames()[0] == 'polda') {
                $data['list_polres'] = SatuanPolres::where('polda_id', auth()->user()->polda_id)->get();
            }
        }

        return view('content.dashboard.index', $data);
    }

    public function print_dashboard($data)
    {
        // $pdf = PDF::loadView('content.dashboard.index', $data);
        // return $pdf->stream();
        // dd($pdf);
    }

    public function get_putusan(Request $request, $jenis)
    {
        $data = Putusan::leftJoin('putusan_pelanggars', 'putusan_pelanggars.putusan_id', 'putusans.id')
            ->where('putusans.jenis_pelanggaran_id', $jenis)
            ->select('putusans.name', DB::raw('count(putusan_pelanggars.id) as total'))
            ->groupBy('putusans.id');
        if ($request->polres) {
            $data = $data->join('pelanggaran_lists', 'pelanggaran_lists.id', 'putusan_pelanggars.pelanggar_id')
                ->where('polres', $request->polres);
        }
        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->join('pelanggaran_lists', 'pelanggaran_lists.id', 'putusan_pelanggars.pelanggar_id')
                ->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data
                ->join('pelanggaran_lists', 'pelanggaran_lists.id', 'putusan_pelanggars.pelanggar_id')->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) {
                $data = $data->join('pelanggaran_lists', 'pelanggaran_lists.id', 'putusan_pelanggars.pelanggar_id')
                    ->where('polda', $request->polda);
            }
        }
        $data = $data->get();
        return $data;
    }

    public function disiplin_selesai(Request $request)
    {
        $data = PelanggaranList::whereNotNull('penyelesaian')
            ->where('jenis_pelanggaran', 1);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);
        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }
        return $data->get();
    }

    public function kepp_selesai(Request $request)
    {
        $data = PelanggaranList::whereNotNull('penyelesaian')
            ->where('jenis_pelanggaran', 2);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);
        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }
        return $data->get();
    }

    public function disiplin(Request $request)
    {
        $data = [
            'pelanggarans' => PelanggaranList::all(),
            'chartPolda' => $this->getChartPolda($request, 1),
            'dataByGender' => $this->getDataByGender($request, 1),
            'dataByWpp' => $this->getDataByWpp($request, 1),
            // 'dataWujudPerbuatan' => $this->getWujudPerbuatan($request, 1),
            'dataWujudPerbuatanPidana' => $this->getWujudPerbuatanPidana($request, 1),
            'dataPangkatPelanggar' => $this->getDataByPangkatPelanggar($request, 1),
            'totalPelanggarNarkoba' => $this->getDataByPelanggarNarkoba($request, 1),
            'disiplin' => $this->getJenisPelanggaran($request, 1),
            'kodeEtik' => $this->getJenisPelanggaran(2),
            'penyalahGunaanNarkoba' => $this->getDataPenggunaanNarkoba($request, 1),
            'jenisNarkoba' => $this->getDataJenisNarkoba($request, 1),
            'dataPungli' => $this->getDataPungli($request, 1),
            'poldas' => SatuanPolda::all(),
            'pangkats' => Pangkat::all()
        ];

        return view('content.dashboard.index', $data);
    }

    public function kodeEtik(Request $request)
    {
        $data = [
            'pelanggarans' => PelanggaranList::all(),
            'chartPolda' => $this->getChartPolda($request, 2),
            'chartPolda' => $this->getChartPolda($request, 2),
            'dataByGender' => $this->getDataByGender($request, 2),
            'dataByWpp' => $this->getDataByWpp($request, 2),
            'dataWujudPerbuatan' => $this->getWujudPerbuatan($request, 2),
            'dataPangkatPelanggar' => $this->getDataByPangkatPelanggar($request, 2),
            'totalPelanggarNarkoba' => $this->getDataByPelanggarNarkoba($request, 2),
            'disiplin' => $this->getJenisPelanggaran($request, 1),
            'kodeEtik' => $this->getJenisPelanggaran($request, 2),
            'penyalahGunaanNarkoba' => $this->getDataPenggunaanNarkoba($request, 2),
            'jenisNarkoba' => $this->getDataJenisNarkoba($request, 2),
            'dataPungli' => $this->getDataPungli($request, 2),
            'poldas' => SatuanPolda::all(),
            'pangkats' => Pangkat::all()
        ];

        return view('content.dashboard.index', $data);
    }

    private function getAllPelanggaran($request)
    {
        $data = PelanggaranList::orderBy('tgllp', 'asc');

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);
        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }
        return $data->get();
    }

    private function getDataPungli($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('wujud_perbuatan', 'wujud_perbuatans.name')
            // ->join('wujud_perbuatan_pidanas', 'wujud_perbuatan_pidanas.id', 'pelanggaran_lists.wujud_perbuatan_pidana')
            ->join('wujud_perbuatans', 'wujud_perbuatans.id', 'pelanggaran_lists.wujud_perbuatan')
            ->whereIn('wujud_perbuatans.name', ['6w Melakukan pungutan tidak sah dalam bentuk apa pun untuk kepentingan pribadi, golongan, atau pihak lain', '5a Korupsi '])
            // ->orWhereIn('wujud_perbuatan_pidanas.name', ['Pungli', 'Gratifikasi', 'Penyimpangan Anggaran', 'Korupsi'])
            ->select('wujud_perbuatans.name', 'wujud_perbuatan', (DB::raw('count(*) as total')));
        if ($jenis_pelanggaran) return $data->where('jenis_pelanggaran', $jenis_pelanggaran)->get();

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }
        return $data->get();
    }

    private function getDataJenisNarkoba($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('jenis_narkoba', 'jenis_narkobas.name')->join('jenis_narkobas', 'jenis_narkobas.id', 'jenis_narkoba')
            ->select('jenis_narkobas.name', (DB::raw('count(*) as total')));

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }

        return $data->get();
    }

    private function getDataPenggunaanNarkoba($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('peran_narkoba', 'peran_narkobas.name')->join('peran_narkobas', 'peran_narkobas.id', 'peran_narkoba')
            ->select('peran_narkobas.name', (DB::raw('count(*) as total')));

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }

        return $data->get();
    }

    private function getWujudPerbuatan($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('wujud_perbuatan', 'wujud_perbuatans.name', 'jenis_pelanggarans.name')->join('wujud_perbuatans', 'wujud_perbuatans.id', 'pelanggaran_lists.wujud_perbuatan')
            ->join('jenis_pelanggarans', 'jenis_pelanggarans.id', 'wujud_perbuatans.jenis_pelanggaran_id')
            ->select(DB::raw('count(*) as total'), 'wujud_perbuatans.name', 'jenis_pelanggarans.name as type')
            ->orderBy(DB::raw('count(*)'), 'desc')
            ->limit(5);

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }

        return $data->get();
    }

    private function getWujudPerbuatanPidana($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('wujud_perbuatan_pidana', 'wujud_perbuatan_pidanas.name', 'jenis_pelanggarans.name')
            ->join('wujud_perbuatan_pidanas', 'wujud_perbuatan_pidanas.id', 'pelanggaran_lists.wujud_perbuatan_pidana')
            ->join('jenis_pelanggarans', 'jenis_pelanggarans.id', 'wujud_perbuatan_pidanas.jenis_pelanggaran_id')
            ->select(DB::raw('count(*) as total'), 'wujud_perbuatan_pidanas.name', 'jenis_pelanggarans.name as type')
            ->orderBy(DB::raw('count(*)'), 'desc')
            ->limit(5);

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }
        return $data->get();
    }

    private function getChartPolda($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('polda', 'satuan_poldas.name')->join('satuan_poldas', 'satuan_poldas.id', 'pelanggaran_lists.polda')
            ->select(DB::raw('count(*) as total'), 'satuan_poldas.name', 'polda');

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);


        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }


        return $data->get();
    }

    private function getChartPoldaNew($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('polda', 'satuan_poldas.name')->join('satuan_poldas', 'satuan_poldas.id', 'pelanggaran_lists.polda')
            ->select(DB::raw('count(*) as total'), 'satuan_poldas.name', 'polda');

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);


        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }
        $data = $data->get();
        foreach ($data as $key => $value) {
            $query = PelanggaranList::groupBy('polda', 'satuan_poldas.name')->join('satuan_poldas', 'satuan_poldas.id', 'pelanggaran_lists.polda')
                ->whereNotNull('penyelesaian')
                ->where('polda', $value->polda)
                ->select(DB::raw('count(*) as total'), 'satuan_poldas.name', 'polda');
            if ($request->pangkat) $query = $query->where('pangkat', $request->pangkat);
            if ($request->jenis_kelamin) $query = $query->where('jenis_kelamin', $request->jenis_kelamin);
            if ($request->tanggal_mulai) $query = $query->where('tgllp', '>=', $request->tanggal_mulai);
            if ($request->tanggal_akhir) $query = $query->where('tgllp', '<=', $request->tanggal_akhir);
            if ($request->polres) {
                $query = $query->where('polres', $request->polres);
            }
            $query = $query->first();
            $value->selesai = is_null($query) ? 0 : $query->total;
        }
        return $data;
    }

    public function chartPolres($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('polres', 'satuan_polres.name')->leftJoin('satuan_polres', 'satuan_polres.id', 'pelanggaran_lists.polres')
            // ->whereNotNull('polres')
            // ->whereNull('polsek')
            ->select(DB::raw('count(*) as total'), 'satuan_polres.name', 'polres');

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);


        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }
        $data = $data->get();
        foreach ($data as $key => $value) {
            $query = PelanggaranList::groupBy('polres', 'satuan_polres.name')->join('satuan_polres', 'satuan_polres.id', 'pelanggaran_lists.polres')
                ->whereNotNull('penyelesaian')
                ->where('polres', $value->polres)
                ->whereNotNull('polda')
                ->select(DB::raw('count(*) as total'), 'satuan_polres.name', 'polres');
            if ($request->pangkat) $query = $query->where('pangkat', $request->pangkat);
            if ($request->jenis_kelamin) $query = $query->where('jenis_kelamin', $request->jenis_kelamin);
            if ($request->tanggal_mulai) $query = $query->where('tgllp', '>=', $request->tanggal_mulai);
            if ($request->tanggal_akhir) $query = $query->where('tgllp', '<=', $request->tanggal_akhir);
            $query = $query->first();
            $value->selesai = is_null($query) ? 0 : $query->total;
        }
        return $data;
    }

    private function getDataByGender($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('jenis_kelamin', 'gender')->join('genders', 'genders.id', 'pelanggaran_lists.jenis_kelamin')
            ->select(DB::raw('count(*) as total'), 'gender');

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }

        return $data->get();
    }

    private function getDataByWpp($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('wujud_perbuatan_pidana', 'name')->join('wujud_perbuatan_pidanas', 'wujud_perbuatan_pidanas.id', 'pelanggaran_lists.wujud_perbuatan_pidana')
            ->select(DB::raw('count(*) as total'), 'name');

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }

        return $data->get();
    }

    private function getDataByPangkatPelanggar($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('pangkat_pelanggarans.id', 'pangkat_pelanggarans.name', 'pangkat_pelanggarans.id')
            ->join('pangkats', 'pangkats.id', 'pelanggaran_lists.pangkat')
            ->join('pangkat_pelanggarans', 'pangkat_pelanggarans.id', 'pangkats.pangkat_pelanggar_id')
            ->select(DB::raw('count(*) as percent'), 'pangkat_pelanggarans.name as type', 'pangkat_pelanggarans.id');
        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }

        $data = $data->get();
        foreach ($data as $value) {
            $value->subs = PelanggaranList::groupBy('pangkat', 'pangkats.name')->join('pangkats', 'pangkats.id', 'pelanggaran_lists.pangkat')
                ->select(DB::raw('count(*) as percent'), 'pangkats.name as type')
                ->where('pangkats.pangkat_pelanggar_id', $value->id)
                ->get();
        }
        return $data;
    }

    private function getDataByPelanggarNarkoba($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::where('wujud_perbuatan_pidana', 1);

        if ($jenis_pelanggaran) return $data->where('jenis_pelanggaran', $jenis_pelanggaran)->count();

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }

        return $data->count();
    }

    private function getJenisPelanggaran($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::where('jenis_pelanggaran', $jenis_pelanggaran);

        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        if ($request->jenis_kelamin) $data = $data->where('jenis_kelamin', $request->jenis_kelamin);
        if ($request->tanggal_mulai) $data = $data->where('tgllp', '>=', $request->tanggal_mulai);
        if ($request->tanggal_akhir) $data = $data->where('tgllp', '<=', $request->tanggal_akhir);

        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        } else {
            if ($request->polda) $data = $data->where('polda', $request->polda);
        }
        if ($request->polres) {
            $data = $data->where('polres', $request->polres);
        }

        // if ($jenis_pelanggaran) return $data->where('jenis_pelanggaran', $jenis_pelanggaran)->count();

        return $data->count();
    }

    public function exportWPKepp()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setCellValue('A1', '#');
        $sheet->setCellValue('B1', 'Wujud Perbuatan Pelanggaran KEPP');
        $sheet->setCellValue('C1', 'Total');

        $data = PelanggaranList::groupBy('wujud_perbuatan', 'wujud_perbuatans.name', 'jenis_pelanggarans.name')->join('wujud_perbuatans', 'wujud_perbuatans.id', 'pelanggaran_lists.wujud_perbuatan')
            ->join('jenis_pelanggarans', 'jenis_pelanggarans.id', 'wujud_perbuatans.jenis_pelanggaran_id')
            ->select(DB::raw('count(*) as total'), 'wujud_perbuatans.name', 'jenis_pelanggarans.name as type')
            ->orderBy(DB::raw('count(*)'), 'desc')
            ->where('jenis_pelanggaran', 2);
        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        }

        $data = $data->get();
        $spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($this->headerStyle);
        $startRow = 2;
        $startCol = 'A';
        foreach ($data as $key => $value) {
            $sheet->setCellValue("{$startCol}{$startRow}", $key + 1);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->name);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->total);
            $startRow++;
            $startCol = 'A';
        }
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $writer = new Xlsx($spreadsheet);
        $path = storage_path("/app/wujud_perbuatan_KEPP.xlsx");
        $writer->save($path);
        return response()->download($path, 'wpkepp' . time() . '.xlsx');
    }

    public function exportWPDisiplin()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->setCellValue('A1', '#');
        $sheet->setCellValue('B1', 'Wujud Perbuatan Pelanggaran KEPP');
        $sheet->setCellValue('C1', 'Total');

        $data = PelanggaranList::groupBy('wujud_perbuatan', 'wujud_perbuatans.name', 'jenis_pelanggarans.name')->join('wujud_perbuatans', 'wujud_perbuatans.id', 'pelanggaran_lists.wujud_perbuatan')
            ->join('jenis_pelanggarans', 'jenis_pelanggarans.id', 'wujud_perbuatans.jenis_pelanggaran_id')
            ->select(DB::raw('count(*) as total'), 'wujud_perbuatans.name', 'jenis_pelanggarans.name as type')
            ->orderBy(DB::raw('count(*)'), 'desc')
            ->where('jenis_pelanggaran', 1);
        if (auth()->user()->getRoleNames()[0] == 'polda') {
            $data->where('polda', auth()->user()->polda_id);
        } else if (auth()->user()->getRoleNames()[0] == 'polres') {
            $data->where('polres', auth()->user()->polres_id);
        }

        $data = $data->get();
        $spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($this->headerStyle);
        $startRow = 2;
        $startCol = 'A';
        foreach ($data as $key => $value) {
            $sheet->setCellValue("{$startCol}{$startRow}", $key + 1);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->name);
            $startCol++;
            $sheet->setCellValue("{$startCol}{$startRow}", $value->total);
            $startRow++;
            $startCol = 'A';
        }
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $writer = new Xlsx($spreadsheet);
        $path = storage_path("/app/wujud_perbuatan_KEPP.xlsx");
        $writer->save($path);
        return response()->download($path, 'wpdisiplin' . time() . '.xlsx');
    }
}
