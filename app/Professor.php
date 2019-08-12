<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    // nome da tabela
    protected $table = 'professor';

    // campos da tabela
    protected $primaryKey = 'ID_PROFESSOR';
    public $timestamps = false;

    protected $fillable = [
        'NOME',
        'DATA_NASCIMENTO',
        'DATA_CRIACAO'
    ];

    protected $guarded = [];
}
