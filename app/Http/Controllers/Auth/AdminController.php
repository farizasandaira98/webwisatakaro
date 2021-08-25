<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\User;
use App\booking;
use App\destinasi;
use App\mobil_travel;
use App\paket_tour;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countuser = User::all()->count('name');
        $countbooking = booking::all()->count('name');
        $sumbooking = booking::all()->where('status_bayar','Sudah Bayar')->sum('totalbayar');
        $countdestinasi = destinasi::all()->count('namadestinasi');
        $countarmada = mobil_travel::all()->count('namamobil');
        $countpaket = paket_tour::all()->count('namapaket');
        return view('admin/admin')
        ->with(compact('sumbooking'))
        ->with(compact('countuser'))
        ->with(compact('countbooking'))
        ->with(compact('countdestinasi'))
        ->with(compact('countarmada'))
        ->with(compact('countpaket'));
    }

    public function booking()
    {
        $booking = booking::paginate(5);
        return view('/admin/booking/booking', ['booking' => $booking]);
    }

    public function bookingsearch(Request $request)
    {
        $cari = $request->search;
        $booking = destinasi::where('name','LIKE','%'.$cari.'%')
        ->paginate(5);
        return view('/admin/booking/booking', ['booking' => $booking]);
    }

    public function update($id)
    {
        $booking = booking::where('id', $id)->first();
        $booking->status_bayar = "Sudah Bayar";
        $booking->save();
        return redirect('/admin/booking')->with('msg', 'Data Telah Teredit');
    }

    public function destroy($id)
    {
        $booking = booking::where('id', $id)->first();
        $hapus = $booking->delete();
        if($hapus){
            Session::flash('success', 'Data Berhasil Dihapus');
            return redirect('/admin/booking');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('/admin/booking');
        }
    }
}
