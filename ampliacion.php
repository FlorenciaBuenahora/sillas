<?php
include("conexion.php");

$id=$_GET['ID'];
$queryAmpliacion="SELECT * FROM sillas WHERE ID=$id";
$resultAmpliacion=mysqli_query($link, $queryAmpliacion);

// Traer un resultado 
$unaSilla=mysqli_fetch_array($resultAmpliacion);

// Paso el ambiente seleccionado para las migas de pan
$ambienteFiltrado = "";
$ambienteBreadcrumbs = "";
$slash = "";
if(isset($_GET['Ambiente'])){
    $ambienteFiltrado = $_GET['Ambiente'];
    $slash = " /";
    $ambienteBreadcrumbs =  $ambienteFiltrado;
}
// En caso de que se llegue por el buscador, utilizo el ambiente de la silla y no del nav
else{
    $ambienteFiltrado = $unaSilla['Ambiente'];  
}

// Materiales complementaria y relacional
$queryMaterialesAmpliacion="SELECT DISTINCT Nombre FROM materiales AS M INNER JOIN sillasMateriales AS SM ON SM.IDMaterial = M.ID WHERE SM.IDSilla = $id";
$resultMaterialesAmpliacion=mysqli_query($link, $queryMaterialesAmpliacion);

$stringMateriales = "";
$arrayMateriales = array();

while($Materiales=mysqli_fetch_array($resultMaterialesAmpliacion)) {
    $arrayMateriales = explode(", ", "$Materiales[0]");
    foreach($arrayMateriales as $material){
        if($material === $arrayMateriales[0]){
            $stringMateriales = $stringMateriales. $material;
        }
        else{
            $stringMateriales = ", ".$stringMateriales.$material;
        }

    }
}

// Productos similares
$querySimilares = "SELECT ID, Nombre, Precio FROM sillas WHERE Ambiente='$ambienteFiltrado' AND ID<> $unaSilla[ID] ORDER BY RAND() LIMIT 4";
// echo ($querySimilares);
$resultSimilares = mysqli_query($link, $querySimilares);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.min.css">
    
    <title><?php echo $unaSilla['Nombre']?></title>
</head>
<body>
<?php include("nav.php"); ?>

    <div class="container mt-3">
        <nav class="breadcrumb">
            <p><a href="catalogo.php?Ambiente=<?php echo $ambienteBreadcrumbs?>"><?php echo $ambienteBreadcrumbs.$slash?></a> <?php echo $unaSilla['Nombre']?></p>
        </nav>
        <div class="row">
            <div class="col-lg-8 row">
                <div class="col-lg-6">
                    <img class="img-fluid" src="assets/img/sillas/dummy.jpeg" alt="Dummy">
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid" src="assets/img/sillas/dummy2.jpeg" alt="Dummy">
                </div>
                <div class="col-lg-6 mt-4">
                    <img class="img-fluid" src="assets/img/sillas/dummy3.jpeg" alt="Dummy">
                </div>
                <div class="col-lg-6 mt-4">
                    <img class="img-fluid" src="assets/img/sillas/dummy4.jpeg" alt="Dummy">
                </div>
            </div>
            <div class="col-lg-4 prod-info">
                <span>Código: <?php echo $unaSilla[Codigo]?></span>
                <h1 class="mt-2"><?php echo $unaSilla['Nombre']?></h1>
                <h2 class="mt-4">USD <?php echo $unaSilla[Precio]?></h2>
                <p class="mt-3"><?php echo $unaSilla['Descripcion']?></p>
                <h3 class="mt-4">Variantes</h3>
                <div class="variantes d-flex">
                    <div style="width:55px; height:65px; background-color:grey;"></div>
                    <div style="width:55px; height:65px; background-color:grey;"></div>
                    <div style="width:55px; height:65px; background-color:grey;"></div>
                </div>
                <div class="d-flex mt-4">
                    <div class="col-4">
                        <select class="form-select" aria-label="Default select example">
                            <!-- <option selected>Open this select menu</option> -->
                            <option value="1">Cantidad: 1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-8">
                        <a class="btn btn-primary px-6" href="#" role="button">Agregar al carrito</a>
                    </div>
                </div>
                <h3 class="mt-3">Características</h3>
                <p>Marca: <?php echo $unaSilla['Marca']?></p>
                <p>Medidas: <?php echo $unaSilla['Medidas']?></p>
                <p>Material: <?php echo $stringMateriales?></p>
                <p>Ambiente: <?php echo $unaSilla['Ambiente']?></p>
                <p>Estilo: <?php echo $unaSilla['Estilo']?></p>
            </div>
        </div>

        

        <h3>Productos similares</h3>
        <?php
            while($sillaSimilar=mysqli_fetch_array($resultSimilares)){
                echo "<div>";
                echo "<h3><a href='ampliacion.php?ID=$sillaSimilar[ID]&Ambiente=$ambienteFiltrado'>$sillaSimilar[Nombre]</a></h3>";
                echo "<p>USD $sillaSimilar[Precio]</p>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>