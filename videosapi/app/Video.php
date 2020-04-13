<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class Video extends Model 

{
protected $fillable = ['id_curso', 'id_capitulo', 'id_tema', 'archivo', 'descripcion', 'calificacion'];

}