<?php
include("../conexion.php");

$queryListaSillas = "SELECT ID, Nombre, Precio, Marca, Ambiente from sillas";

// Si orden esta seteado
if(isset($_GET['orden'])) {
    $orden = $_GET['orden'];
    switch ($orden) {
        // Si el valor es nombre:
        case 'Nombre':
            $queryListaSillas = $queryListaSillas." ORDER BY Nombre";
            break;
            
        // Si el valor es precio:
        case 'Precio':
            $queryListaSillas = $queryListaSillas." ORDER BY Precio";
            break;
    }
}

$resultListaSillas = mysqli_query($link, $queryListaSillas);
// var_dump ($resultListaSillas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.min.css">

    <title>Sillas</title>
</head>
<body>
    <h1>Listado de Sillas</h1>
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col"><a href="sillas.php?orden=Nombre">Nombre</a></th>
                <th scope="col"><a href="sillas.php?orden=Precio">Precio</a></th>
                <th scope="col">Marca</th>
                <th scope="col">Ambiente</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr>
                <td>holis</td>
                <td>alo</td>
            </tr> -->

            <?php
                while($unaSilla=mysqli_fetch_array($resultListaSillas)) {
                    echo "<tr>";
                        echo "<td>$unaSilla[ID]</td>";
                        echo "<td><a href='../ampliacion.php?ID=$unaSilla[ID]' target='_blank'>$unaSilla[Nombre]</a></td>";
                        echo "<td>USD $unaSilla[Precio]</td>";
                        echo "<td>$unaSilla[Marca]</td>";
                        echo "<td>$unaSilla[Ambiente]</td>";
                        echo "<td>Eliminar</td>";        
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>

