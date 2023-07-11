<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Iklan;
use App\Models\PaketIklan;

class PaketIklanController extends Controller
{
    
    public function __construct()
    {
        $this->viewDir = 'admin.paketiklan';
        $this->middleware('auth');
    }

    public function index()
    {
        $paket = PaketIklan::all();
        return $this->view('index',compact('paket'));
    }
    
    public function create(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'periode' => 'required',
            'harga' => 'required',
        ]);

        $model = PaketIklan::create([
            'nama' => $request->nama,
            'periode' => $request->periode,
            'harga' => $request->harga,
        ]);
        $model->save();

        return redirect()->route('paket-iklan');
    }

    public function pagination()
    {
        $barang = PaketIklan::get();
        return datatables()->of($barang)
            ->toJson();
    }

}
