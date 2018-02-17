<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    /*Tabla y campos*/
    protected $table= 'grado';
    protected $fillable = ['nombre', 'codigo'];
    public $timestamps = false;


    /*Relación uno a muchos entre tabla grado y curso*/
    public function curses()
    {
        return $this->hasMany('App\Curso');
    }
}
