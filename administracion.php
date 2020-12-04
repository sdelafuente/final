<?php

require_once("verificar_sesion.php");
require_once("clases/Usuario.php");

$queMuestro = isset($_POST['queMuestro']) ? $_POST['queMuestro'] : NULL;

switch ($queMuestro) {

    case "AUTOCOMPLETAR_CAMPO":

       $tipo = isset($_POST["tipo"]) ? json_decode(json_encode($_POST["tipo"])) : NULL;

       $usuario = Usuario::TipoUsuario($tipo);

       if(!$usuario)
       {
            $usuario->Exito = FALSE;
            $usuario->Mensaje = "No es un TIPO DE USUARIO admitido";
       }else{

            $usuario->Exito = TRUE;
       }

        echo json_encode($usuario);
        break;

    case "MOSTRAR_GRILLA":

        //implementar...
        break;

    case "FORM"://MUESTRA FORM ALTA-MODIFICACION USUARIO

        $usuario = isset($_POST["usuario"]) ? json_decode(json_encode($_POST["usuario"])) : NULL;

        require_once("form.php");

        break;

    case "ALTA_USUARIO":

        $obj = new stdClass();
        $obj->Exito = TRUE;
        $obj->Mensaje = "";

        //implementar...
        echo json_encode($obj);

        break;

    case "MODIFICAR_USUARIO":

        $obj = new stdClass();
        $obj->Exito = TRUE;
        $obj->Mensaje = "";

        //implementar...
        echo json_encode($obj);

        break;

    case "ELIMINAR_USUARIO":

        $obj = new stdClass();
        $obj->Exito = TRUE;
        $obj->Mensaje = "";

        //implementar...
        echo json_encode($obj);

        break;

    case "LOGOUT":

        //implementar...
        break;

    default:
        echo ":(";
}
