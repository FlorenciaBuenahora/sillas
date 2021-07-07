<?php
include("control.php");
include("../conexion.php");

// Acceder a los datos del formulario
// Sanitizar strings
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

$queryInsertar = "INSERT INTO sillas (Codigo, Nombre, Marca, Precio, Color, Medidas, Descripcion, Destacado, Nuevo)
                    VALUES ('$codigo', '$nombre', $marca, $precio, $color, '$medidas', '$descripcion', $destacado, $nuevo)";

$resultInsertarSillas = mysqli_query($link, $queryInsertar);

// Obtener ID del ultimo elemento insertado
$sillaID = $link -> insert_id;

$queryInsertarSillasAmbientes = "INSERT INTO sillasAmbientes(IDSilla,IDAmbiente) VALUES";

// Recorrido para ver cuantos ambientes tiene la silla ingresada
foreach($ambientes as $ambiente){

    // Sino es el ultimo ambiente se le agrega una coma
    if($ambiente !== end($ambientes)){
        $queryInsertarSillasAmbientes = $queryInsertarSillasAmbientes."($sillaID,$ambiente),";
    }
    else{
        $queryInsertarSillasAmbientes = $queryInsertarSillasAmbientes."($sillaID,$ambiente)";
    }
}

$resultInsertarSillasAmbientes = mysqli_query($link, $queryInsertarSillasAmbientes);

$queryInsertarSillasMateriales = "INSERT INTO sillasMateriales(IDSilla,IDMaterial) VALUES";

foreach($materiales as $material){
    if($material !== end($materiales)){
        $queryInsertarSillasMateriales = $queryInsertarSillasMateriales."($sillaID,$material),";
    }
    else{
        $queryInsertarSillasMateriales = $queryInsertarSillasMateriales."($sillaID,$material)";
    }
}

$resultInsertarSillasMateriales = mysqli_query($link, $queryInsertarSillasMateriales);


$queryInsertarSillasEstilos = "INSERT INTO sillasEstilos(IDSilla,IDEstilo) VALUES";

foreach($estilos as $estilo){
    if($estilo !== end($estilos)){
        $queryInsertarSillasEstilos = $queryInsertarSillasEstilos."($sillaID,$estilo),";
    }
    else{
        $queryInsertarSillasEstilos = $queryInsertarSillasEstilos."($sillaID,$estilo)";
    }
}

$resultInsertarSillasEstilos = mysqli_query($link, $queryInsertarSillasEstilos);

if ($resultInsertarSillas && $resultInsertarSillasAmbientes && $resultInsertarSillasMateriales && $resultInsertarSillasEstilos) {
    header ("location:sillas.php?mensaje=insertadoOk");
}
?>
