<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;
use App\Kategori;
use Auth;
use DB;
use Session;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->auth == "Admin") {
            $produk =   DB::table('produks as p')
                        -> leftJoin('kategoris as k', 'p.kategori', '=', 'k.id_kategori')
                        -> select('p.*', 'k.nama_kategori')
                        ->get();
            return view('Admin.produk.index',compact('produk'));
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
        if (Auth::user()->auth == "Admin") {
            $kategori_list = Kategori::all();
            return view('Admin.produk.create',compact('kategori_list'));
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
        if (Auth::user()->auth == "Admin") {
            $this->validate($request, [
                'img' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                'nama' => 'required',
                'kategori' => 'required',
                'quantity' => 'required',
                'harga'     => 'required',
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('img');
    
            $nama_file = time()."_".$file->getClientOriginalName();
    
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);
    
            produk::create([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'quantity' => $request->quantity,
                'harga' => $request->harga,
                'img' => $nama_file,
            ]);
    
            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Manambahkan Produk"
            ]);
    
            return redirect()->route('produk.index');

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
            $produk = DB::table('produks as p')
                        -> leftJoin('kategoris as k', 'p.kategori', '=', 'k.id_kategori')
                        -> select('p.*', 'k.nama_kategori')
                        -> where('p.id',$id)
                        -> first();

            $kategori_list = Kategori::all();

            return view('Admin.produk.edit')->with(compact('produk','kategori_list'));
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
                'nama' => 'required',
                'kategori' => 'required',
                'quantity' => 'required',
                'harga' => 'required',
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('img');
    
            $nama_file = time()."_".$file->getClientOriginalName();
    
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);

            produk::where('id',$id)->
                 update([
                    'nama' => $request->nama,
                    'kategori' => $request->kategori,
                    'quantity' => $request->quantity,
                    'harga' => $request->harga,
                    'img' => $nama_file,
                ]);
           

            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Produk"
            ]);
    
            return redirect()->route('produk.index');
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
     produk::where('id', $id)->delete();

        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Berhasil Mengapus Produk"
            ]);
       return redirect()->route('produk.index');
   }
}
