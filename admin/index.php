<?php
include("../conexion.php");

$textoMensaje = "";
$clase = "";
if(isset($_GET['mensaje'])) {
    $mensaje = $_GET ['mensaje'];
    switch ($mensaje) {
        case 'noValido': {
            $textoMensaje = "Su usuario o contraseña no son válidos";
            $clase = "error";
            break;
        }
        case 'noLogueado': {
            $textoMensaje = "Por favor escribe tus datos para ingresar";
            $clase = "error";
            break;
        }
        case 'tiempoExcedido': {
            $textoMensaje = "Se ha cerrado su sesión por inactividad";
            $clase = "error";
            break;
        }
        case 'sesionCerrada': {
            $textoMensaje = "Usted ha cerrado su sesión";
            $clase = "correcto";
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.min.css">

    <title>Login</title>
</head>
<body>
    <form action="validarUsuario.php" method="POST">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        <label for="contrasenia">Contraseña</label>
        <input type="password" name="contrasenia" id="contrasenia">
        <p class="mensaje<?php echo $clase?>"><?php echo $textoMensaje?></p>
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>