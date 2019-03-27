<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable =['cliente_id','data_pedido','user_id'];
    protected $table = 'pedidos';

    public function clientes(){

        return $this->belongsTo(Cliente::class);
    }


       
}


