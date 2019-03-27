<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class ItensPedidos extends Model
{
   
    protected $fillable =['pedido_id','produto_id','quantidade','valor_venda','user_id'];
    protected $table = 'itensPedidos';

   
}
