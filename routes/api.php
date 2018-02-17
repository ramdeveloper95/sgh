<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {

    /*Rutas metodo GET*/

    /*cursos*/
    Route::get('list_courses/{id}', 'CourseController@show_courses');
    Route::get('data_course/{id}', 'CourseController@data_course');
    Route::get('delete_course/{id}', 'CourseController@delete_course');

    Route::get('table_courses', 'CourseController@load_table_courses');

    /*Grados*/
    Route::get('table_grades', 'GradeController@load_table_grades');


    /*laboratios*/
    Route::get('table_laboratories', 'LaboratoryController@load_table_laboratories');
    Route::get('data_laboratory/{id}', 'LaboratoryController@data_laboratory');
    Route::get('delete_laboratory/{id}', 'LaboratoryController@delete_laboratory');

    /*Asignaturas*/
    Route::get('table_asignatures', 'AsignatureController@load_table_asignatures');



    /*Rutas metodo POST*/

    /*Cursos / grados*/
    Route::post('save_course', 'CourseController@save_courses');
    Route::post('update_course', 'CourseController@update_courses');

    /*Grados*/

    /*laboratios*/
    Route::post('save_laboratory', 'LaboratoryController@save_laboratories');
    Route::post('update_laboratory', 'LaboratoryController@update_laboratory');

    /*Asignaturas*/
    Route::post('save_asignature', 'AsignatureController@save_asignature');
});