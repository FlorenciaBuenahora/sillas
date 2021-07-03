<?php
include("../conexion.php");

$queryListaSillas = "SELECT Codigo, Nombre, Precio, Marca, Ambiente from sillas";
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
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Marca</th>
                <th scope="col">Ambiente</th>
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
                        echo "<td>$unaSilla[Codigo]</td>";
                        echo "<td>$unaSilla[Nombre]</td>";
                        echo "<td>USD $unaSilla[Precio]</td>";
                        echo "<td>$unaSilla[Marca]</td>";
                        echo "<td>$unaSilla[Ambiente]</td>";       
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>

