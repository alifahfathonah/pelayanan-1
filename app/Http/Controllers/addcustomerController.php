<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
use Carbon\carbon;
use Session;

class addcustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = user::where('auth','Customer')->orderBy('id','desc')->get();
        return view('Admin.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->hp = $request->hp;
        $user->auth = 'Customer';
        $user->tgl = Carbon::now()->day;
        $user->status_email = 'Belum Dikirim';
        $user->kelamin = $request->kelamin;
        $user->pt = $request->pt;
        $user->password = bcrypt('12345678');
        $user->save();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Manambahkan Customer"
            ]);

        return redirect('pelanggan');
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

    public function reset( Request $request)
    {
        $reset = user::find($request->id);
        $reset->update([
            'password' => bcrypt('12345678'),
        ]);
        return $reset;
    }
}
