<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function pplg()
    {
        return view('landing.jurusan.pplg');
    }

    public function tjkt()
    {
        return view('landing.jurusan.tjkt');
    }

    public function tpfl()
    {
        return view('landing.jurusan.tpfl');
    }

    public function to()
    {
        return view('landing.jurusan.to');
    }
}