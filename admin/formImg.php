<?php
include("control.php");
include("../conexion.php");

$IDSilla = $_GET['ID'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.min.css">

    <title>Subir imágenes</title>
</head>
<body>
    <form action="insertarImg.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="IDSilla" value="<?php echo $IDSilla?>">
    <input type="file" name="imagen" id="imagen"><br>
    <label for="alt">Alt de la imagen</label>
    <input type="text" name="alt" id="alt"><br>
    <label for="">Ubicación</label>
    <select name="ubicacion" id="ubicacion">
        <option value="catalogo">Catálogo</option>
        <option value="ampliacion">Ampliación</option>
    </select><br>
    <input type="submit" value="Subir imagen">
    </form>
</body>
</html>