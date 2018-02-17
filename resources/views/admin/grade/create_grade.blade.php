@extends('layouts.base')

@section('content')
    <section class="content-header">
        <h1>
            Grados - Cursos
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de  cursos</h3>
                    </div>
                    <div class="col-md-12">
                    <button title="Nuevo Curso" class="btn btn-block btn-info" style="width: 50px;" data-toggle="modal" data-target="#modal_new_course">
                        <li class="glyphicon glyphicon-plus"></li>
                    </button>
                    </div>

                    <div class="col-md-12" >
                        <div class="form-group" id="response">
                        </div>
                    </div>
                    <br><br>
                    <div class="box-body no-padding">
                        <div class="col-md-12" id="table_courses">
                        </div>
                    </div>
                    <div class="box-body no-padding" style="display: none;">
                        <div class="box-header">
                            <h3 class="box-title">Grados Existentes</h3>
                        </div>
                        <div class="col-md-4" id="table_grades">
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </section>
    @include('admin.html.modal_new_grade_course')
    @include('admin.html.modal_update_course')
@endsection
@section('js_link')
    <script src="{{asset('js/grade_course.js')}}"></script>
    <!-- general script -->
    <script src="{{asset('js/generals.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

@endsection