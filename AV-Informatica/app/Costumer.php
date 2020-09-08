<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Nome, CPF, logradouro, número, bairro, cidade, CEP e estado

class Costumer extends Model
{
    public function pedidos(){
        return $this->hasMany('App\Pedido');
    }
    protected $fillable = [
        'nome', 'cpf', 'logradouro', 'numero', 'bairro', 'cidade', 'estado', 'cep', 'descontoPadrao'
    ];
}
