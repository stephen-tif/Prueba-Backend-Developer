<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";

    protected $fillable = [
        'sku','nombre','cantidad','precio','descripcion','imagen'
    ];
}
