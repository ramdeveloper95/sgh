$(document).ready(function() {

    var i = 1;
        $('#addInput').click(function () {
            i++;
            $('#courses').append('<div id="row' + i + '"><div class="col-md-5">' +
                '<div class="form-group"><label for="inputCodeCourse' + i + '">' +
                'Código</label><div class="input-group"> <div class="input-group-addon">' +
                '<i class="fa fa-minus-circle"></i></div>' +
                '<input type="text" class="form-control" id="inputCodeCourse-' + i + '" name="inputCodeCourse[]" onKeyPress="return num(event)" required>' +
                '</div> </div> </div> <div class="col-md-5"> <div class="form-group">' +
                '<label for="inputNameCourse' + i + '">Nombre</label> <div class="input-group"> <div class="input-group-addon">' +
                '<i class="fa fa fa-edit"></i></div>' +
                '<input type="text" class="form-control" id="inputNameCourse-' + i + '" name="inputNameCourse[]" required>' +
                '</div> </div> </div><div class="col-md-2"><div class="form-group"  style="margin-top: 24px;">' +
                '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove top">X</button></div></div></div>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

});
function load_select_grades() {
    var token = $("#hidden").val();
    $.getJSON('api/table_grades?api_token='+token, function (dataa) {
        var select ='<option selected="selected" value="-1">Seleccionar</option><option value="show">Nuevo Grado</option>'
        for (var ii= 0; ii < dataa.length; ++ii) {
            select += '<option value="'+dataa[ii].id+'">'+dataa[ii].codigo+' - '+dataa[ii].nombre+'</option>'
            $("#selectGrade").html(select)
        }
    });
}
function load_table_courses() { /*Funcion Que permite hacer el cargue la tabla con las lista de cursos existentes*/
    var token = $("#hidden").val();
    $.getJSON('api/table_courses?api_token='+token, function (dataa) {
        var table ='<table class="table table-striped" id="page_table_courses"><thead><tr>'+
        '<th>Código Curso</th>'+
        '<th>Nombre Curso</th>'+
        '<th>Grado</th>'+
        '<th style="width: 120px;">Acción</th>'+
        '</tr></thead><tbody>'
        for (var ii= 0; ii < dataa.length; ++ii) {
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
    })

}

function load_table_grades() { /*Funcion Que permite hacer el cargue la tabla con las lista de cursos existentes*/
    var token = $("#hidden").val();
    $.getJSON('api/table_grades?api_token='+token, function (dataa) {
        var table ='<table class="table table-striped" ><tr>'+
            '<th>Código Grado</th>'+
            '<th>Nombre Grado</th>'+
            '</tr>'
        for (var ii= 0; ii < dataa.length; ++ii) {
            table +=     '<tr>'+
                '<td>'+ dataa[ii].codigo +'</td>'+
                '<td>'+ dataa[ii].nombre +'</td>'+
                '</tr>';
            $("#table_grades").html(table)
        }
        table += '</table>';
    })
}
$(function() {
    load_select_grades()
    load_table_courses();
    //load_table_grades();
});

function new_course(value) {
    button = document.getElementById("addInput");
    if (value.value == '-1') {
        button.style.display = "none";
    }else{
        button.style.display="";
    }
    if (value.value=="show"){
        divC = document.getElementById("new_grade");
        divC.style.display = "";
        code =  $('#code-'+value.value).val('0')
        $("#courses").html('')
        $("#inputCodeGrade").val('');
        $("#inputNameGrade").val('');
        $("#result-courses").html('');
    }else{
        divC = document.getElementById("new_grade");
        divC.style.display="none";

        $("#inputCode").val('');
        $("#inputGrade").val('');
        $("#result-courses").html('');

        code = $('#code-'+value.value).val();
        course = parseInt(code);
        $("#courses").html('');
        if(value.value !="show" && value.value !='-1'){
            $('#result-courses').html('')
            id = $("#selectGrade").val()
            var token = $("#hidden").val();
            $.getJSON('api/list_courses/' + id +'?api_token='+token, function (data) {
                for (var i = 0; i < data.length; ++i) {
                    $('#result-courses').append('<div class="col-md-5"><div class="form-group">'+
                        '<label for="inputCodeCourse'+i+'">Código</label><div class="input-group">'+
                        '<div class="input-group-addon"><i class="fa fa-minus-circle"></i></div>'+
                        '<input type="text" class="form-control" value="'+data[i].codigo+'" readonly="readonly">'+
                        '</div> </div> </div> <div class="col-md-5"> <div class="form-group">'+
                        '<label for="inputNameCourse">Nombre</label><div class="input-group">'+
                        '<div class="input-group-addon"> <i class="fa fa-edit"></i> </div>' +
                        '<input type="text" class="form-control" value="'+data[i].nombre+'" readonly="readonly"></div>'+
                        '</div>');
                }
            })
        }
    }
}

function reset_form() {
    $("#form_new_grade")[0].reset();
    divC = document.getElementById("new_grade");
    divC.style.display="none";
    $("#courses").html('')
    $("#selectGrade option[value='-1']").attr("selected", true);
}

function create_course() {
    if ($("#selectGrade").val() != '-1') {
            var retorna = true;
            var token = $("#hidden").val();
            var url = 'api/save_course?api_token=' + token;
            data = new FormData($("#form_new_grade")[0]);
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
                        $("#form_new_grade")[0].reset();
                        divC = document.getElementById("new_grade");
                        divC.style.display = "none";
                        $("#courses").html('')
                        $("#selectGrade option[value='-1']").attr("selected", true);
                        $("#table_courses").html('')
                        $("#result-courses").html('')
                        load_table_courses();
                        //load_table_grades();
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
            '<strong>Debe Selccionar un curso! </div>')
    }
}

function data_course(id) {

    var token = $("#hidden").val();
    $.getJSON('api/data_course/' + id +'?api_token='+token, function (data) {
        for (var i = 0; i < data.length; ++i) {
            $("#updateCodeCourse").val(data[i].codigo)
            $("#updateNameCourse").val(data[i].nombre)
            $("#id_course").val(data[i].id)

        }
    })
}

function update_course() {
    if ($("#updateCodeCourse").val() != '' && $("#updateNameCourse").val() != ''){
        var retorna = true;
        var token = $("#hidden").val();
        var url = 'api/update_course?api_token=' + token;
        data = new FormData($("#form_update_course")[0]);
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
                    $('#response-modal-update').html('')
                    $('#response-modal-update').append('<div class="alert alert-dismissible alert-success">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>Actualización Exitosa!</strong> </div>')
                    $("#table_courses").html('')
                    load_table_courses();
                    //load_table_grades();
                }
                else {
                    $('#response-modal-updatel').html('')
                    $('#response-modal-update').append('<div class="alert alert-dismissible alert-danger">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>Hubo en error intente más tarde o revise que todos los campos fueron ingresados! </div>')
                }
            },
            error: function ($result) {
                $('#response-modal-update').html('')
                $('#response-modal-update').append('<div class="alert alert-dismissible alert-danger">' +
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong>Hubo en error intente más tarde o revise que todos los campos fueron ingresados! </div>')

            },
        });
        return retorna;
    }else{
        $('#response-modal-update').html('')
        $('#response-modal-update').append('<div class="alert alert-dismissible alert-warning">' +
            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '<strong>Campos estan vacios, ingrese valores </div>')
    }

}
function delete_course(id)
{
    var token = $("#hidden").val();
    $.get('api/delete_course/'+ id +'?api_token='+token, function (data) {
        if(data == 'SI')
        {
            $('#response').html('')
            $('#response').append('<div class="alert alert-dismissible alert-success">'+
                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                '<strong>Curso borrado exitosamente!</strong> </div>')
            $("#table_courses").html('')
            load_table_courses();
            //load_table_grades();
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