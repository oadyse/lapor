<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Iklan;
use App\Models\PaketIklan;

class IklanController extends Controller
{
    
    public function __construct()
    {
        $this->viewDir = 'admin.iklan';
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
            'paket' => 'required',
            'foto' => 'required|image',
        ]);

        $foto = $this->upload('foto',$request);

        $model = Iklan::create([
            'nama' => $request->nama,
            'id_paket' => $request->paket,
            'foto' => $foto,
        ]);
        $model->save();

        return redirect()->route('iklan');
    }

    public function upload($field,$request) {
		$file = $request->file($field);

        $tujuan_upload = 'uploads/foto';

        $file->move($tujuan_upload,$file->getClientOriginalName());

        return $tujuan_upload.'/'.$file->getClientOriginalName();
    }

    public function pagination()
    {
        $barang = Iklan::join('paket_iklan as pi','pi.id','=','iklan.id_paket')->select('iklan.*','pi.periode')->get();
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
