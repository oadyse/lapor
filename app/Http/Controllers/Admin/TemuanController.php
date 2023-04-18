<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BarangTemuan;

class TemuanController extends Controller
{
    
    public function __construct()
    {
        $this->viewDir = 'admin.temuan';
        $this->middleware('auth');
    }

    public function index()
    {
        return $this->view('index');
    }
    
    public function create(Request $request)
    {
        $validated = $request->validate([
            'no_polisi' => 'required',
            'lokasi' => 'required',
            'spesifikasi' => 'required',
            'foto' => 'required|image',
        ]);

        $foto = $this->upload('foto',$request);

        $model = BarangTemuan::create([
            'no_polisi' => $request->no_polisi,
            'lokasi' => $request->lokasi,
            'spesifikasi' => $request->spesifikasi,
            'foto' => $foto,
        ]);
        $model->save();

        return $this->view('index');
    }

    public function upload($field,$request) {
		$file = $request->file($field);

        $tujuan_upload = 'uploads/foto';

        $file->move($tujuan_upload,$file->getClientOriginalName());

        return $tujuan_upload.'/'.$file->getClientOriginalName();
    }

    public function pagination()
    {
        $barang = BarangTemuan::all();
        // return ['data'=>$barang];
        return datatables()->of($barang)
            ->addColumn('foto', function ($row) {
                $html = '<img src="'.asset($row->foto).'" class="img-thumbnail w-100 img-fluid rounded"/>';
                return $html;
            })
            ->rawColumns(['foto'])
            ->toJson();
    }

}
