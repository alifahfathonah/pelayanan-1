<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $fillable = [
        'no_produk','ticket','nama_produk','id_user','status','pesan'
    ];
}
