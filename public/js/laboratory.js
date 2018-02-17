/**
 * Created by ramdeveloper95 on 13/02/2018.
 */
$(document).ready(function(){

    var i=1;

    $('#addInput').click(function(){
        i++;
        $('#laboratoies').append('<div id="row'+i+'"><div class="col-md-10"><div class="form-group">'+
            '<label for="inputNameLaboratory'+i+'">Nombre Laboratorio</label><div class="input-group">'+
            '<div class="input-group-addon"><i class="fa fa-institution"></i></div>'+
            '<input type="text" class="form-control" id="inputNameLaboratory-'+i+'" name="inputNameLaboratory[]" required></div></div></div>'+
            '<div class="col-md-2"><div class="form-group"  style="margin-top: 24px;">' +
            '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove1 top">X</button></div></div></div>');

    });
    $(document).on('click', '.btn_remove1', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
    });
});
function load_table_laboratory() {
    var token = $("#hidden").val();
    $.getJSON('api/table_laboratories?api_token='+token, function (dataa) {
        var table ='<table class="table table-striped" ><tr>'+
            '<th>Nombre</th>'+
            '<th style="width: 120px;">Acción</th>'+
            '</tr>'
        for (var ii= 0; ii < dataa.length; ++ii) {
            table +='<tr>'+
                '<td><div class="col-md-10"><div class="form-group">'+dataa[ii].nombre+'</div></div><div class="col-md-2"><div class="form-group"><div id="update"></div></div></div></td>'+
                '<td>'+
                '<button class="btn btn-info" style="width: 50px;" data-toggle="modal" data-target="#modal_update_laboratory" onclick="data_laboratory('+dataa[ii].id+')"><li class="glyphicon glyphicon-pencil" ></li></button>'+
                '<button class="btn btn-danger" style="width: 50px; margin-left: 4px;" onclick="delete_laboratory('+dataa[ii].id+')"><li class="glyphicon glyphicon-trash"></li></button>'+
                '</td>'+
                '</tr>';
            $("#table_laboratories").html(table)
        }
        table += '</table>';


    })
}
$(function() {
    load_table_laboratory();
});
function reset_form_laboratory() {
    $("#form_new_laboratory")[0].reset();
    $("#laboratoies").html('')

}
function create_laboratory() {
    var retorna = true;
    var token = $("#hidden").val();
    var url='api/save_laboratory?api_token=' + token;
    data = new FormData($("#form_new_laboratory")[0]);
    $.ajax({
        type: "POST",
        url : url,
        data : data,
        cache: false,
        contentType: false,
        processData: false,
        success : function(result){
            console.log(result)
            if(result == 'SI')
            {
                $('#response-modal').append('<div class="alert alert-dismissible alert-success">'+
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                    '<strong>Registro Exitoso! </strong></div>')
                reset_form_laboratory()
                load_table_laboratory();

            }
            else
            {
                $('#response-modal').append('<div class="alert alert-dismissible alert-danger">'+
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong>Hubo en error intente más tarde!</strong> </div>')
            }
        },
        error: function (result) {
            $('#response-modal').html('')
            $('#response-modal').append('<div class="alert alert-dismissible alert-danger">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong>Revise que todos los campos fueron ingresados! </div>')
        },
    });
    return retorna;
}
function data_laboratory(id) {

    var token = $("#hidden").val();
    $.getJSON('api/data_laboratory/' + id +'?api_token='+token, function (data) {
        for (var i = 0; i < data.length; ++i) {
            $("#updateNameLaboratory").val(data[i].nombre)
            $("#id_laboratory").val(data[i].id)

        }
    })
}
function update_laboratory(id) {
    var retorna = true;
    var token = $("#hidden").val();
    var url='api/update_laboratory?api_token=' + token;
    data = new FormData($("#form_update_laboratory")[0]);
    $.ajax({
        type: "POST",
        url : url,
        data : data,
        cache: false,
        contentType: false,
        processData: false,
        success : function(result){
            console.log(result)
            if(result == 'SI')
            {
                $('#response-modal-update').append('<div class="alert alert-dismissible alert-success">'+
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong>Registro Exitoso!</strong> </div>')
                load_table_laboratory();

            }
            else
            {
                $('#response-modal-update').append('<div class="alert alert-dismissible alert-danger">'+
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong>Hubo en error intente más tarde!</strong> </div>')
            }
        },
        error: function (result) {
            $('#response-modal-update').html('')
            $('#response-modal-update').append('<div class="alert alert-dismissible alert-danger">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong>Revise que todos los campos fueron ingresados! </div>')
        },
    });
    return retorna;

}
function delete_laboratory(id)
{
    var token = $("#hidden").val();
    $.get('api/delete_laboratory/'+ id +'?api_token='+token, function (data) {
        if(data == 'SI')
        {
            $('#response').html('')
            $('#response').append('<div class="alert alert-dismissible alert-success">'+
                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                '<strong>Laboratorio borrado exitosamente!</strong> </div>')
            $("#table_laboratories").html('')
            load_table_laboratory();
        }
        else
        {
            $('#response').html('')
            $('#response').append('<div class="alert alert-dismissible alert-danger">'+
                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                '<strong>Hubo en error intente más tarde!. </div>')
        }
    });

}