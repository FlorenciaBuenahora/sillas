<?php
session_start();

// Sino existe la variable NombreAdmin, manda el usuario al index
if(!isset($_SESSION['NombreAdmin'])) {
    header("location:index.php?mensaje=noLogueado");
} else {
    $ahora = date("Y-n-j H:i:s");
    $diferencia = strtotime($ahora) - strtotime($_SESSION['horaLogueo']);
    if($diferencia > 600) {
        session_destroy();
        $_SESSION = array();
        header("location:index.php?mensaje=tiempoExcedido");

        // Para que se recargue cuando el usuario se va moviendo entre paginas
    } else {
        $_SESSION['horaLogueo'] === $ahora;
    }
}

?>