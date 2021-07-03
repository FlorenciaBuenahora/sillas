<?php
$nombre = $_GET['nombre'];
$email = $_GET['email'];
$textoMensaje = $_GET['mensaje'];

$destinatario = "contacto@sillasuy.com";
$asunto = "Email enviado por: $nombre";

$cabecera = "From: $email". "\r\n";
$mensaje = "nombre: ".$nombre."\r\n mensaje: " .$textoMensaje;
$enviado = mail($destinatario, $asunto, $cabecera, $mensaje);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Contacto</title>
</head>
<body>
    <?php
    // Si enviado = true
    if ($enviado) {
        echo '<p>¡Hemos recibido tu mensaje!</p>';
    }
    else {
        echo '<p>Mensaje no enviado correctamente</p>';
    }
    ?>
</body>
</html>