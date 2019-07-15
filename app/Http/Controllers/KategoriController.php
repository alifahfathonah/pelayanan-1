<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Auth;
use Session;



class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->auth == "Admin") {
            $kategori = Kategori::all();
            return view('Admin.kategori.index')->with(compact('kategori'));
        } else {
            return redirect('home');
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
        if (Auth::user()->auth == "Admin") {
            return view('Admin.kategori.create');
        } else {
            return redirect('home');
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
        //

        if (Auth::user()->auth == "Admin") {
            $this->validate($request, [
                'nama_kategori' => 'required',
            ]);
            
            Kategori::create([
                'nama_kategori' => $request->nama_kategori,
            ]);

            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Manambahkan Kategori Produk"
            ]);
    
            return redirect()->route('kategori.index');
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
        if (Auth::user()->auth == "Admin") {
            $kategori = Kategori::select(['id_kategori','nama_kategori'])
            ->where('id_kategori',$id)
            ->first();
            return view('Admin.kategori.edit')->with(compact('kategori'));
        }else{
           return redirect('home');
        }  
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
         if (Auth::user()->auth == "Admin") {
            $this->validate($request, [
                'nama_kategori' => 'required',
            ]);
            
            Kategori::where('id_kategori',$id)->
            update([
                'nama_kategori' => $request->nama_kategori,
            ]);

            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Kategori Produk"
            ]);
    
            return redirect()->route('kategori.index');
        } else {
            return redirect('home');
        }
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

    public function delete($id)
    {
     Kategori::where('id_kategori', $id)->delete();

        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Berhasil Mengapus Kategori Produk"
            ]);
       return redirect()->route('kategori.index');
   }

}
