<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\mobil_travel;

class MobilTravelController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
      $mobiltravel = mobil_travel::paginate(5);
      return view('/admin/mobiltravel/mobiltravel', ['mobiltravel' => $mobiltravel]);
  }

  public function tambah()
  {
      return view('/admin/mobiltravel/mobiltravel_tambah');
  }

  public function store(Request $request)
  {
      $this->validate($request,[
          'namamobil' => 'required',
          'kapasitas' => 'required',
          'gambarmobil' => 'required',
      ]);
      $countmobil = mobil_travel::all()->count();

      $file = $request->file('gambarmobil');
      $ekstensi = $request->file('gambarmobil')->getClientOriginalExtension();
      $tujuan_upload = 'foto_mobil_wisata';
      $namafoto = $request->namamobil."_".$countmobil.".".$ekstensi;
      $file->move($tujuan_upload,$namafoto);


      mobil_travel::create([
          'namamobil' => $request->namamobil,
          'kapasitas' => $request->kapasitas,
          'gambarmobil' => $namafoto  ,
      ]);
      return redirect('admin/mobiltravel')->with('msg', 'Data Telah Tersimpan');
  }

  public function edit($id)
  {
      $mobiltravel = mobil_travel::where('id',$id)->first();
      return view('/admin/mobiltravel/mobiltravel_edit', ['mobiltravel' => $mobiltravel]);
  }


  public function update(Request $request, $id)
  {
      $this->validate($request,[
          'namamobil' => 'required',
          'kapasitas' => 'required',
          'gambarmobil' => 'required',
      ]);

      $mobiltravel = mobil_travel::where('id', $id)->first();

      unlink(public_path("foto_mobil_wisata/".$mobiltravel->gambarmobil));

      $file = $request->file('gambarmobil');
      $ekstensi = $request->file('gambarmobil')->getClientOriginalExtension();
      $namafoto = $request->namamobil.".".$ekstensi;

      $mobiltravel->namamobil = $request->namamobil;
      $mobiltravel->kapasitas = $request->kapasitas;
      $mobiltravel->gambarmobil = $namafoto;
      $mobiltravel->save();

      $tujuan_upload = 'foto_mobil_wisata';
      $file->move($tujuan_upload,$namafoto);

      return redirect('admin/mobiltravel')->with('msg', 'Data Telah Teredit');
  }

  public function destroy($id)
  {
      $mobiltravel = mobil_travel::where('id', $id)->first();
      unlink(public_path("foto_mobil_wisata/".$mobiltravel->gambarmobil));
      $mobiltravel->delete();
      return redirect('admin/mobiltravel')->with('msg', 'Data Telah Terhapus');
  }

  public function search(Request $request)
  {
      $cari = $request->search;
      $mobiltravel = mobil_travel::where('namamobil','LIKE','%'.$cari.'%')
      ->paginate(5);
      return view('/admin/mobiltravel/mobiltravel', ['mobiltravel' => $mobiltravel]);
  }
}
