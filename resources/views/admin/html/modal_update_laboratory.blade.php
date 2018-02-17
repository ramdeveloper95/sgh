<div class="modal fade " id="modal_update_laboratory">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reset_form_laboratory()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar laboratorio</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form_update_laboratory" name="form_update_laboratory" action="javascript:void(0)" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group" id="response-modal-update">
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="inputNombreLabo">Nombre</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="updateNameLaboratory" name="updateNameLaboratory"  required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="id_laboratory" name="id_laboratory">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="update_laboratory()"><li class="glyphicon glyphicon-floppy-saved"></li> Actualizar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>