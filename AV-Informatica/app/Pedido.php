<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function costumer(){
        return $this->belongsTo('App\Costumer');
    }

    public function products(){
        return $this->belongsToMany('App\Product');
    }

    protected $fillable = [
        'valor', 'costumer_id'
    ];
}
