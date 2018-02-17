<div class="modal fade" id="modal_new_asignature">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reset_form()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nueva Asignatura</h4>
            </div>
            <div class="modal-body">
                <div class="form-group" id="response-modal"></div>
                <form role="form" id="form_new_asignature" name="form_new_asignature" action="javascript:void(0)" method="post">
                {{ csrf_field() }}
                    <div class="box-body">
                        <div class="bwith-border">
                            <h3 class="box-title" style="font-size: 19px !important; padding-left: 10px;">Datos básicos asignatura</h3>
                            <div class="box box-primary"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="labelAsiganture">Nombre</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-book"></i>
                                    </div>
                                    <input type="text" class="form-control" id="inputNameAsignature" name="inputNameAsignature" required>
                                </div>
                            </div>
                        </div>
                        <div class="bwith-border">
                            <h3 class="box-title" style="font-size: 19px !important; padding-left: 10px;">Cantidad horas grados</h3>
                            <div class="box box-primary"></div>
                        </div>
                        <div id="grades">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="create_asignature()"><li class="glyphicon glyphicon-floppy-saved"></li> Crear</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->