function Login() {

    var pagina = "./admin_login.php";

    var usuario = {email: $("#email").val(), password: $("#password").val(), nombre: $("#nombre").val()};

    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data: {
            usuario: usuario
        },
        async: true
    })
    .done(function (objJson) {

        if (!objJson.Exito) {
            alert(objJson.Mensaje);
            return;
        }

        window.location.href = "index.php";

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });

}

function AutocompletarCampo(parametro){


    var pagina = "./administracion.php";


    var tipo = {tipo : parametro};

    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        data:{
            queMuestro: "AUTOCOMPLETAR_CAMPO",
            tipo: tipo
        },
        async: true
    }).then(function ok(objJson){

            if (!objJson.Exito) {
                alert(objJson.Mensaje);
                return;
            }
            //alert(objJson.password);

             $("#email").val(objJson.email);
             $("#password").val(objJson.password);
             $("#nombre").val(objJson.nombre);

    }, function fail(jqXHR, textStatus, errorThrown){
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });


}

/*
 1- CREAR FUNCION JQUERY QUE RECIBA COMO PARAMETRO UN VALOR EL CUAL VA A CONVERTIR EN UN OBJ JSON
    EL VALOR PASADO COMO PARAMETRO
 2- CREAR FUNCION PHP QUE RECIBA COMO PARAM JSON, QUE CONSULTE A UNA BASE DE DATOS
*/
