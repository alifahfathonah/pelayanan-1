<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ticket;
use DB;
use App\user;
use App\produk;
use App\transaksi;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->auth == "Admin") {
                $data = DB::table('users')
                ->  select('tgl', DB::raw('count(id) AS jml'))
                ->  whereYear('created_at','=',date("Y", strtotime(now())))
                ->  groupBy('tgl')
                ->  get();

                $tgl = '';
                $batas =  31;
                $nilai = '';
                $monthName = '';
                for($_i=1; $_i <= $batas; $_i++){
                    $tgl = $tgl . (string)$_i . ',';
                    $_check = false;
                    foreach($data as $_data){
                        if((int)@$_data->tgl === $_i){
                            $nilai = $nilai . (string)$_data->jml . ',';
                            $_check = true;
                        }
                    }
                    if(!$_check){
                        $nilai = $nilai . '0,';
                    }
                }

                $masuk = ticket::count();
                $proses = ticket::where('status','proses')->count();
                $selesai = ticket::where('status','selesai')->count();
                $customer = user::whereNotIn('auth',['Admin'])->count();
                return view('Admin.home')
                ->with('customer', $customer)
                ->with('masuk', $masuk)
                ->with('proses', $proses)
                ->with('selesai', $selesai)
                ->with('_nilai',  substr($nilai, 0,-1))
                ->with('_tgl',  substr($tgl, 0,-1));

            } elseif(Auth::user()->auth ="Customer") {

                $transaksi = transaksi::selectRaw('transaksis.id,transaksis.id_user,transaksis.invoice,transaksis.id_barang,a.nama,a.harga,b.name as nama_cus')
                ->leftJoin('produks as a','a.id', '=' ,'transaksis.id_barang')
                ->leftJoin('users as b' ,'b.id' ,'=' ,'transaksis.id_user')
                ->where('transaksis.id_user',Auth::user()->id)
                ->get();
                return view('Customer.home', compact('transaksi'));
            } else {
                return redirect('home');
            }
        }
    }
}
