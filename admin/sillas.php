<?php
include("control.php");
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
        case "modificadoOk"; {
            $textoMensaje = "Se ha modificado una silla";
            $clase = "correcto";
            break;
        }
        case "imgOk"; {
            $textoMensaje = "Imagen subida correctamente";
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
    <?php include("header.php");?>
    <div class="row g-0">
        <?php include("nav-izq.php");?>
        <div class="col-md-10 bg-light px-4">
            <!-- Listado sillas -->
            <div class="d-flex d-flex align-items-center">
                <h1 class="h1-admin mt-4">Listado Sillas</h1>
                <div class="ms-auto">
                    <a class="btn btn-primary px-6" href="formAgregarSilla.php" role="button">Agregar silla</a>
                </div>
            </div>
            <!-- Mensajes -->
            <p class="mensaje<?php echo $clase?>"><?php echo $textoMensaje?></p>
            <table class="table listado">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col"><a href="sillas.php?orden=Nombre">Nombre</a></th>
                        <th scope="col"><a href="sillas.php?orden=Precio">Precio</a></th>
                        <th scope="col">Marca</th>
                        <!-- <th scope="col">Ambiente</th> -->
                        <th scope="col" class="text-center">Editar</th>
                        <th scope="col" class="text-center">Subir Imagen</th>
                        <th scope="col" class="text-center">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($unaSilla=mysqli_fetch_array($resultListaSillas)) {
                            echo "<tr>";
                                echo "<td>$unaSilla[ID]</td>";
                                echo "<td><a href='../ampliacion.php?ID=$unaSilla[ID]' target='_blank'>$unaSilla[Nombre]</a></td>";
                                echo "<td>USD $unaSilla[Precio]</td>";
                                echo "<td>$unaSilla[Marca]</td>";
                                echo "<td class='text-center'><a href='formModificar.php?ID=$unaSilla[ID]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-edit'><path d='M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7'></path><path d='M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z'></path></svg>
                                </a></td>";
                                echo "<td class='text-center'><a href='formImg.php?ID=$unaSilla[ID]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-image'><rect x='3' y='3' width='18' height='18' rx='2' ry='2'></rect><circle cx='8.5' cy='8.5' r='1.5'></circle><polyline points='21 15 16 10 5 21'></polyline></svg>
                                </a></td>";
                                echo "<td class='text-center'><a href='eliminar.php?ID=$unaSilla[ID]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-trash-2'><polyline points='3 6 5 6 21 6'></polyline><path d='M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'></path><line x1='10' y1='11' x2='10' y2='17'></line><line x1='14' y1='11' x2='14' y2='17'></line></svg>
                                </a></td>";        
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

