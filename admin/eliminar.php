<?php
include("control.php");
include("../conexion.php");

if (isset($_GET['ID'])) {

    $idEliminar = $_GET['ID'];

    // Borrar imagenes de la carpeta
    $queryNombresImagenesBorrar = "SELECT NombreImagen FROM imagenes WHERE IDSilla = $idEliminar";
    $resultNombresImagenesBorrar = mysqli_query($link, $queryNombresImagenesBorrar);

    // Se fija si hay imagenes
    $cantidadImagenesBorrar = mysqli_num_rows($resultNombresImagenesBorrar);
    if($cantidadImagenesBorrar > 0) {
        while($unaImagenBorrar = mysqli_fetch_array($resultNombresImagenesBorrar)) {
            $nombreImagen = $unaImagenBorrar[0];
            unlink("../assets/img/sillas/$nombreImagen");
        }
        // Borrar de tabla de imagenes
        $queryEliminarImagenes = "DELETE FROM imagenes WHERE IDSilla = $idEliminar";
        $resultEliminarImagenes = mysqli_query($link, $queryEliminarImagenes);
    }


    // Borrar registo de silla
    $queryEliminarSillaAmbiente = "DELETE FROM sillasAmbientes WHERE IDSilla = $idEliminar";
    $resultEliminarSillaAmbiente = mysqli_query($link, $queryEliminarSillaAmbiente);

    $queryEliminarSillaEstilos = "DELETE FROM sillasEstilos WHERE IDSilla = $idEliminar";
    $resultEliminarSillaEstilos = mysqli_query($link, $queryEliminarSillaEstilos);

    $queryEliminarSillaMateriales = "DELETE FROM sillasMateriales WHERE IDSilla = $idEliminar";
    $resultEliminarSillaMateriales = mysqli_query($link, $queryEliminarSillaMateriales);

    $queryEliminarSilla = "DELETE FROM sillas WHERE ID=$idEliminar";
    $resultEliminarSilla = mysqli_query($link, $queryEliminarSilla);


    if($resultEliminarSillaAmbiente && $resultEliminarSillaEstilos && $resultEliminarSillaMateriales && $resultEliminarSilla) {
        header("location:sillas.php?mensaje=eliminadoOk");
    } else {
        header("location:sillas.php?mensaje=eliminadoMal");
    }
} else {
    header("location:sillas.php?mensaje=IDMal");
}
?>