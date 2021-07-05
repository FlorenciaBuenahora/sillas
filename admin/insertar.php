<?php
include("../conexion.php");

// Acceder a los datos del formulario
// Sanitizar strings
$codigo = filter_input(INPUT_GET, 'Codigo', FILTER_SANITIZE_STRING);
$nombre = filter_input(INPUT_GET, 'Nombre', FILTER_SANITIZE_STRING);
$ambiente = $_GET['Ambiente'];
$marca = $_GET['Marca'];
$precio = filter_input(INPUT_GET, 'Precio', FILTER_SANITIZE_NUMBER_INT);
$color = $_GET['Color'];
$material = $_GET['Material'];
$medidas = filter_input(INPUT_GET, 'Medidas', FILTER_SANITIZE_STRING);
$estilo = $_GET['Estilo'];
$descripcion = filter_input(INPUT_GET, 'Descripcion', FILTER_SANITIZE_STRING);
$destacado = $_GET['Destacado'];
$nuevo = $_GET['Nuevo'];

$queryInsertar = "INSERT INTO sillas VALUES('', '$codigo', '$nombre', '$marca', $precio, $color, '$medidas', '$descripcion', $destacado, $nuevo)";
?>