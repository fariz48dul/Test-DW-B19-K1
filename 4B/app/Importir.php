<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Importir extends Model
{
    protected $table = 'importir_tb';

    protected $fillable = [
        'name', 'address', 'phone'
    ];

    public function produk()
    {
        return $this->hasMany('App\Produk');
    }
}
