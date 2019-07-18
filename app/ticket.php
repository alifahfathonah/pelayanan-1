<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $fillable = [
        'no_produk','ticket','id_user','status','pesan'
    ];
}
