<?php
include("conexion.php");
include("nav.php");


// Toma el dato enviado por GET de la url
$ambienteSeleccionado=$_GET['Ambiente'];

// Le digo que quiero mostrar los que cumplen con el Ambiente seleccionado y un LIKE para que no ignore las sillas versátiles
$querySillasPorAmbiente="SELECT DISTINCT S.ID, S.Nombre, S.Precio, S.Ambiente FROM sillas AS S
INNER JOIN sillasMateriales AS SM ON S.ID = SM.IDSilla 
INNER JOIN colores AS C ON C.ID = S.Color
WHERE Ambiente LIKE '%$ambienteSeleccionado%'";

include("consultasFiltro.php");


echo $querySillasPorAmbiente;


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
<?php echo "<h1>Sillas de $ambienteSeleccionado</h1>";
include ("formulario_filtro.php");
?>
    <section>
        <?php
            while($sillaFiltrada=mysqli_fetch_array($resultSillasPorAmbiente)){
                echo "<div>";
                echo "<h3><a href='ampliacion.php?ID=$sillaFiltrada[ID]&Ambiente=$ambienteSeleccionado'>$sillaFiltrada[Nombre]</a></h3>";
                echo "<p>USD $sillaFiltrada[Precio]</p>";
                echo "</div>";
            }
        ?>
    </section>
</body>
</html>