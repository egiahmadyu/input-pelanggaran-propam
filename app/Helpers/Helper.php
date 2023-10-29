<?php

namespace App\Helpers;

use App\Models\Putusan;
use App\Models\SideMenu;
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
}
