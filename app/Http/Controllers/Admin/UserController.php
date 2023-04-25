<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->viewDir = 'admin.user';
        $this->middleware('auth');
    }

    public function index()
    {
        return $this->view('index');
    }
    
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string'],
        ]);

        $model = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        $model->save();

        return redirect()->route('user');
    }

    public function update(Request $request)
    {
        $user = User::where(['id'=>$request->id])->first();
        if(!empty($request->password)) {
            dd('sini');
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
                'password' => ['required', 'string', 'min:8'],
                'role' => ['required', 'string'],
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
                'role' => ['required', 'string'],
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);
        }

        $user->save();

        return redirect()->route('user');
    }
    
    public function getById($id)
    {
        $user = User::where(['id'=>$id])->first();
        return response()
        ->json($user);
    }
    
    public function delete(Request $request)
    {
        $user = User::where(['id'=>$request->id]);
        $user?->delete();
        return redirect()->route('user');
    }

    public function pagination()
    {
        $barang = User::all();
        return datatables()->of($barang)
            ->addColumn('pilihan', function ($row) {
                $html = '<button class="btn btn-primary p-1" onclick="modalEdit('.$row->id.')">
                    <i class="d-block" style="width:20px;height:20px;line-height:0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </i>
                </button> '.
                '<form method="POST" class="d-inline-block" action="'.route('user.delete').'">
                    <input name="_token" value="'.csrf_token().'" type="hidden">
                    <input name="id" value="'.$row->id.'" type="hidden">
                    <button type="submit" class="btn btn-danger p-1">
                        <i class="d-block" style="width:20px;height:20px;line-height:0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </i>
                    </button>
                </form>';
                return $html;
            })
            ->rawColumns(['pilihan'])
            ->toJson();
    }

}
