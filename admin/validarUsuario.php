<?php
include("../conexion.php");

$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];
// echo $usuario.$contrasenia;

// Confirmar si en la tabla admin hay algun registro que coincida con los datos
$queryValidarUusuario = "SELECT * FROM administradores WHERE Usuario = '$usuario' AND Contrasenia = '$contrasenia'";
$resultValidarUsuario = mysqli_query($link, $queryValidarUusuario);

// Si es mayor que 0 quiere decir que coincide
$cantidad = mysqli_num_rows($resultValidarUsuario);
if($cantidad === 1) {
    $datosUsuario = mysqli_fetch_array($resultValidarUsuario);
    // Crea sesion
    session_start();
    $_SESSION['NombreAdmin']=$datosUsuario['NombreAdmin'];
    $_SESSION['logueado']="ok";
    $_SESSION['horaLogueo']=date("Y-n-j H:i:s");

    header("location:dashboard.php");
} else {
    header("location:index.php?mensaje=noValido");
}
?>