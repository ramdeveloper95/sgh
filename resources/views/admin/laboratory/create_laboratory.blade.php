@extends('layouts.base')

@section('content')
    <section class="content-header">
        <h1>
            Laboratorios
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de laboratorios</h3>
                    </div>
                    <div class="col-md-12">
                        <button title="Nuevo Curso" class="btn btn-block btn-info" style="width: 50px;" data-toggle="modal" data-target="#modal_new_laboratory">
                            <li class="glyphicon glyphicon-plus"></li>
                        </button>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                        <div class="form-group" id="response">
                        </div>
                    </div>
                    <br><br>
                    <div class="box-body no-padding">
                        <div class="col-md-12" id="table_laboratories">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.html.modal_new_loboratory')
    @include('admin.html.modal_update_laboratory')
@endsection
@section('js_link')
    <script src="{{asset('js/laboratory.js')}}"></script>

@endsection