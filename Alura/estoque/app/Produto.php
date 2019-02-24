<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //tabela = lower_case(Classe) + s
    //para alterar
    //protected $table = 'produto';
    //desativando o created_at e update_at
    public $timestamps = false;

    //oque pode ser preenchido pelo array?
    protected $fillable = array('nome', 'descricao', 'quantidade', 'valor', 'tamanho');
}
