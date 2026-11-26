<?php include_once('servidor.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
    </head>
    <body>
        <div>
            <h2>Crear cuenta</h2>
        </div>
            <form method="post" action="registro.php">
                <?php include('errores.php'); ?>
                <label>Usuario</label><br>
                <input type="text" name="usuario"><br>
                <label>Email</label><br>
                <input type="text" name="email"><br>
                <label>Contraseña</label><br>
                <input type="password" name="password_1"><br>
                <label>Confirmar Contraseña</label><br>
                <input type="password" name="password_2"><br>
                <button type="submit" name="registro_usuario">Registrarme</button>
                <p>
                    ¿Ya tienes cuenta? <a href="acceso.php">Inicia Sesión</a>
                </p>
            </form>
    </body>
</html>