<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\destinasi;

class DestinasiController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
      $destinasiwisata = destinasi::paginate(5);
      return view('/admin/destinasiwisata/destinasiwisata', ['destinasiwisata' => $destinasiwisata]);
  }

  public function tambah()
  {
      return view('/admin/destinasiwisata/destinasiwisata_tambah');
  }

  public function store(Request $request)
  {
      $this->validate($request,[
          'namadestinasi' => 'required',
          'lokasidestinasi' => 'required',
          'deskripsi' => 'required',
          'gambardestinasi' => 'required',
      ]);

      $file = $request->file('gambardestinasi');
      $ekstensi = $request->file('gambardestinasi')->getClientOriginalExtension();
      $tujuan_upload = 'foto_destinasi_wisata';
      $namafoto = $request->namadestinasi.".".$ekstensi;
      $file->move($tujuan_upload,$namafoto);


      destinasi::create([
          'namadestinasi' => $request->namadestinasi,
          'lokasidestinasi' => $request->lokasidestinasi,
          'deskripsi' => $request->deskripsi,
          'gambardestinasi' => $namafoto  ,

      ]);
      return redirect('admin/destinasiwisata')->with('msg', 'Data Telah Tersimpan');
  }

  public function edit($id)
  {
      $destinasiwisata = destinasi::where('id',$id)->first();
      return view('/admin/destinasiwisata/destinasiwisata_edit', ['destinasiwisata' => $destinasiwisata]);
  }


  public function update(Request $request, $id)
  {
      $this->validate($request,[
        'namadestinasi' => 'required',
        'lokasidestinasi' => 'required',
        'deskripsi' => 'required',
        'gambardestinasi' => 'required',
      ]);

      $destinasiwisata = destinasi::where('id', $id)->first();

      unlink(public_path("foto_destinasi_wisata/".$destinasiwisata->gambardestinasi));

      $file = $request->file('gambardestinasi');
      $ekstensi = $request->file('gambardestinasi')->getClientOriginalExtension();
      $namafoto = $request->namadestinasi.".".$ekstensi;

      $destinasiwisata->namadestinasi = $request->namadestinasi;
      $destinasiwisata->lokasidestinasi = $request->lokasidestinasi;
      $destinasiwisata->deskripsi = $request->deskripsi;
      $destinasiwisata->gambardestinasi = $namafoto;
      $destinasiwisata->save();

      $tujuan_upload = 'foto_destinasi_wisata';
      $file->move($tujuan_upload,$namafoto);

      return redirect('admin/destinasiwisata')->with('msg', 'Data Telah Teredit');
  }

  public function destroy($id)
  {
      $destinasiwisata = destinasi::where('id', $id)->first();
      unlink(public_path("foto_destinasi_wisata/".$destinasiwisata->gambardestinasi));
      $destinasiwisata->delete();
      return redirect('admin/destinasiwisata')->with('msg', 'Data Telah Terhapus');
  }

  public function search(Request $request)
  {
      $cari = $request->search;
      $destinasiwisata = destinasi::where('namadestinasi','LIKE','%'.$cari.'%')
      ->orWhere('lokasidestinasi','LIKE','%'.$cari.'%')
      ->paginate(5);
      return view('/admin/destinasiwisata/destinasiwisata', ['destinasiwisata' => $destinasiwisata]);
  }

}
