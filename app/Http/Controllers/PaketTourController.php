<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\paket_tour;

use App\mobil_travel;

class PaketTourController extends Controller
{
  public function index()
  {
      $pakettour = paket_tour::paginate(5);
      return view('/admin/pakettour/pakettour', ['pakettour' => $pakettour]);
  }

  public function tambah()
  {
      $mobiltravel = mobil_travel::all();
      return view('/admin/pakettour/pakettour_tambah')
      ->with(compact('mobiltravel'));
  }

  public function store(Request $request)
  {
      $this->validate($request,[
          'namapaket' => 'required',
          'daftardestinasi' => 'required',
          'hargapaket' => 'required',
          'deskripsi' => 'required',
          'id_travel' => 'required',
      ]);

      paket_tour::create([
          'namapaket' => $request->namapaket,
          'daftardestinasi' => $request->daftardestinasi,
          'hargapaket' => $request->hargapaket,
          'deskripsi' => $request->deskripsi,
          'id_travel' => $request->id_travel,
      ]);
      return redirect('admin/pakettour')->with('msg', 'Data Telah Tersimpan');
  }

  public function edit($id)
  {
      $mobiltravel = mobil_travel::all();
      $pakettour = paket_tour::where('id', $id)->first();
      return view('/admin/pakettour/pakettour_edit')
      ->with(compact('pakettour'))
      ->with(compact('mobiltravel'));
  }


  public function update(Request $request, $id)
  {
    $this->validate($request,[
        'namapaket' => 'required',
        'daftardestinasi' => 'required',
        'hargapaket' => 'required',
        'deskripsi' => 'required',
        'id_travel' => 'required',
    ]);

      $pakettour = paket_tour::where('id', $id)->first();

      $pakettour->namapaket = $request->namapaket;
      $pakettour->daftardestinasi = $request->daftardestinasi;
      $pakettour->hargapaket = $request->hargapaket;
      $pakettour->deskripsi = $request->deskripsi;
      $pakettour->id_travel = $request->id_travel;
      $pakettour->save();

      return redirect('admin/pakettour')->with('msg', 'Data Telah Teredit');
  }

  public function destroy($id)
  {
      $pakettour = paket_tour::where('id', $id)->first();
      $pakettour->delete();
      return redirect('admin/pakettour')->with('msg', 'Data Telah Terhapus');
  }

  public function search(Request $request)
  {
      $cari = $request->search;
      $datakeg = $request->datekeg;
      $pakettour = paket_tour::where('namapaket','LIKE','%'.$cari.'%')
      ->orWhere('daftardestinasi','LIKE','%'.$cari.'%')
      ->orWhere('hargapaket','LIKE','%'.$cari.'%')
      ->paginate(5);
      return view('/admin/pakettour/pakettour', ['pakettour' => $pakettour]);
  }

  //public function cetak_pdf()
  //{
   //   $pakettour = paket_tour::all();
    //  $pdf = PDF::loadview('/admin/pakettour/pakettour_cetak',['pakettour'=>$pakettour]);
   //   return $pdf->stream();
  //}
}
