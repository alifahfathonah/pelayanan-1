<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;
use App\ticket;
use PDF;
use Auth;

class ticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->auth =="Admin") {
            $ticket = ticket::selectRaw('tickets.id,tickets.no_produk,tickets.ticket,tickets.id_user,tickets.status,tickets.pesan,tickets.note,tickets.foto, c.nama as nama_produk,b.name as id_user')
            ->leftJoin('transaksis as a', function($join){
                $join->on('a.id' ,'=' ,'tickets.no_produk');
                $join->on('a.id_barang' ,'=' ,'a.id_barang');
            })
            ->leftJoin('users as b' , 'b.id' , '=' ,'tickets.id_user')
            ->leftJoin('produks as c' , 'c.id' , '=' ,'a.id_barang')
            ->get();
            return view('Admin.ticket.index', compact('ticket'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //
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

    // Proses Ticket
    public function prosesticket(Request $request)
    {
        if (Auth::user()->auth == "Admin") {
            $proses = ticket::find($request->id);
            $proses->update([
                'status' => 'Proses',
            ]);
            return $proses;
        } else {
            return redirect('home');
        }
    }

    // Selesai Ticket
    public function selesaiticket(Request $request)
    {
        if (Auth::user()->auth == "Admin") {
            $selesai = ticket::find($request->id);
            $selesai->update([
                'status' => 'Selesai',
            ]);
            return $selesai;
        } else {
            return redirect('home');
        }
    }

    // Isi Note
    public function isinote(Request $request)
    {
        $isi = ticket::find($request->id);
        $isi->update([
            'note' => $request->note,
        ]);
        return $isi;
    }

    // View Ticket
    public function viewticket(Request $request, $id)
    {
        $first = ticket::selectRaw('tickets.id,tickets.no_produk,tickets.ticket,tickets.id_user,tickets.status,tickets.pesan,tickets.note,tickets.foto, c.nama as nama_produk,b.name,b.alamat')
        ->leftJoin('transaksis as a', function($join){
            $join->on('a.id' ,'=' ,'tickets.no_produk');
            $join->on('a.id_barang' ,'=' ,'a.id_barang');
        })
        ->leftJoin('users as b' , 'b.id' , '=' ,'tickets.id_user')
        ->leftJoin('produks as c' , 'c.id' , '=' ,'a.id_barang')
        ->where('tickets.id', $request->id)
        ->first();

        return view('Admin.ticket.lk', compact('first'));
    }

    // Download
    public function downloadticket(Request $request, $id)
    {
        $first = ticket::selectRaw('tickets.id,tickets.no_produk,tickets.ticket,tickets.id_user,tickets.status,tickets.pesan,tickets.note,tickets.foto, c.nama as nama_produk,b.name,b.alamat')
        ->leftJoin('transaksis as a', function($join){
            $join->on('a.id' ,'=' ,'tickets.no_produk');
            $join->on('a.id_barang' ,'=' ,'a.id_barang');
        })
        ->leftJoin('users as b' , 'b.id' , '=' ,'tickets.id_user')
        ->leftJoin('produks as c' , 'c.id' , '=' ,'a.id_barang')
        ->where('tickets.id', $request->id)
        ->first();

        // $pdf = PDF::loadView('Admin.ticket.cetak', compact('first'))->setPaper('a4', 'landscape');
        // return $pdf->stream();

        $pdf = PDF::loadView('Admin.ticket.cetak',['first' => $first]);
        $pdf->setPaper('A4', 'landscape');
            return $pdf->download('cetak.pdf');
    }
}
