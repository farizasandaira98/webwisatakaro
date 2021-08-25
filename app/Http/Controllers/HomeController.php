<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\destinasi;

use App\paket_tour;

use App\booking;

use App\supir;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $destinasi = destinasi::inRandomOrder()->limit(1)->get();
       $destinasi1 = destinasi::inRandomOrder()->limit(3)->get();
       return view('user/user')
       ->with(compact('destinasi'))
       ->with(compact('destinasi1'));
   }
   public function destinasi()
   {
       $destinasi = destinasi::all();
       return view('user/destinasi')
       ->with(compact('destinasi'));
   }
   public function destinasisearch(Request $request)
   {
     $destinasi = destinasi::where('namadestinasi','LIKE','%'.$cari.'%')
     ->orWhere('lokasidestinasi','LIKE','%'.$cari.'%')
     ->get();
     return view('destinasi', ['destinasi' => $destinasi]);
 }
 public function destinasireadmore($id)
 {
   $destinasi = destinasi::where('id', $id)->first();
   return view('user/destinasimore')
   ->with(compact('destinasi'));
}
public function pakettour()
{
   $pakettour = paket_tour::all();
   return view('user/pakettour')
   ->with(compact('pakettour'));
}
public function pakettoursearch(Request $request)
{
 $cari = $request->search;

 $pakettour = paket_tour::where('namapaket','LIKE','%'.$cari.'%')->get();
 return view('user/pakettour', ['pakettour' => $pakettour]);
}

public function booking($id)
{
   $pakettour = paket_tour::where('id', $id)->first();
   return view('user/booking')
   ->with(compact('pakettour'));
}

   public function store(Request $request)
   {
   $this->validate($request,[
       'tanggaltourberangkat' => 'required',
       'tanggaltourbalik' => 'required',
       'name' => 'required',
       'no_telp' => 'required',
       'lokasi_jemput' => 'required',
       'idtour' => 'required',
   ]);

   $idtour = $request->idtour;
   $pakettour = paket_tour::select('hargapaket')->where('id', $idtour)->sum('hargapaket');
   $statusbayar = "Belum Bayar";
   $hours = 6;
   $addclock = Carbon::now()->timezone('Asia/Jakarta')->addHour($hours)->format('Y-m-d H:i:s');
   $tanggaltourberangkat = $request->tanggaltourberangkat;
   $tanggaltourbalik = $request->tanggaltourbalik;
   $carbon_tanggaltourbalik = Carbon::parse($tanggaltourberangkat);
   $carbon_tanggaltourbalik->addDays($tanggaltourbalik);

   $totalbayar = $pakettour * $tanggaltourbalik;
   $booking3 = supir::all()->where('status','Tersedia')->first();

   booking::create([
       'tanggaltourberangkat' => $tanggaltourberangkat,
       'tanggaltourbalik' => $carbon_tanggaltourbalik,
       'batasbayar' => $addclock,
       'haritour' => $tanggaltourbalik,
       'name' => $request->name,
       'no_telp' => $request->no_telp,
       'lokasi_jemput' => $request->lokasi_jemput,
       'idtour' => $request->idtour,
       'status_bayar' => $statusbayar,
       'totalbayar' => $totalbayar,
       'idsopir' => $booking3->id,
   ]);
   $changesupir = supir::where('id', $booking3->id)->update(array('status' => 'Tidak Tersedia'));
   return redirect('user/notatransaksi');
}

public function bookingall($nama)
{

   $booking2 = booking::select('batasbayar')->latest()->first();
   $timenow = Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
   $cb = $booking2;

   if(empty($cb)){
     return view('user/bookingallkosong');
   }else {
     $datetimenow = new \DateTime($timenow);
     $carbonwaktubatas = new \DateTime($cb->batasbayar);
     if($datetimenow > $carbonwaktubatas){
       $deletebooking = booking::where('name', $nama)->where('status_bayar','Belum Bayar');
       if (isset($deletebooking)) {
           $deletebooking->delete();
           $booking = booking::all()->where('name', $nama);
           return view('user/bookingall')
           ->with(compact('booking'));
       }
   }
$booking = booking::all()->where('name', $nama);
return view('user/bookingall')
->with(compact('booking'));
}
   }


public function nota(){
 $nota = booking::latest()->first();
 return view('user/notatransaksi')
 ->with(compact('nota'));
}

public function about()
{
   return view('user/about');
}
}
