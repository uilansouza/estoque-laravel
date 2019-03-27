<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome','descricao','valor','quantidade','user_id'];
    protected $table = 'produtos';
    //protected $guarded = ['id']; //O usuário nao poderá alterar o ID nem incluir

    

}
