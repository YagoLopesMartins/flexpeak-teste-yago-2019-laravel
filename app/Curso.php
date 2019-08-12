<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
   // nome da tabela
   protected $table = 'curso';

   // campos da tabela
   protected $primaryKey = 'ID_CURSO';
   public $timestamps = false;

   protected $fillable = [
       'NOME',
       'DATA_CRIACAO',
       'ID_PROFESSOR'
   ];

   protected $guarded = [];
}
