<?php
include("../conexion.php");

// Mensajes
$textoMensaje = "";
$clase = "";
if(isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    switch ($mensaje) {
        case "eliminadoOk"; {
            $textoMensaje = "Se ha eliminado una silla";
            $clase = "correcto";
            break;
        }
        case "insertadoOk"; {
            $textoMensaje = "Se ha agregado una silla";
            $clase = "correcto";
            break;
        }
        case "eliminadoMal"; {
            $textoMensaje = "No se ha eliminado una silla";
            $clase = "error";
            break;
        }
        case "IDMal"; {
            $textoMensaje = "Debes seleccionar una silla para eliminarla";
            $clase = "error";
            break;
        }
    }
}

// Consulta listado sillas
$queryListaSillas = "SELECT S.ID, S.Nombre, S.Precio, M.NombreMarca AS Marca FROM sillas AS S
                    INNER JOIN marcas AS M ON M.ID = S.Marca";

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
    <!-- Mensajes -->
    <p class="mensaje<?php echo $clase?>"><?php echo $textoMensaje?></p>

    <!-- Listado sillas -->
    <h1>Sillas</h1>
    <a class="btn btn-primary px-6" href="formAgregarSilla.php" role="button">Agregar silla</a>
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col"><a href="sillas.php?orden=Nombre">Nombre</a></th>
                <th scope="col"><a href="sillas.php?orden=Precio">Precio</a></th>
                <th scope="col">Marca</th>
                <!-- <th scope="col">Ambiente</th> -->
                <th scope="col"></th>
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
                        echo "<td><a href='formModificar.php?ID=$unaSilla[ID]'>Modificar</a></td>"; 
                        echo "<td><a href='eliminar.php?ID=$unaSilla[ID]'>Eliminar</a></td>";        
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>

