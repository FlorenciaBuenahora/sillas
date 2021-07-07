<?php
include("../conexion.php");

// Acceder a los datos del formulario
// Sanitizar strings
$ID = filter_input(INPUT_GET, 'ID', FILTER_SANITIZE_NUMBER_INT);
$codigo = filter_input(INPUT_GET, 'Codigo', FILTER_SANITIZE_STRING);
$nombre = filter_input(INPUT_GET, 'Nombre', FILTER_SANITIZE_STRING);
$ambientes = $_GET['Ambiente'];
$marca = $_GET['Marca'];
$precio = filter_input(INPUT_GET, 'Precio', FILTER_SANITIZE_NUMBER_INT);
$color = $_GET['Color'];
$materiales = $_GET['Material'];
$medidas = filter_input(INPUT_GET, 'Medidas', FILTER_SANITIZE_STRING);
$estilos = $_GET['Estilo'];
$descripcion = filter_input(INPUT_GET, 'Descripcion', FILTER_SANITIZE_STRING);
$destacado = $_GET['Destacado'];
$nuevo = $_GET['Nuevo'];

$queryUpdateSilla = "UPDATE sillas SET Codigo = '$codigo', Nombre = '$nombre', Marca = $marca, Precio = $precio, Color = $color, 
Medidas = '$medidas', Descripcion = '$descripcion', Destacado = $destacado, Nuevo = $nuevo WHERE ID=$ID";
// echo $queryUpdateSilla;
$resultUpdateSilla = mysqli_query($link, $queryUpdateSilla);

$queryDeleteSillasAmbientes = "DELETE FROM sillasAmbientes WHERE IDSilla = $ID";
$resultDeleteSillasAmbientes = mysqli_query($link, $queryDeleteSillasAmbientes);

$queryInsertarSillasAmbientes = "INSERT INTO sillasAmbientes(IDSilla,IDAmbiente) VALUES";

// Recorrido para ver cuantos ambientes tiene la silla ingresada
foreach($ambientes as $ambiente){

    // Sino es el ultimo ambiente se le agrega una coma
    if($ambiente !== end($ambientes)){
        $queryInsertarSillasAmbientes = $queryInsertarSillasAmbientes."($ID,$ambiente),";
    }
    else{
        $queryInsertarSillasAmbientes = $queryInsertarSillasAmbientes."($ID,$ambiente)";
    }
}

$resultInsertarSillasAmbientes = mysqli_query($link, $queryInsertarSillasAmbientes);

$queryDeleteSillasMateriales = "DELETE FROM sillasMateriales WHERE IDSilla = $ID";
$resultDeleteSillasMateriales = mysqli_query($link, $queryDeleteSillasMateriales);

$queryInsertarSillasMateriales = "INSERT INTO sillasMateriales(IDSilla,IDMaterial) VALUES";

foreach($materiales as $material){
    if($material !== end($materiales)){
        $queryInsertarSillasMateriales = $queryInsertarSillasMateriales."($ID,$material),";
    }
    else{
        $queryInsertarSillasMateriales = $queryInsertarSillasMateriales."($ID,$material)";
    }
}

$resultInsertarSillasMateriales = mysqli_query($link, $queryInsertarSillasMateriales);

$queryDeleteSillasEstilos = "DELETE FROM sillasEstilos WHERE IDSilla = $ID";
$resultDeleteSillasEstilos = mysqli_query($link, $queryDeleteSillasEstilos);

$queryInsertarSillasEstilos = "INSERT INTO sillasEstilos(IDSilla,IDEstilo) VALUES";

foreach($estilos as $estilo){
    if($estilo !== end($estilos)){
        $queryInsertarSillasEstilos = $queryInsertarSillasEstilos."($ID,$estilo),";
    }
    else{
        $queryInsertarSillasEstilos = $queryInsertarSillasEstilos."($ID,$estilo)";
    }
}

$resultInsertarSillasEstilos = mysqli_query($link, $queryInsertarSillasEstilos);

if ($resultUpdateSilla && $resultInsertarSillasAmbientes && $resultInsertarSillasMateriales && $resultInsertarSillasEstilos) {
    header ("location:sillas.php?mensaje=modificadoOk");
}
?>
