<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk_tb';

    protected $fillable = [
        'name', 'importir_id', 'photo', 'qty', 'price'
    ];

    public function importir()
    {
        return $this->belongsTo('App\Importir');
    }
}
