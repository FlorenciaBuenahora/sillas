<?php
include("control.php");
include("../conexion.php");

$idImagen = $_GET['IDImagen'];
$idModificar = $_GET['IDModificar'];

$queryImagen = "SELECT NombreImagen FROM imagenes WHERE ID = $idImagen";
$resultImagen = mysqli_query($link, $queryImagen);
$datosImagen = mysqli_fetch_array($resultImagen);

$nombreImagen = $datosImagen[0];

// Borar imagen de la carpeta

unlink("../assets/img/sillas/$nombreImagen");

// Borrar de la tabla imagenes
$queryBorrarImg = "DELETE FROM imagenes WHERE ID = $idImagen";
$resultBorrarImg = mysqli_query($link, $queryBorrarImg);

if($resultBorrarImg) {
    header("location:formModificar.php?ID=$idModificar&mensaje=imgBorrada");
}
?>