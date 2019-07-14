<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;
use App\ticket;
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
            $ticket = ticket::selectRaw('tickets.id,tickets.no_produk,tickets.nama_produk,tickets.ticket,tickets.id_user,tickets.status,tickets.pesan,a.nama as nama_produk,b.name as id_user')
            ->leftJoin('produks as a' , 'a.id' , '=' ,'tickets.id')
            ->leftJoin('users as b' , 'b.id' , '=' ,'tickets.id_user')
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
}
