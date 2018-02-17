<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laboratorio;
class LaboratoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.laboratory.create_laboratory');
    }
    public function load_table_laboratories()
    {
        $laboratories = Laboratorio::all();
        return response()->json($laboratories);
    }
    public function save_laboratories(Request $request)
    {
            if($request->inputNameLaboratory  !=''){

                    foreach ($request->inputNameLaboratory as $name)
                    {
                        $new_laboratory = new Laboratorio();
                        $new_laboratory->nombre = $name;
                        $result = $new_laboratory->save();
                    }
                    if ($result){
                        return $respuesta = 'SI';
                    }else{
                        return $respuesta = 'NO';
                    }
        }

    }
    public function data_laboratory ($id)
    {
        $laboratory = Laboratorio::where('id', $id)->get();
        return response()->json($laboratory);
    }
    public function update_laboratory(Request $request)
    {
        $edit_laboratory = Laboratorio::find($request->id_laboratory);
        $edit_laboratory->nombre = $request->updateNameLaboratory;
        $resultQuery = $edit_laboratory->save();

        if ($resultQuery){
            return $respuesta = 'SI';
        }else{
            return $respuesta = 'NO';
        }
    }
    public function delete_laboratory($id)
    {
        $laboratory_destroy= Laboratorio::find($id)->delete();
        if($laboratory_destroy){
            return $respueta = "SI";
        }else{
            return $respueta = "NO";
        }
    }
}
