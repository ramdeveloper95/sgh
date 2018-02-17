<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\Asignatura_grado;
use App\User;
class AsignatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.asignature.create_asignature');
    }
    public function load_table_asignatures()
    {
        $asignatures = Asignatura_grado::load_asignaturas_horas(auth()->user()->jornada);
        return response()->json($asignatures);
    }
    public function save_asignature(Request $request)
    {
        $year = date('Y');
        $new_asignature = new Asignatura();
        $new_asignature->nombre = $request->inputNameAsignature;
        $result = $new_asignature->save();

        $id_reg = $new_asignature->id;

            if($result){
                $i=0;
                foreach ($request->id_grade as $id)
                {
                    $arrUnd[$i]=$id;
                    $i++;
                }
                $i=0;
                foreach ($request->input_horas as $horas)
                {
                    if ($horas <> "" && $arrUnd[$i]<>"") {

                            $new_asig_curso = new Asignatura_grado();
                            $new_asig_curso->asignatura_id = $id_reg;
                            $new_asig_curso->grado_id = $arrUnd[$i];
                            $new_asig_curso->horas = $horas;
                            $new_asig_curso->jornada = auth()->user()->jornada;
                            $new_asig_curso->anio = $year;
                            $result2 = $new_asig_curso->save();

                    }
                    $i++;
                }
                if($result2){
                    return $respueta = "SI";
                }else{
                    return $respueta = "NO";
                    $new_asignature_reset = Asignatura::find($id_reg->last()->id)->delete();
                }
        }else{
                return $respuesta = 'NO';
            }
    }

}
