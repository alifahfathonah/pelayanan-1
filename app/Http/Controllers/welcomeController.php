<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;
use App\kategori;

class welcomeController extends Controller
{
    public function welcome()
    {
        $produk = produk::selectRaw('produks.nama,produks.kategori,produks.img,produks.quantity, a.nama_kategori as kategori')
        ->leftJoin('kategoris as a' , 'a.id_kategori' , '=' ,'produks.kategori')
        ->get();
        return view('welcome', compact('produk'));
    }

    public function filter(Request $request)
    {
        $produk = produk::selectRaw('produks.nama,produks.kategori,produks.img,produks.quantity, a.nama_kategori as kategori')
        ->leftJoin('kategoris as a' , 'a.id_kategori' , '=' ,'produks.kategori')
        ->where('produks.kategori', $request->kategori)
        ->get();
        $return = "";
        foreach ($produk as $key){
            $return .="<div>
                            <div class='col-auto mb-3'>".$key->nama."</div>
                            <div>".$key->kategori."</div>";            
            $return .= "</div>
            </div>";
        }
        return $return;
    }
}
