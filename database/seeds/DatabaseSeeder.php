<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('ProdutoTableSeeder');

        
    }
}

class ProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into produtos
        (nome,quantidade,valor,descricao)
        value(?,?,?,?)',
        array('Geladeira',3,590,'Side by Side com gelo na porta')
        );

        DB::insert('insert into produtos
        (nome, quantidade, valor, descricao)
        values (?,?,?,?)',
        array('Fogão', 4, 950,'Painel automático e forno elétrico')
        );
 
        DB::insert('insert into produtos
        (nome, quantidade, valor, descricao)
        values (?,?,?,?)',
        array('Microondas', 5,1520,'Manda SMS quando termina de esquentar')
        );
    }
}