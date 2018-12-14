<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = false;
    protected $fillable = array('nome','descricao','valor','quantidade');
    protected $guarded = ['id']; //O usuário nao poderá alterar o ID nem incluir
}
