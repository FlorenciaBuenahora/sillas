<?php
session_start();
session_destroy();

// Borrar todas las variables
$_SESSION=array();

header("location:index.php?mensaje=sesionCerrada");

?>