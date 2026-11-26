<?php 
    session_start();
    include_once('funciones.php');

    $usuario = "";
    $correo    = ""; 
    $archivo = "usuarios.csv";

    if (isset($_POST['registro_usuario'])) {
        $usuario = trim($_POST['usuario']); 
        $correo = trim($_POST['email']);
        $clave_1 = trim($_POST['password_1']);
        $clave_2 = trim($_POST['password_2']);
        $datosUsuario = array(
            "usuario" => $usuario,
            "email" => $correo,
            "contrasena_1" => $clave_1,
            "contrasena_2" => $clave_2
        );
        registrarUsuario($datosUsuario);
    }

    if (isset($_POST['inicio_usuario'])) { 
        $usuario = $_POST['usuario']; 
        $clave = $_POST['contraseña']; 
        if(autenticar($usuario, $clave)){
            $_SESSION["success"] = "Has iniciado sesión";
        }
        else{
            array_push($errores, "Credenciales incorrectas");
        }
    }
?>