<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
	protected $table = 'formulario';
  protected $fillable = [
    'pergunta', 'resposta'
  ];
}
