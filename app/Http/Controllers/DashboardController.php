<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use App\Models\PelanggaranList;
use App\Models\SatuanPolda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'pelanggarans' => PelanggaranList::all(),
            'chartPolda' => $this->getChartPolda($request),
            'dataByGender' => $this->getDataByGender($request),
            'dataByWpp' => $this->getDataByWpp($request),
            'dataWujudPerbuatan' => $this->getWujudPerbuatan($request),
            'dataPangkatPelanggar' => $this->getDataByPangkatPelanggar($request),
            'totalPelanggarNarkoba' => $this->getDataByPelanggarNarkoba($request),
            'disiplin' => $this->getJenisPelanggaran($request, 1),
            'kodeEtik' => $this->getJenisPelanggaran($request, 2),
            'penyalahGunaanNarkoba' => $this->getDataPenggunaanNarkoba($request),
            'jenisNarkoba' => $this->getDataJenisNarkoba($request),
            'dataPungli' => $this->getDataPungli($request),
            'poldas' => SatuanPolda::all(),
            'pangkats' => Pangkat::all()
        ];

        return view('content.dashboard.index', $data);
    }

    public function disiplin(Request $request)
    {
        $data = [
            'pelanggarans' => PelanggaranList::all(),
            'chartPolda' => $this->getChartPolda($request, 1),
            'dataByGender' => $this->getDataByGender($request, 1),
            'dataByWpp' => $this->getDataByWpp($request, 1),
            'dataWujudPerbuatan' => $this->getWujudPerbuatan($request, 1),
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

    private function getDataPungli($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('wujud_perbuatan, wujud_perbuatans.name')
            // ->join('wujud_perbuatan_pidanas', 'wujud_perbuatan_pidanas.id', 'pelanggaran_lists.wujud_perbuatan_pidana')
            ->join('wujud_perbuatans', 'wujud_perbuatans.id', 'pelanggaran_lists.wujud_perbuatan')
            ->whereIn('wujud_perbuatans.name', ['Pungli', 'Gratifikasi', 'Penyimpangan Anggaran', 'Korupsi'])
            // ->orWhereIn('wujud_perbuatan_pidanas.name', ['Pungli', 'Gratifikasi', 'Penyimpangan Anggaran', 'Korupsi'])
            ->select('wujud_perbuatans.name', 'wujud_perbuatan', (DB::raw('count(*) as total')));;
        // dd($data->get());
        if ($jenis_pelanggaran) return $data->where('jenis_pelanggaran', $jenis_pelanggaran)->get();
        return $data->get();
    }

    private function getDataJenisNarkoba($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('jenis_narkoba', 'jenis_narkobas.name')->join('jenis_narkobas', 'jenis_narkobas.id', 'jenis_narkoba')
            ->select('jenis_narkobas.name', (DB::raw('count(*) as total')));

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);
        if ($request->polda) $data = $data->where('polda', $request->polda);
        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);

        return $data->get();
    }

    private function getDataPenggunaanNarkoba($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('peran_narkoba', 'peran_narkobas.name')->join('peran_narkobas', 'peran_narkobas.id', 'peran_narkoba')
            ->select('peran_narkobas.name', (DB::raw('count(*) as total')));

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);
        if ($request->polda) $data = $data->where('polda', $request->polda);
        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);

        return $data->get();
    }

    private function getWujudPerbuatan($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('wujud_perbuatan', 'wujud_perbuatans.name', 'jenis_pelanggarans.name')->join('wujud_perbuatans', 'wujud_perbuatans.id', 'pelanggaran_lists.wujud_perbuatan')
            ->join('jenis_pelanggarans', 'jenis_pelanggarans.id', 'wujud_perbuatans.jenis_pelanggaran_id')
            ->select(DB::raw('count(*) as total'), 'wujud_perbuatans.name', 'jenis_pelanggarans.name as type');

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);
        if ($request->polda) $data = $data->where('polda', $request->polda);
        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);

        return $data->get();
    }

    private function getChartPolda($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('polda', 'satuan_poldas.name')->join('satuan_poldas', 'satuan_poldas.id', 'pelanggaran_lists.polda')
            ->select(DB::raw('count(*) as total'), 'satuan_poldas.name', 'polda');

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);

        if ($request->polda) $data = $data->where('polda', $request->polda);
        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);

        return $data->get();
    }

    private function getDataByGender($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('jenis_kelamin', 'gender')->join('genders', 'genders.id', 'pelanggaran_lists.jenis_kelamin')
            ->select(DB::raw('count(*) as total'), 'gender');

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);
        if ($request->polda) $data = $data->where('polda', $request->polda);
        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
        return $data->get();
    }

    private function getDataByWpp($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('wujud_perbuatan_pidana', 'name')->join('wujud_perbuatan_pidanas', 'wujud_perbuatan_pidanas.id', 'pelanggaran_lists.wujud_perbuatan_pidana')
            ->select(DB::raw('count(*) as total'), 'name');

        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);
        if ($request->polda) $data = $data->where('polda', $request->polda);
        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);

        return $data->get();
    }

    private function getDataByPangkatPelanggar($request, $jenis_pelanggaran = null)
    {
        $data = PelanggaranList::groupBy('pangkat_pelanggarans.id', 'pangkat_pelanggarans.name', 'pangkat_pelanggarans.id')
            ->join('pangkats', 'pangkats.id', 'pelanggaran_lists.pangkat')
            ->join('pangkat_pelanggarans', 'pangkat_pelanggarans.id', 'pangkats.pangkat_pelanggar_id')
            ->select(DB::raw('count(*) as percent'), 'pangkat_pelanggarans.name as type', 'pangkat_pelanggarans.id');
        if ($jenis_pelanggaran) $data = $data->where('jenis_pelanggaran', $jenis_pelanggaran);
        if ($request->polda) $data = $data->where('polda', $request->polda);
        if ($request->pangkat) $data = $data->where('pangkat', $request->pangkat);
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

        return $data->count();
    }

    private function getJenisPelanggaran($request, $jenis_pelanggaran)
    {
        $data = PelanggaranList::where('jenis_pelanggaran', $jenis_pelanggaran);

        // if ($jenis_pelanggaran) return $data->where('jenis_pelanggaran', $jenis_pelanggaran)->count();

        return $data->count();
    }
}
