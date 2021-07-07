<?php
include("control.php");
include("../conexion.php");

// Toma la imagen y lo mueve a la carpeta
$nombreImagen = $_FILES['imagen']['name'];
$ubicacionTemporal = $_FILES['imagen']['tmp_name'];
move_uploaded_file($ubicacionTemporal, "../assets/img/sillas/$nombreImagen");

// Toma los datos de la imagen e inserta la información en tabla imagenes
$IDSilla = $_POST['IDSilla'];
$altImagen = $_POST['alt'];
$ubicacionImagen = $_POST['ubicacion'];

$queryInsertarImagen = "INSERT INTO imagenes VALUES (NULL, $IDSilla, '$nombreImagen', '$altImagen', '$ubicacionImagen')";
$resultInsertarImagen = mysqli_query($link, $queryInsertarImagen);

if ($resultInsertarImagen) {
    header("location:sillas.php?mensaje=imgOk");
}
?>