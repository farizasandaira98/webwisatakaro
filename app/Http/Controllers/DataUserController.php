<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\User;

class DataUserController extends Controller
{
    public function datauser()
    {
    $user = User::all();
    return view('admin/user/user')
    ->with(compact('user'));
    }

    public function datauserhapus($id)
    {
        $user = User::where('id', $id)->first();
        $hapus = $user->delete();
        if($hapus){
            Session::flash('success', 'Data Berhasil Dihapus');
            return redirect('admin/user');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('admin/user');
        }
    }

    public function datausercari(Request $request)
    {
        $cari = $request->search;
        $user = User::where('name','LIKE','%'.$cari.'%')->paginate(5);
        return view('admin/user/user', ['user' => $user]);
    }
}
