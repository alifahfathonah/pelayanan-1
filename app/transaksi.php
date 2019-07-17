<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable = [
        'id_user','id_barang','invoice'
    ];
}
