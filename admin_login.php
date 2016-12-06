<?php
   // require_once('clases/lib/nusoap.php');
    require_once('clases/Usuario.php');

    $usuario = isset($_POST['usuario']) ? json_decode(json_encode($_POST['usuario'])) : NULL;
    
    //var_dump($usuario);
    //die();

    $obj = new stdClass();
    $obj->Exito = TRUE;
    $obj->Mensaje = "";

    $logueado = Usuario::VerificarLogin($usuario);
    
    if(!$logueado)
    {
            $obj->Exito = FALSE;
            $obj->Mensaje = "Usuario NO encontrado";
        
    }
    echo json_encode($obj);