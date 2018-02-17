<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grado;
use App\Curso;
use App\User;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function load_table_courses()
    {
        $courses = Curso::load_courses();
        return response()->json($courses);
    }
    public function show_courses($id)
    {
        $courses = Curso::where('grado_id', $id)->where('jornada',  auth()->user()->jornada)->get();
        return response()->json($courses);
    }
    public function save_courses(Request $request)
    {
        $year = date('Y');
        if($request->selectGrade  !='show')
        {
            if (count($request->inputCodeCourse) != 0 && count($request->inputNameCourse) !=0){
                $i=0;
                foreach ($request->inputNameCourse as $name)
                {
                    $arrUnd[$i]=$name;
                    $i++;
                }
                $i=0;
                foreach ($request->inputCodeCourse as $code)
                {
                    if ($code <> "" && $arrUnd[$i]<>"") {
                        $new_course = new Curso();
                        $new_course->grado_id = $request->selectGrade;
                        $new_course->nombre = $arrUnd[$i];
                        $new_course->codigo = $code;
                        $new_course->jornada = auth()->user()->jornada;
                        $new_course->anio = $year;

                        $result = $new_course->save();
                    }
                    $i++;
                }
                if($result){
                    return $respueta = "SI";
                }else{
                    return $respueta = "NO";
                }
            }else{
                return $respueta = "NO";
            }

        }else{
            if(($request->inputCodeGrade !='' && $request->inputNameGrade != '') && (count($request->inputCodeCourse) != 0 && count($request->inputNameCourse) !=0)){

                $new_grade = new Grado();
                $new_grade->nombre = $request->inputNameGrade;
                $new_grade->codigo = $request->inputCodeGrade;

                $result = $new_grade->save();

                $id = $new_grade->id;

                if($result){
                    $i=0;
                    foreach ($request->inputNameCourse as $name)
                    {
                        $arrUnd[$i]=$name;
                        $i++;
                    }
                    $i=0;
                    foreach ($request->inputCodeCourse as $code)
                    {
                        if ($code <> "" && $arrUnd[$i]<>"") {

                            $new_course = new Curso();
                            $new_course->grado_id = $id;
                            $new_course->nombre = $arrUnd[$i];
                            $new_course->codigo = $code;
                            $new_course->jornada = auth()->user()->jornada;
                            $new_course->anio = $year;

                            $result2 = $new_course->save();
                        }
                        $i++;
                    }
                    if($result2){
                        return $respueta = "SI";
                    }else{
                        return $respueta = "NO";
                        $new_grade_reset= Grado::find($id->last()->id)->delete();
                    }
                }else{
                    return $respueta = 'NO';
                }
            }else{
                return $respueta = 'NO';
            }
        }

    }
    public function data_course ($id)
    {
        $course = Curso::where('id', $id)->get();
        return response()->json($course);
    }
    public function update_courses(Request $request)
    {
        $update_course = Curso::find($request->id_course);;
        $update_course->nombre = $request->updateNameCourse;
        $update_course->codigo = $request->updateCodeCourse;

        $result = $update_course->save();
        if($result){
            return $respueta = 'SI';
        }else{
            return $respueta = 'NO';
        }
    }
    public function delete_course($id)
    {
        $course_destroy= Curso::find($id)->delete();
        if($course_destroy){
            return $respueta = "SI";
        }else{
            return $respueta = "NO";
        }
    }
}
