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
        ];

        return view('content.dashboard.index', $data);
    }

    private function getChartPolda()
    {
        $data = PelanggaranList::groupBy('polda')->join('satuan_poldas', 'satuan_poldas.id', 'pelanggaran_lists.polda')
                ->select(DB::raw('count(*) as total'), 'name')->get();
        return $data;
    }
}