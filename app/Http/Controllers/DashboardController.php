<?php

namespace App\Http\Controllers;

use App\Models\PelanggaranList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'pelanggarans' => PelanggaranList::all(),
            'chartPolda' => $this->getChartPolda(),
            'dataByGender' => $this->getDataByGender(),
            'dataByWpp' => $this->getDataByWpp(),
            'dataWujudPerbuatan' => $this->getWujudPerbuatan(),
            'dataPangkatPelanggar' => $this->getDataByPangkatPelanggar(),
            'totalPelanggarNarkoba' => $this->getDataByPelanggarNarkoba(),
            'disiplin' => $this->getJenisPelanggaran(1),
            'kodeEtik' => $this->getJenisPelanggaran(2),
            'penyalahGunaanNarkoba' => $this->getDataPenggunaanNarkoba(),
            'jenisNarkoba' => $this->getDataJenisNarkoba(),
            'pingliPolri' => $this->getDataPungli()
        ];

        return view('content.dashboard.index', $data);
    }

    private function getDataPungli($jenis_pelanggaran = null)
    {

    }

    private function getDataJenisNarkoba($jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('jenis_narkoba')->join('jenis_narkobas', 'jenis_narkobas.id', 'jenis_narkoba')
        ->select('jenis_narkobas.name', (DB::raw('count(*) as total')));

        if ($jenis_pelanggaran) return $data->where('jenis_pelanggaran', $jenis_pelanggaran)->get();

        return $data->get();
    }

    private function getDataPenggunaanNarkoba($jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('peran_narkoba')->join('peran_narkobas', 'peran_narkobas.id', 'peran_narkoba')
        ->select('peran_narkobas.name', (DB::raw('count(*) as total')));

        if ($jenis_pelanggaran) return $data->where('jenis_pelanggaran', $jenis_pelanggaran)->get();

        return $data->get();

    }

    private function getWujudPerbuatan($jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('wujud_perbuatan')->join('wujud_perbuatans', 'wujud_perbuatans.id', 'pelanggaran_lists.wujud_perbuatan')
        ->join('jenis_pelanggarans', 'jenis_pelanggarans.id', 'wujud_perbuatans.jenis_pelanggaran_id')
                ->select(DB::raw('count(*) as total'), 'wujud_perbuatans.name', 'jenis_pelanggarans.name as type')->get();
        return $data;
    }

    private function getChartPolda($jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('polda')->join('satuan_poldas', 'satuan_poldas.id', 'pelanggaran_lists.polda')
                ->select(DB::raw('count(*) as total'), 'name')->get();
        return $data;
    }

    private function getDataByGender($jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('jenis_kelamin')->join('genders', 'genders.id', 'pelanggaran_lists.jenis_kelamin')
        ->select(DB::raw('count(*) as total'), 'gender')->get();
        return $data;
    }

    private function getDataByWpp($jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('wujud_perbuatan_pidana')->join('wujud_perbuatan_pidanas', 'wujud_perbuatan_pidanas.id', 'pelanggaran_lists.wujud_perbuatan_pidana')
        ->select(DB::raw('count(*) as total'), 'name')->get();
        return $data;
    }

    private function getDataByPangkatPelanggar($jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('pangkat_pelanggarans.id')->join('pangkats', 'pangkats.id', 'pelanggaran_lists.pangkat')
        ->join('pangkat_pelanggarans', 'pangkat_pelanggarans.id', 'pangkats.pangkat_pelanggar_id')
        ->select(DB::raw('count(*) as percent'), 'pangkat_pelanggarans.name as type', 'pangkat_pelanggarans.id')->get();

        foreach ($data as $value)
        {
            $value->subs = PelanggaranList::groupBy('pangkat')->join('pangkats', 'pangkats.id', 'pelanggaran_lists.pangkat')
            ->select(DB::raw('count(*) as percent'), 'pangkats.name as type')
            ->where('pangkats.pangkat_pelanggar_id', $value->id)
            ->get();
        }
        return $data;
    }

    private function getDataByPelanggarNarkoba($jenis_pelanggaran = null)
    {
        $data = PelanggaranList::where('wujud_perbuatan_pidana', 1)->count();
        return $data;
    }

    private function getJenisPelanggaran($jenis_pelanggaran)
    {
        $data = PelanggaranList::where('jenis_pelanggaran', $jenis_pelanggaran)->count();

        return $data;
    }
}