/**
 * Created by ramde on 16/02/2018.
 */
function load_table_asignaturas() {
    var token = $("#hidden").val();
    $.getJSON('api/table_asignatures?api_token='+token, function (dataa) {

        var table ='<table class="table table-striped" id="page_table_courses"><thead>'+
            '<tr><th colspan="9">Estructura Esquematica</th></tr>'+
            '<tr><th colspan="2">Áreas Fundamentales</th><th colspan="7">Horas por Grados</th></tr>'+
            '<tr>'+
            '<th>Nombre Asignatura</th>'
        $.getJSON('api/table_grades?api_token='+token, function (data) {
            for (var i= 0; i < data.length; ++i) {
                table += '<th>'+data[i].codigo+'</th>'
            }
        })
        table += '<th>Acción</th></tr>';

            /*for (var ii= 0; ii < dataa.length; ++ii) {
                table += '<tr>'+
                    '<td>'+ dataa[ii].code_course +'</td>'+
                    '<td>'+ dataa[ii].name_course +'</td>'+
                    '<td>'+ dataa[ii].name_grade +'</td>'+
                    '<td>'+
                    '<button class="btn btn-info" style="width: 50px;"  data-toggle="modal" data-target="#modal_update_course" onclick="data_course('+dataa[ii].course_id+')"><li class="glyphicon glyphicon-pencil"></li></button>'+
                    '<button class="btn btn-danger" style="width: 50px; margin-left: 4px;" onclick="delete_course('+dataa[ii].course_id+')"><li class="glyphicon glyphicon-trash"></li></button>'+
                    '</td>'+
                    '</tr>';
                $("#table_courses").html(table)
            }
            table += '</tbody></table>';
            $('#page_table_courses').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        }*/

    })
}
function load_grades() { /*Funcion Que permite hacer el cargue la tabla con las lista de cursos existentes*/
    var token = $("#hidden").val();
    $.getJSON('api/table_grades?api_token='+token, function (dataa) {
        for (var ii= 0; ii < dataa.length; ++ii) {
            $("#grades").append('<div class="col-md-4">'+
                '<div class="form-group">'+
                '<label for="labelAsignature-'+ii+'">'+dataa[ii].nombre+'</label>'+
                '<div class="input-group">'+
                '<div class="input-group-addon">'+
                '<i class="fa fa-minus-circle"></i>'+
                '</div>'+
                '<input type="number" class="form-control" id="input_horas-'+ii+'" name="input_horas[]" min="1" onkeypress="return num(event)" required>'+
                '<input type="hidden" class="form-control" id="id-'+ii+'" name="id_grade[]" value="'+dataa[ii].id+'">'+
                '</div></div></div>');
        }

    })
}
$(function() {
    load_grades()
    load_table_asignaturas()
});
function reset_form() {
    $("#form_new_asignature")[0].reset();
}
function create_asignature() {
    if($("#inputNameAsignature").val() != '') {
        var retorna = true;
        var token = $("#hidden").val();
        var url = 'api/save_asignature?api_token=' + token;
        data = new FormData($("#form_new_asignature")[0]);
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                console.log(result)
                if (result == 'SI') {
                    $('#response-modal').html('')
                    $('#response-modal').append('<div class="alert alert-dismissible alert-success">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>Registro Exitoso!</strong> </div>')
                    reset_form()
                }
                else {
                    $('#response-modal').html('')
                    $('#response-modal').append('<div class="alert alert-dismissible alert-danger">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>Hubo en error intente más tarde o revise que todos los campos fueron ingresados! </div>')
                }
            },
            error: function (result) {
                $('#response-modal').html('')
                $('#response-modal').append('<div class="alert alert-dismissible alert-danger">' +
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong>Hubo en error intente más tarde o revise que todos los campos fueron ingresados! </div>')
            },
        });
        return retorna;
    }else{
        $('#response-modal').html('')
        $('#response-modal').append('<div class="alert alert-dismissible alert-warning">' +
            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '<strong>Debe ingresar el nombre de la asignatura! </div>')
    }
}