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
    <?php include("header.php");?>
    <div class="row g-0">
        <?php include("nav-izq.php");?>
        <div class="col-md-10 bg-light px-4"> 
            <h1 class="h1-admin my-4">Subir Imagen</h1> 
            <form action="insertarImg.php" method="POST" enctype="multipart/form-data" class="col-md-6">
                <input type="hidden" name="IDSilla" value="<?php echo $IDSilla?>">
                <input class="form-control" type="file" name="imagen" id="imagen">
                <label class="form-label mt-4" for="alt">Alt de la imagen</label>
                <input class="form-control" type="text" name="alt" id="alt">
                <label class="form-label mt-4" for="">Ubicación</label>
                <select class="form-select" name="ubicacion" id="ubicacion">
                    <option value="catalogo">Catálogo</option>
                    <option value="ampliacion">Ampliación</option>
                </select><br>
                <input class="btn btn-primary px-6 ms-auto" role="button" type="submit" value="Subir imagen">
            </form>
        </div>
    </div>
</body>
</html>