<?php
include("../conexion.php");

if (isset($_GET['ID'])) {

    $idEliminar = $_GET['ID'];

    $queryEliminar = "DELETE FROM sillas WHERE ID=$idEliminar";
    $resultEliminar = mysqli_query($link, $queryEliminar);

    if($resultEliminar) {
        header("location:sillas.php?mensaje=eliminadoOk");
    } else {
        header("location:sillas.php?mensaje=eliminadoMal");
    }
} else {
    header("location:sillas.php?mensaje=IDMal");
}
?>