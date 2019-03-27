<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table ='clientes';
    protected $fillable = ['nome','email','endereco','telefone','user_id'];

    public function pedidos(){

        return $this->hasMany(Pedido::class);

    }
}
