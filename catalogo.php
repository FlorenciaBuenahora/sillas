<?php
include("conexion.php");


// Toma el dato enviado por GET de la url
$ambienteSeleccionado=$_GET['Ambiente'];

// Le digo que quiero mostrar los que cumplen con el Ambiente seleccionado y un LIKE para que no ignore las sillas versátiles
$querySillasPorAmbiente="SELECT DISTINCT S.ID, S.Nombre, S.Precio, S.Ambiente, S.Nuevo FROM sillas AS S
INNER JOIN sillasMateriales AS SM ON S.ID = SM.IDSilla 
INNER JOIN colores AS C ON C.ID = S.Color
WHERE Ambiente LIKE '%$ambienteSeleccionado%'";

include("consultasFiltro.php");


// echo $querySillasPorAmbiente;


$resultSillasPorAmbiente=mysqli_query($link, $querySillasPorAmbiente);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/estilos.min.css">
    <title>Catálogo</title>
</head>
<body>
<?php
// Nav 
include("nav.php");
?>


<div class="container mt-4">
    <div class="row align-items-start">
        <aside class="col-md-4 col-lg-2">
            <?php echo "<h1 class='titulo-catalogo'>Sillas de $ambienteSeleccionado</h1>"; 
            include ("formulario_filtro.php");
            ?>
        </aside>
        <div class="col-md-8 col-lg-10 row mt-4 mt-md-0 ms-md-auto prod">
            <?php
                while($sillaFiltrada=mysqli_fetch_array($resultSillasPorAmbiente)){
                    $productoNuevo = "";
                    if($sillaFiltrada['Nuevo'] == 1) {
                        $productoNuevo = 'prod-nuevo';
                    }
                    echo "<div class='col-md-6 col-lg-4 mb-3'>";
                        echo "<a class='$productoNuevo' href='ampliacion.php?ID=$sillaFiltrada[ID]&Ambiente=$ambienteSeleccionado'>";
                        if($sillaFiltrada['Nuevo'] == 1) {
                            echo "<div class='etiqueta-nuevo'>Nuevo</div>";
                        }
                            
                            echo "<img class='img-fluid' src='assets/img/sillas/dummy.jpeg' alt='Silla ejemplo'>";
                            echo "<h2>$sillaFiltrada[Nombre]</h2>";
                            echo "<p>USD $sillaFiltrada[Precio]</p>";
                        echo "</a>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</div>



<?php include "footer.php";?>    

<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>