<?php

namespace App\Helpers;

use App\Models\Putusan;
use App\Models\SideMenu;
use App\Models\SatuanPolres;
use Carbon\Carbon;

class Helper
{
    public static function getMenu()
    {
        $data = SideMenu::whereNotIn('type', [3])->orderBy('sort', 'asc')->get();
        return $data;
    }

    public static function getChildMenu($id)
    {
        $data = SideMenu::where('parent_id', $id)->orderBy('sort', 'asc')->get();
        return $data;
    }

    public static function getPutusan($type)
    {
        return Putusan::where('jenis_pelanggaran_id', $type)->get();
    }

    public static function tanggal($tanggal)
    {
        return Carbon::parse($tanggal)->translatedFormat('d F Y H:i');
    }

    public static function satker_polda($polda_id)
    {
        $res = SatuanPolres::where('polda_id', $polda_id)
        ->where('name', 'POLDA')
        ->first();
        return $res;
    }
}
