<?php
include("../conexion.php");

if (isset($_GET['ID'])) {

    $idEliminar = $_GET['ID'];

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