<?php
include("control.php");
include("../conexion.php");

$textoMensaje = "";
$clase = "";
if(isset($_GET['mensaje'])) {  
    $mensaje = $_GET ['mensaje'];
    switch ($mensaje) {
        case 'bienvenida': {
            $textoMensaje = "Bienvenida " .$_SESSION['NombreAdmin'];
            $clase = "bienvenida";
            break;
        }
    }
}

// Consulta listado sillas
$queryListaSillas = "SELECT S.ID, S.Nombre, S.Precio, M.NombreMarca AS Marca FROM sillas AS S
                    INNER JOIN marcas AS M ON M.ID = S.Marca ORDER BY S.ID DESC LIMIT 10";

$resultListaSillas = mysqli_query($link, $queryListaSillas);
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
<p class="mensaje<?php echo $clase?>"><?php echo $textoMensaje?></p>

<!-- Recientemente agregados -->
<h1>Agregados recientemente</h1>
    <table class="table">
        <thead class="table-light">
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

</body>
</html>