<?php include_once('servidor.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>
    </head>
    <body>
        <div>
            <h2>Iniciar Sesión</h2>
        </div>
            <form method="post" action="acceso.php">
                <?php include('errores.php'); ?>
                <label>Usuario</label><br>
                <input type="text" name="usuario"><br>
                <label>Contraseña</label><br>
                <input type="password" name="contraseña"><br>
                <button type="submit" name="inicio_usuario">Entrar</button>
                <p>
                    ¿No tienes cuenta? <a href="registro.php">Registrate</a>
                </p>
            </form>
    </body>
</html>