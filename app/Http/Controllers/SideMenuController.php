<?php

namespace App\Http\Controllers;

use App\Models\SatuanPolda;
use App\Models\SatuanPolres;
use App\Models\SatuanPolsek;
use App\Models\SideMenu;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class SideMenuController extends Controller
{
    public function index()
    {
      $data['lists'] = SideMenu::all();
      return view('content.menu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
      $data['dropdowns'] = SideMenu::where('type', 2)->get();
      $data['permissions'] = Permission::get();
      return view('content.menu.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
      if ($request->type == 3) {
      } else {
        $checkSort = SideMenu::whereIn('type', [1, 2])->where('sort', $request->sort)->exists();
        if ($checkSort) {
          $listSort = SideMenu::whereIn('type', [1, 2])->where('sort', '>=', $request->sort)->get();
          foreach ($listSort as $list) {
            $list->sort += 1;
            $list->save();
          }
        }
      }
      $post = SideMenu::create($request->all());
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $menu = SideMenu::find($id);
      $checkSort = SideMenu::whereIn('type', [1, 2])->where('sort', $menu->sort)->exists();
      if ($checkSort) {
        $listSort = SideMenu::whereIn('type', [1, 2])->where('sort', '>=', $menu->sort)->get();
        foreach ($listSort as $list) {
          $list->sort -= 1;
          $list->save();
        }
      }
      $menu->delete();
      return redirect()->back()->with('success', 'Success Delete Menu');
    }

    public function inputSatuan()
    {
      $file_to_read = fopen(storage_path('app\aceh.csv'), 'r');
      while(($data = fgetcsv($file_to_read, 100, ',')) !== FALSE){
          for($i = 0; $i < count($data); $i++) {

              $satuan = explode(';', $data[$i]);
              if (isset($satuan[0]))
              {
                if (!$polda = SatuanPolda::where('name', $satuan[0])->first())
                {
                  $polda = SatuanPolda::create([
                    'name' => $satuan[0]
                  ]);
                }
                if (isset($satuan[1]))
                {

                  if (!$polres = SatuanPolres::where('name', $satuan[1])->first())
                  {
                    echo $satuan[1];
                    $polres = SatuanPolres::create([
                      'name' => $satuan[1],
                      'polda_id' => $polda->id
                    ]);
                  }
                }

                if (isset($satuan[2]))
                {
                  if (!$polsek = SatuanPolsek::where('name', $satuan[2])->first() AND strlen($satuan[2]) > 0)
                  {
                    $polsek = SatuanPolsek::create([
                      'name' => $satuan[2],
                      'polres_id' => $polres->id
                    ]);
                  }
                }
              }


          }
      }

      fclose($file_to_read);
      dd(SatuanPolsek::all());
    }
}