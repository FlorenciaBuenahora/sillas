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
?>
    <section class="container resultadoBuscador mt-4">
        <h1>Resultados de la búsqueda <?php echo $textoBuscar ?> </h1>
        <div class="row mt-4">
            <?php
                while($sillaBuscada=mysqli_fetch_array($resultBuscador)){
                    // Imagenes
                    $queryImagenes = "SELECT * FROM imagenes WHERE IDSilla = $sillaBuscada[ID]";
                    $resultImagenes = mysqli_query($link, $queryImagenes);

                    $productoNuevo = "";
                            if($sillaBuscada['Nuevo'] == 1) {
                                $productoNuevo = 'prod-nuevo';
                            }
                            echo "<div class='col-md-6 col-lg-3 producto mb-3'>";
                                echo "<a class='$productoNuevo' href='ampliacion.php?ID=$sillaBuscada[ID]'>";
                                if($sillaBuscada['Nuevo'] == 1) {
                                    echo "<div class='etiqueta-nuevo'>Nuevo</div>";
                                }
                                while($unaImagen = mysqli_fetch_array($resultImagenes)) {
                                    if($unaImagen['DestinoImagen'] === 'catalogo') {
        
                                            echo "<img class='img-fluid' src='assets/img/sillas/$unaImagen[NombreImagen]' alt='$unaImagen[AltImagen]'>";
                                    } 
                                }
                                    // echo "<img class='img-fluid' src='assets/img/sillas/dummy.jpeg' alt='Silla ejemplo'>";
                                    echo "<h2>$sillaBuscada[Nombre]</h2>";
                                    echo "<p>USD $sillaBuscada[Precio]</p>";
                                echo "</a>";
                            echo "</div>";
                }
            ?>
        </div>
    </section>
    <?php include "footer.php";?>
</body>
</html>