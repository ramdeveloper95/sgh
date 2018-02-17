<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curso extends Model
{
    /*Tabla y campos*/
    protected $table= 'curso';
    protected $fillable = ['grado_id', 'nombre', 'codigo', 'jornada', 'anio'];
    public $timestamps = false;

    /*Relación muchas a uno entre tabla curso y grado*/
    public function grado()
    {
        return $this->belongsTo('App\Grado');
    }

    public static function load_courses()
    {
        $year = date('Y');
        return DB::table('curso')
            ->join('grado', 'curso.grado_id', '=', 'grado.id')
            ->where('curso.anio', $year)
            ->select('curso.id AS course_id',
                'grado.nombre AS name_grade',
                'curso.nombre AS name_course',
                'curso.codigo AS code_course')
            ->orderBy('curso.id', 'ASC')
            ->get();
    }

}
