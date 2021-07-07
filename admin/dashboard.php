<?php
include("control.php");
include("../conexion.php");

// $textoMensaje = "";
// $clase = "";
// if(isset($_GET['mensaje'])) {  
//     $mensaje = $_GET ['mensaje'];
//     switch ($mensaje) {
//         case 'bienvenida': {
//             $textoMensaje = "Bienvenida " .$_SESSION['NombreAdmin'];
//             $clase = "bienvenida";
//             break;
//         }
//     }
// }

// Consulta listado sillas
$queryListaSillas = "SELECT S.ID, S.Nombre, S.Precio, M.NombreMarca AS Marca FROM sillas AS S
                    INNER JOIN marcas AS M ON M.ID = S.Marca ORDER BY S.ID DESC LIMIT 15";

$resultListaSillas = mysqli_query($link, $queryListaSillas);

$queryTotalSillas = "SELECT COUNT(1) FROM sillas";
$resultTotalSillas = mysqli_query($link, $queryTotalSillas);
$sillaTotal = mysqli_fetch_array($resultTotalSillas);
// echo $sillaTotal[0];

$querySuma = "SELECT SUM(Precio) FROM sillas";
$resultSuma = mysqli_query($link, $querySuma);
$sillaSuma = mysqli_fetch_array($resultSuma);
// echo $sillaSuma[0];

$queryDestacados = "SELECT SUM(Destacado) FROM sillas";
$resultDestacados= mysqli_query($link, $queryDestacados);
$sillaDestacados = mysqli_fetch_array($resultDestacados);
// echo $sillaDestacados[0];

$queryNuevos = "SELECT SUM(Nuevo) FROM sillas";
$resultNuevos= mysqli_query($link, $queryNuevos);
$sillaNuevos = mysqli_fetch_array($resultNuevos);
// echo $sillaNuevos[0];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.min.css">
    
    <title>Dashboard</title>
</head>
<body>
    <?php include("header.php");?>
    <div class="row g-0">
        <?php include("nav-izq.php");?>
        <!-- <p class="mensaje<?php echo $clase?>"><?php echo $textoMensaje?></p> -->
        <div class="col-md-10 bg-light px-4">
            <!-- Recientemente agregados -->
            <h1 class="h1-admin mt-4">Dashboard</h1>
            <div class="row mt-4">
                <div class="col-md-9">
                    <h2 class="h2-admin mb-3">Agregados recientemente</h2>
                    <div class="box">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Marca</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($unaSilla=mysqli_fetch_array($resultListaSillas)) {
                                        echo "<tr>";
                                            echo "<td>$unaSilla[ID]</td>";
                                            echo "<td>$unaSilla[Nombre]</td>";
                                            echo "<td>USD $unaSilla[Precio]</td>";
                                            echo "<td>$unaSilla[Marca]</td>";   
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 dashboard-datos">
                    <h2 class="h2-admin mb-3">Sillas</h2>
                    <div class="box">
                        <p>Total</p>
                        <h2><?php echo $sillaTotal[0]; ?></h2>
                    </div>

                    <h2 class="h2-admin mb-3">Ventas</h2>
                    <div class="box">
                        <p>Total</p>
                        <h2>USD <?php echo $sillaSuma[0]; ?></h2>
                    </div>

                    <h2 class="h2-admin mb-3">Destacados</h2>
                    <div class="box">
                        <p>Total</p>
                        <h2><?php echo $sillaDestacados[0]; ?></h2>
                    </div>
                    <h2 class="h2-admin mb-3">Nuevos</h2>
                    <div class="box">
                        <p>Total</p>
                        <h2><?php echo $sillaNuevos[0]; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>