<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    // nome da tabela
   protected $table = 'aluno';

   // campos da tabela
   protected $primaryKey = 'ID_ALUNO';
   public $timestamps = false;

   protected $fillable = [
       'NOME',
       'DATA_NASCIMENTO',
       'LOGRADOURO',
       'NUMERO',
       'BAIRRO',
       'CIDADE',
       'ESTADO',
       'DATA_CRIACAO',
       'CEP',
       'ID_CURSO'
   ];

   protected $guarded = [];
}
