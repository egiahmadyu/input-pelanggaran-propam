<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $data['lists'] = Permission::all();
        return view('content.permission.index', $data);
    }

    public function save(Request $request)
    {
        Permission::create(['name' => $request->name]);
        return redirect()->back();
    }
}