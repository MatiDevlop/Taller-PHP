<?php
    $errores = array();
    
   function registrarUsuario($datosUsuario) {
      global $errores;
      $errores = array();
      $existe = false;
      $archivo = "usuarios.csv";
      $usuario = $datosUsuario["usuario"];
      $email = $datosUsuario["email"];
      $contrasena_1 = $datosUsuario["contrasena_1"];
      $contrasena_2 = $datosUsuario["contrasena_2"];
      if (empty($usuario)){
        array_push($errores, "Usuario es requerido");
      }
      if (strlen($usuario) > 6){
        array_push($errores, "Longitud de usuario es mayor a 6");
      }
      if (empty($email)){
        array_push($errores, "Email es requerido");
      }
      if (empty($contrasena_1)){
        array_push($errores, "Contraseña es requerida");
      }
      if ($contrasena_1 != $contrasena_2){
        array_push($errores, "Las contraseñas no coinciden");
      }
      if(file_exists($archivo)){
        $recurso = file($archivo);
        foreach($recurso as $linea){
          $arreglo = explode(",", $linea);
          if(trim($arreglo[0]) == $usuario){
            array_push($errores, "El usuario ya existe");
            $existe = true;
          }
          if(trim($arreglo[1]) == $email){
            array_push($errores, "El email ya existe");
            $existe = true;
          }
        }
      }
      else{
        array_push($errores, "No se encuentra el archivo");
      }
      if(!$existe && empty($errores)){
        $linea = "$usuario,$email,$contrasena_1,$contrasena_2\n";
        file_put_contents($archivo, $linea, FILE_APPEND) or die("ERROR");
      }
      else{
        if($existe){
          array_push($errores, "El usuario ya esta registrado");
        }
      }
   }

   function autenticar($usuario, $contrasena){
    global $errores;
    $errores = array();
    $archivo = "usuarios.csv";
    if (empty($usuario)) { 
        array_push($errores, "Usuario es requerido"); 
    }
    if (empty($contrasena)) { 
        array_push($errores, "Contraseña es requerida"); 
    }
    if(file_exists($archivo)){
      $recurso = file($archivo);
      foreach($recurso as $linea){
        $arreglo = explode(",", $linea);
        if(trim($arreglo[0]) == $usuario && trim($arreglo[2]) == $contrasena){
          return true;
        }
      }
    }
    else{
      array_push($errores, "No existe el archivo");
    }
    return false;
   }
?>