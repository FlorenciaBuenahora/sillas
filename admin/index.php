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
    <div class="row g-0">
    <div class="col-md-6">
        <div class="login-img">
        </div>
        <!-- <img src="assets/img/img-login.jpg" alt="Imagen login de dos sillas" class="img-fluid"> -->
    </div>
    <div class="col-md-6 form-col d-flex justify-content-center align-items-center">
        <form action="validarUsuario.php" method="POST" class="form-login p-5 d-flex flex-column">
            <!-- <h2 class="mb-3">Login</h2> -->
            <img src="../assets/logo/sillasuy.svg" alt="Logo" class="m-auto">
            <label for="usuario" class="form-label mt-4">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control mb-3" required>
            <label for="contrasenia" class="form-label">Contraseña</label>
            <input type="password" name="contrasenia" id="contrasenia" class="form-control" required>
            <p class="mensaje<?php echo $clase?>"><?php echo $textoMensaje?></p>
            <input class="btn btn-primary" role="button" type="submit" value="Ingresar">
        </form>
    </div>
    </div>
</body>
</html>