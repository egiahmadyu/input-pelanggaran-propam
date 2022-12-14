<?php

namespace App\Helpers;

use App\Models\SideMenu;

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
}
