<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\supir;

class SupirController extends Controller
{
    public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
      $supir = supir::paginate(5);
      return view('/admin/supir/supir', ['supir' => $supir]);
  }

  public function tambah()
  {
      return view('/admin/supir/supir_tambah');
  }

  public function store(Request $request)
  {
      $this->validate($request,[
          'nama_supir' => 'required',
          'kartu_anggota' => 'required',
      ]);

      $jumlahsupir = supir::all()->count();
      if($jumlahsupir == 0){
      $jumlahsupir = $jumlahsupir+1;
      }elseif ($jumlahsupir >= 1) {
      $jumlahsupir = $jumlahsupir+1;
      }

      $file = $request->file('kartu_anggota');
      $ekstensi = $request->file('kartu_anggota')->getClientOriginalExtension();
      $tujuan_upload = 'foto_kartu_anggota';
      $namafoto = $request->nama_supir."_".$jumlahsupir.".".$ekstensi;
      $file->move($tujuan_upload,$namafoto);

      $status = "Tersedia";

      supir::create([
          'id' => $jumlahsupir,
          'nama_supir' => $request->nama_supir,
          'kartu_anggota' => $namafoto,
          'status' => $status,
      ]);

      return redirect('admin/supir')->with('msg', 'Data Telah Tersimpan');
  }

  public function edit($id)
  {
      $supir = supir::where('id',$id)->first();
      return view('/admin/supir/supir_edit', ['supir' => $supir]);
  }


  public function update(Request $request, $id)
  {
      $this->validate($request,[
          'nama_supir' => 'required',
          'kartu_anggota' => 'required',
          'status' => 'required',
      ]);

      $supir = supir::where('id', $id)->first();

      unlink(public_path("foto_kartu_anggota/".$supir->kartu_anggota));

      $jumlahsupir = supir::all()->count();
      if($jumlahsupir == 0){
      $jumlahsupir = $jumlahsupir+1;
      }elseif ($jumlahsupir > 1) {
      $jumlahsupir = $jumlahsupir+1;
      }

      $file = $request->file('kartu_anggota');
      $ekstensi = $request->file('kartu_anggota')->getClientOriginalExtension();
      $namafoto = $request->nama_supir."_".$jumlahsupir.".".$ekstensi;

      $supir->id = $request->id;
      $supir->nama_supir = $request->nama_supir;
      $supir->kartu_anggota = $namafoto;
      $supir->status = $request->status;
      $supir->save();

      $tujuan_upload = 'foto_kartu_anggota';
      $file->move($tujuan_upload,$namafoto);

      return redirect('admin/supir')->with('msg', 'Data Telah Teredit');
  }

  public function destroy($id)
  {
      $supir = supir::where('id', $id)->first();
      unlink(public_path("foto_kartu_anggota/".$supir->kartu_anggota));
      $supir->delete();
      return redirect('admin/supir')->with('msg', 'Data Telah Terhapus');
  }

  public function search(Request $request)
  {
      $cari = $request->search;
      $supir = supir::where('nama_supir','LIKE','%'.$cari.'%')
      ->orWhere('status','LIKE','%'.$cari.'%')
      ->paginate(5);
      return view('/admin/supir/supir', ['supir' => $supir]);
  }

  public function ubahstatus(Request $request)
  {
    $changesupir = supir::where('id', $request->id)->update(array('status' => 'Tersedia'));
    return redirect('admin/supir');
}
}
