<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function form()
    {
        return view('content.pelanggaran.tambah');
    }
}