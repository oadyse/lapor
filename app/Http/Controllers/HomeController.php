<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangHilang;
use App\Models\BarangTemuan;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $this->middleware('auth');
        return view('home');
    }

    public function unitHilang()
    {
        $hilang = BarangHilang::paginate(10);
        return view('unit-hilang',compact('hilang'));
    }

    public function unitDitemukan()
    {
        $hilang = BarangTemuan::paginate(10);
        return view('unit-ditemukan',compact('hilang'));
    }

    public function asuransi()
    {
        return view('asuransi');
    }

    public function klaimTemuan()
    {
        return view('klaim-temuan');
    }
}
