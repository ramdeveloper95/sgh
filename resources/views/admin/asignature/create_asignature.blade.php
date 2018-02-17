@extends('layouts.base')

@section('content')
    <section class="content-header">
        <h1>
            Asignaturas
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de  asignaturas</h3>
                    </div>
                    <div class="col-md-12">
                        <button title="Nuevo Curso" class="btn btn-block btn-info" style="width: 50px;" data-toggle="modal" data-target="#modal_new_asignature">
                            <li class="glyphicon glyphicon-plus"></li>
                        </button>
                    </div>
                    <br><br>
                    <div class="col-md-12" >
                        <div class="form-group" id="response">
                        </div>
                    </div>
                    <br><br>
                    <div class="box-body no-padding">
                        <div class="col-md-12" id="table_asignatures">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.html.modal_new_asignature')
@endsection
@section('js_link')
    <script src="{{asset('js/asignature.js')}}"></script>
    <!-- general script -->
    <script src="{{asset('js/generals.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

@endsection