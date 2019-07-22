<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\ticket;
use App\produk;
use App\transaksi;
use App\user;

use Auth;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->auth == "Customer") {
            $ticket = ticket::selectRaw('tickets.id,tickets.no_produk,tickets.ticket,tickets.id_user,tickets.status,tickets.pesan,tickets.note, c.nama as nama_produk,b.name as id_user')
            ->leftJoin('transaksis as a', function($join){
                $join->on('a.id' ,'=' ,'tickets.no_produk');
                $join->on('a.id_barang' ,'=' ,'a.id_barang');
            })
            ->leftJoin('users as b' , 'b.id' , '=' ,'tickets.id_user')
            ->leftJoin('produks as c' , 'c.id' , '=' ,'a.id_barang')
            ->where('tickets.id_user',Auth::user()->id)
            ->get();
            return view('Customer.ticket.index', compact('ticket'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->auth == "Customer") {
            return view('Customer.ticket.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->auth == "Customer") {
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');
    
            $nama_file = time()."_".$file->getClientOriginalName();
    
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);

            $no_ticket = ticket::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(8)) , 8,"0") as ticket')->first();
            $ticket = new ticket();
            $ticket->no_produk = $request->no_produk;
            $ticket->ticket = 'TK' . $no_ticket->ticket;
            $ticket->id_user = Auth::user()->id;
            $ticket->status = 'Pengajuan';
            $ticket->pesan = $request->pesan;
            $ticket->foto = $nama_file;
            $ticket->save();
            // dd($ticket);
            return redirect('customer');
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

    public function transaksics()
    {
        if (Auth::user()->auth == "Customer") {
            $transaksi = transaksi::selectRaw('transaksis.id,transaksis.id_user,transaksis.invoice,transaksis.id_barang,a.nama,a.harga,b.name as nama_cus')
                ->leftJoin('produks as a','a.id', '=' ,'transaksis.id_barang')
                ->leftJoin('users as b' ,'b.id' ,'=' ,'transaksis.id_user')
                ->where('transaksis.id_user',Auth::user()->id)
                ->get();
            return view('Customer.transaksi.index', compact('transaksi'));
        }
    }

    public function edituser($id)
    {
        $user = user::where('id',Auth::user()->id)->first();
        $edit = user::find($id);
        $transaksi = transaksi::where('id_user',Auth::user()->id)->count();
        $ticket = ticket::where('id_user',Auth::user()->id)->count();
        return view('Customer.edit', compact('user','edit','transaksi','ticket'));
    }

    public function updateuser(request $request, $id)
    {
        if (Auth::user()->auth == "Customer") {
            $user = user::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->alamat = $request->alamat;
            $user->hp = $request->hp;
            $user->password = Hash::make($user['password']);
            // dd($user);
            $user->save();

            return redirect('home');
        } else {
            return redirect('home');
        }
    }
}
