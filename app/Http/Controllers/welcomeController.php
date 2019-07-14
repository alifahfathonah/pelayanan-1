<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;

class welcomeController extends Controller
{
    public function welcome()
    {
        $produk = produk::all();
        return view('welcome', compact('produk'));
    }
}
