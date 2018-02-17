<div class="modal fade " id="modal_new_course">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reset_form()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Grado - Curso</h4>
            </div>
                <div class="modal-body">
                    <div class="form-group" id="response-modal"></div>
                    <form role="form" id="form_new_grade" name="form_new_grade" action="javascript:void(0)" method="post">
                        {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="selectGrade">Seleccionar Grado</label>
                            <select id="selectGrade" name="selectGrade" onChange="new_course(this)" class="form-control btn btn-block btn-primary" style="width: 100%;">
                            </select>
                        </div>
                        <div id="new_grade" style="display: none;">
                            <div class="with-border">
                                <h3 class="box-title" style="font-size: 19px !important;  padding-left: 10px;">Grado</h3>
                                <div class="box box-primary"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputCode">Código</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-minus-circle"></i>
                                        </div>
                                        <input type="text" class="form-control" id="inputCodeGrade" name="inputCodeGrade" onKeyPress="return num(event)" required>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputGrade">Nombre</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                        <input type="text" class="form-control" id="inputNameGrade" name="inputNameGrade" required>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="bwith-border">
                            <h3 class="box-title" style="font-size: 19px !important; padding-left: 10px;">Curso</h3>
                            <div class="box box-primary"></div>
                        </div>
                        <div id="result-courses"></div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="inputCode">Código</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-minus-circle"></i>
                                    </div>
                                    <input type="text" class="form-control" id="inputCodeCourse-1" name="inputCodeCourse[]" onKeyPress="return num(event)" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="inputGrade">Nombre</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                    <input type="text" class="form-control" id="inputNameCourse-1" name="inputNameCourse[]" required>
                                </div>
                            </div>
                        </div>
                        <div id="courses">
                        </div>
                    </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="javascript:void(0)" id="addInput" style="display: none;">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Agregar Cursos
                            </a>
                            <button type="button" class="btn btn-primary" onclick="create_course()"><li class="glyphicon glyphicon-floppy-saved"></li> Crear</button>
                        </div>
                </form>
            </div>
        <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>
</div>

