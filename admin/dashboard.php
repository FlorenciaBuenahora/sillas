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
</body>
</html>