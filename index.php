<?php
include("conexion.php");

// Los más nuevos //
$queryNuevos="SELECT ID, Nombre, Precio FROM sillas ORDER BY ID DESC LIMIT 4";
$resultNuevos=mysqli_query($link, $queryNuevos);

// // Destacados
// $queryDestacados="SELECT ID, Nombre, Precio FROM sillas ORDER BY ID RAND() LIMIT 4";
// $resultDestacados=mysqli_query($link, $queryDestacados);
// echo $resultDestacados;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/estilos.min.css">
    <title>Sillasuy</title>
</head>
<body>
<?php include "nav.php";?>

<section>
<h1>Los más nuevos</h1>
    <?php
        while($unaSilla=mysqli_fetch_array($resultNuevos)) {
            echo "<article>";
            echo "<h3>$unaSilla[Nombre]</h3>";
            echo "<p>USD $unaSilla[Precio]</p>";
            echo "</article>";
        }
    ?>
</section>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>