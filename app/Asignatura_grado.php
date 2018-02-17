<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Asignatura_grado extends Model
{
    protected $table= 'asignatura_grado';
    protected $fillable = ['id', 'asignatura_id','grado_id','horas', 'jornada', 'anio'];
    public $timestamps = false;


    public static function load_asignaturas_horas($jornada)
    {
        $year = date('Y');
        return DB::table('asignatura_grado')
            ->join('asignatura', 'asignatura_grado.asignatura_id', '=', 'asignatura.id')
            ->join('grado', 'asignatura_grado.grado_id', '=', 'grado.id')
            ->where('asignatura_grado.anio', $year)
            ->where('asignatura_grado.jornada', $jornada)
            ->select('asignatura.id AS id_asignatura',
                'asignatura.nombre AS nombre_asignatura',
                'asignatura_grado.id AS id',
                'asignatura_grado.grado_id AS id_grado',
                'grado.nombre AS nombre_grado',
                'asignatura_grado.horas AS horas_grado')
            ->orderBy('asignatura.id', 'ASC')
            ->get();
    }
}
