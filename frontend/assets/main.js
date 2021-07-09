function listarEstudios() {
    $.get("http://localhost/ubi/limbert/backend/EstudiosController.php", function (data) {
        let datos = JSON.parse(data);
        var ht = '';
        for (var dato of datos) {
            ht += '<div class="card blue-grey darken-1">\n' +
                '       <div class="card-content white-text">\n' +
                '           <p><b>Estudio</b> ' + dato.nombre + '</p>\n' +
                '           <p><b>Instituci&#243;n</b> ' + dato.institucion + '- ' + dato.departamento + ' - ' + dato.pais + '</p>\n' +
                '           <p><b>' + dato.inicio + '</b> - <b>' + dato.fin + '</b></p>\n' +
                '       </div>\n' +
                '  </div>';
        }
        $("#htmresu").html(ht);
    });
}

function listarHabilidades() {
    $.get("http://localhost/ubi/limbert/backend/HabilidadesController.php", function (data) {
        let datos = JSON.parse(data);
        var ht = '';
        for (var dato of datos) {
            ht += '<li class="collection-item">' + dato.nombre + ' nivel // ' + dato.rango + '</li>';
        }
        $("#htmresux").html(ht);
    });
}

$(document).ready(function () {
    $('.modal').modal();
    $('select').formSelect();

    $.get("http://localhost/ubi/limbert/backend/MisdatosController.php", function (data) {
        let datos = JSON.parse(data);
        $("#labelNombre").html(datos[0].nombre);
        $("#labelApellido").html(datos[0].apellido);
        $("#labelDescripcion").html(datos[0].descripcion);
    });
    listarEstudios();
    listarHabilidades();
	
    $("#registrarData").click(function () {
        if ("5217b4cfe1c9d48e6a0627182d981baf" != $("#password").val()) {
            alert("El password no es valido");
            return false;
        }
        var datos = {
            "nombre": $("#nombre").val(),
            "institucion": $("#institucion").val(),
            "pais": $("#pais").val(),
            "ciudad": $("#ciudad").val(),
            "inicio": $("#inicio").val(),
            "fin": $("#final").val(),
            "password": $("#password").val(),
        };

        $.post("http://localhost/ubi/limbert/backend/EstudiosController.php", datos, function (data) {
            if (data == 'true') {
                $("#nombre").val("");
                $("#institucion").val("");
                $("#pais").val("");
                $("#ciudad").val("");
                $("#inicio").val("");
                $("#final").val("");
                $('#modal1').modal('close');
                listarEstudios();
            } else {
                alert("Ocurrio un error");
            }

        });
    });

    $("#registrarHab").click(function () {
        if ("5217b4cfe1c9d48e6a0627182d981baf" != $("#passwordHab").val()) {
            alert("El password no es valido");
            return false;
        }
        var datos = {
            "habilidad": $("#habilidad").val(),
            "nivel": $("#nivel").val(),
            "passwordHab": $("#passwordHab").val(),
        };
        $.post("http://localhost/ubi/limbert/backend/HabilidadesController.php", datos, function (data) {
            if (data == 'true') {
                $("#habilidad").val("");
                $("#nivel").val('1');
                $('#modal2').modal('close');
                listarHabilidades();
            } else {
                alert("Ocurrio un error");
            }
        });
    });
});
