<?php
include("conexion.php");


// Toma el dato enviado por GET de la url
$ambienteSeleccionado=$_GET['Ambiente'];

$queryNombreAmbientePorId = "SELECT DISTINCT A.NombreAmbiente FROM ambientes AS A WHERE A.ID = $ambienteSeleccionado";
$resultNombreAmbientePorId = mysqli_query($link,$queryNombreAmbientePorId);

// Se crea la query principal de filtro agregandole como filtro principal el ambiente seleccionado
$querySillasPorAmbiente="SELECT DISTINCT S.ID, S.Nombre, S.Precio, S.Nuevo FROM sillas AS S
INNER JOIN sillasMateriales AS SM ON S.ID = SM.IDSilla 
INNER JOIN sillasAmbientes AS SA ON S.ID = SA.IDSilla
INNER JOIN sillasEstilos AS SE ON S.ID = SE.IDSilla
INNER JOIN colores AS C ON C.ID = S.Color
INNER JOIN marcas AS M ON M.ID = S.Marca
WHERE SA.IDAmbiente = $ambienteSeleccionado";

include("consultasFiltro.php");

// Para mostrar el h1 nombre del ambiente en el sidebar
$ambienteNombreSeleccionado = "";
while($sillaFiltrada=mysqli_fetch_array($resultNombreAmbientePorId)){
    $ambienteNombreSeleccionado = $sillaFiltrada['NombreAmbiente'];
}

$resultSillasPorAmbiente=mysqli_query($link, $querySillasPorAmbiente);

// Imagenes

// $queryImagenes = "SELECT I.ID, I.IDSilla, I.NombreImagen, I.AltImagen, I.DestinoImagen FROM imagenes AS I INNER JOIN sillasAmbientes AS SA 
// WHERE SA.IDSilla = I.IDSilla AND SA.IDAmbiente = $ambienteSeleccionado";

// echo $resultImagenes;

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
            <?php echo "<h1 class='titulo-catalogo'>Sillas de $ambienteNombreSeleccionado</h1>"; 
            include ("formulario_filtro.php");
            ?>
        </aside>
        <div class="col-md-8 col-lg-10 row mt-4 mt-md-0 ms-md-auto prod">
            <?php
                while($sillaFiltrada=mysqli_fetch_array($resultSillasPorAmbiente)){

                    // Imagenes
                    $queryImagenes = "SELECT * FROM imagenes WHERE IDSilla = $sillaFiltrada[ID]";
                    $resultImagenes = mysqli_query($link, $queryImagenes);

                    $productoNuevo = "";
                    if($sillaFiltrada['Nuevo'] == 1) {
                        $productoNuevo = 'prod-nuevo';
                    }
                    echo "<div class='col-md-6 col-lg-4 mb-3'>";
                        echo "<a class='$productoNuevo' href='ampliacion.php?ID=$sillaFiltrada[ID]&Ambiente=$ambienteSeleccionado'>";
                        if($sillaFiltrada['Nuevo'] == 1) {
                            echo "<div class='etiqueta-nuevo'>Nuevo</div>";
                        }
                        while($unaImagen = mysqli_fetch_array($resultImagenes)) {
                            if($unaImagen['DestinoImagen'] === 'catalogo') {

                                    echo "<img class='img-fluid' src='assets/img/sillas/$unaImagen[NombreImagen]' alt='$unaImagen[AltImagen]'>";
                                    // echo "<img class='img-fluid' src='assets/img/sillas/dummy.jpeg' alt='Silla ejemplo'>";
                            } 
                        }
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