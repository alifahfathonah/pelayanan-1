<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\transaksi;
use App\produk;
use App\user;
use Redirect;
use Response;
use DB;
use App\Mail\kirimEmail;
use Config;
use Auth;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transaksi::selectRaw('transaksis.id,transaksis.id_user,transaksis.invoice,transaksis.id_barang,a.nama,a.harga,b.name as nama_cus')
        ->leftJoin('produks as a','a.id', '=' ,'transaksis.id_barang')
        ->leftJoin('users as b' ,'b.id' ,'=' ,'transaksis.id_user')
        ->get();
        return view('Admin.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->auth == "Admin") {
            $invoice = transaksi::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(8)) , 8,"0") as invoice')-> first();
            $transaksi = new transaksi();
            $transaksi->id_user = $request->id_user;
            $transaksi->id_barang = $request->id_barang;
            $transaksi->invoice = '#'. $invoice->invoice;
            // dd($transaksi);
            $transaksi->save();

            return redirect('transaksi');
        } else {
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Filter Barang
    public function hargaproduk(Request $request)
    {
        if (Auth::user()->auth == "Admin") {
            $harga = produk::select('id','harga')
            ->where('id',$request->id)
            ->get();
            $select = '';
            $select .= '
                        <div class="form-group">
                        <label for="id" >Harga Barang</label>
                        <select id="id" class="form-control" name="id" value="harga">
                        ';
                        foreach ($harga as $studi) {
            $select .= '<option value="'.$studi->id.'">'.$studi->harga.'</option>';
                        }'
                        </select>
                        </div>
                        </div>';
            return $select;
        } else {
            return redirect('/home');
        }
    }

    // Kirim Email
    public function sendmail(Request $request){
        $comment = $request->pesan;
        $toEmail = $request->email;
        Mail::to($toEmail)->send(new kirimEmail($comment));
        return redirect()->back()->with('message','Successfully Send Your Mail Id.');
    }

    // Ubah Status Kirim Email
    public function status(Request $request)
    {
        if (Auth::user()->auth == "Admin") {
            $baca = user::find($request->id);
            $baca->update([
                'status_email' => 'Dikirim'
            ]);
            return redirect('pelanggan');
        } else {
            return redirect('home');
        }
    }
}
