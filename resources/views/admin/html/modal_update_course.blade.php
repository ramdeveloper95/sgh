<div class="modal fade " id="modal_update_course">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reset_form()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Curso</h4>
            </div>
                <div class="modal-body">
                    <div class="form-group" id="response-modal-update">
                    </div>
                    <form role="form" id="form_update_course" name="form_update_course" action="javascript:void(0)" method="post">
                        {{ csrf_field() }}
                    <div class="box-body">
                        <div id="result-courses"></div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="inputCode">Código</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-minus-circle"></i>
                                    </div>
                                    <input type="text" class="form-control" id="updateCodeCourse" name="updateCodeCourse" onKeyPress="return num(event)" required>
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
                                    <input type="text" class="form-control" id="updateNameCourse" name="updateNameCourse" required>
                                </div>
                            </div>
                        </div>
                    </div>
                        <input type="hidden" id="id_course" name="id_course">
                    </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="update_course()"><li class="glyphicon glyphicon-floppy-saved"></li> Actualizar</button>
                        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>