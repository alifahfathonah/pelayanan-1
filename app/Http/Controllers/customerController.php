<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ticket;
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
            $ticket = ticket::selectRaw('tickets.id,tickets.no_produk,tickets.nama_produk,tickets.ticket,tickets.id_user,tickets.status,tickets.pesan, a.nama as nama_produk,b.name as id_user')
            ->leftJoin('produks as a' , 'a.id' , '=' ,'tickets.id')
            ->leftJoin('users as b' , 'b.id' , '=' ,'tickets.id_user')
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
            $no_ticket = ticket::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(8)) , 8,"0") as ticket')->first();
            $ticket = new ticket();
            $ticket = new ticket();
            $ticket->no_produk = $request->no_produk;
            $ticket->ticket = 'TK' . $no_ticket->ticket;
            $ticket->nama_produk = $request->nama_produk;
            $ticket->id_user = Auth::user()->id;
            $ticket->status = 'Pengajuan';
            $ticket->pesan = $request->pesan;
            $ticket->save();

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
}
