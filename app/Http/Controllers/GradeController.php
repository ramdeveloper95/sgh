<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Grado;
use App\User;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.grade.create_grade');
    }
    public function load_table_grades()
    {
        $grades = Grado::all();
        return response()->json($grades);
    }

}
