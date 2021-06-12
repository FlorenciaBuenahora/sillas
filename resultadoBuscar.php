<?php
include("conexion.php");
include("nav.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/estilos.min.css">
    <title>Resultados de la búsqueda <?php echo $textoBuscado ?></title>
</head>
<body>
<?php
if (isset($_GET['buscar'])) {

    $textoBuscar = $_GET['buscar'];
    $queryBuscador = $queryBuscador. " WHERE Nombre LIKE '%$textoBuscar%'";
    // Al hacer click se genera una nueva página, por lo que vuelvo a hacer la consulta
    $resultBuscador = mysqli_query($link, $queryBuscador);

}
echo "<h1>Resultados de la búsqueda $textoBuscar</h1>";
?>

    <section>
        <?php
            while($sillaBuscada=mysqli_fetch_array($resultBuscador)){
                echo "<div>";
                echo "<h3>$sillaBuscada[Nombre]</h3>";
                echo "<p>USD $sillaBuscada[Precio]</p>";
                echo "</div>";
            }
        ?>
    </section>
</body>
</html>