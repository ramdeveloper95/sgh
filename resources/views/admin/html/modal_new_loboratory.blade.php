<div class="modal fade " id="modal_new_laboratory">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reset_form_laboratory()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo laboratorio</h4>
            </div>
                <div class="modal-body">
                    <form role="form" id="form_new_laboratory" name="form_new_laboratory" action="javascript:void(0)" method="post">
                        {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group" id="response-modal">
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="inputNombreLabo">Nombre</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                   <input type="text" class="form-control" id="inputCodeCourse-1" name="inputNameLaboratory[]"  required>
                                </div>

                            </div>
                        </div>
                        <div id="laboratoies"></div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-primary" href="javascript:void(0)" id="addInput">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Agregar Laboratorios
                        </a>
                        <button type="button" class="btn btn-primary" onclick="create_laboratory()"><li class="glyphicon glyphicon-floppy-saved"></li> Crear</button>
                    </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>