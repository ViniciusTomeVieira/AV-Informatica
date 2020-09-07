<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function pedidos(){
        return $this->belongsToMany('App\Pedido');
    }
    protected $fillable = [
        'descricao', 'fabricante',
    ];
}
