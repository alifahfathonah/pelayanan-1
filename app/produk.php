<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $fillable = [
        'nama','kategori','quantity','img','harga'
    ];
}
