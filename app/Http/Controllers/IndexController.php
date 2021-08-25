<?php

namespace App\Http\Controllers;

use App\destinasi;

use App\paket_tour;

use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function index()
  {
      $destinasi = destinasi::inRandomOrder()->limit(1)->get();
      $destinasi1 = destinasi::inRandomOrder()->limit(3)->get();
      return view('home')
      ->with(compact('destinasi'))
      ->with(compact('destinasi1'));
  }
  public function destinasi()
  {
      $destinasi = destinasi::all();
      return view('destinasi')
      ->with(compact('destinasi'));
  }
  public function destinasisearch(Request $request)
  {
    $cari = $request->search;

    $destinasi = destinasi::where('namadestinasi','LIKE','%'.$cari.'%')
    ->orWhere('lokasidestinasi','LIKE','%'.$cari.'%')
    ->get();
    return view('destinasi', ['destinasi' => $destinasi]);
  }
  public function destinasireadmore($id)
  {
      $destinasi = destinasi::where('id', $id)->first();
       return view('destinasimore')
      ->with(compact('destinasi'));
  }
  public function pakettour()
  {
      $pakettour = paket_tour::all();
      return view('pakettour')
      ->with(compact('pakettour'));
  }
  public function pakettoursearch(Request $request)
  {
    $cari = $request->search;

    $pakettour = paket_tour::where('namapaket','LIKE','%'.$cari.'%')->get();
    return view('pakettour', ['pakettour' => $pakettour]);
  }
  public function about()
  {
      return view('about');
  }

}
