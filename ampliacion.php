<?php
include("conexion.php");
include("nav.php");

$id=$_GET['ID'];
$queryAmpliacion="SELECT * FROM sillas WHERE ID=$id";
$resultAmpliacion=mysqli_query($link, $queryAmpliacion);

// Paso el ambiente seleccionado para las migas de pan
$ambienteFiltrado = "";
if(isset($_GET['Ambiente'])){
    $ambienteFiltrado = $_GET['Ambiente'];
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

        
    



// Traer un resultado 
$unaSilla=mysqli_fetch_array($resultAmpliacion);

// Productos similares
$querySimilares = "SELECT ID, Nombre, Precio FROM sillas WHERE Ambiente='$ambienteFiltrado' AND ID<> $unaSilla[ID] ORDER BY RAND() LIMIT 4";
echo ($querySimilares);
$resultSimilares = mysqli_query($link, $querySimilares);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $unaSilla['Nombre']?></title>
</head>
<body>
<nav>
<p><a href="catalogo.php?Ambiente=<?php echo $ambienteFiltrado?>"><?php echo $ambienteFiltrado?></a> / <?php echo $unaSilla['Nombre']?></p>
</nav>

<span><?php echo $unaSilla[Codigo]?></span>
<h1><?php echo $unaSilla['Nombre']?></h1>
<h2>USD <?php echo $unaSilla[Precio]?> </h2>
<p><?php echo $unaSilla['Descripcion']?></p>
<p>Medidas: <?php echo $unaSilla['Medidas']?></p>
<p>Material: <?php echo $stringMateriales?></p>
<p>Ambiente: <?php echo $unaSilla['Ambiente']?></p>
<p>Estilo: <?php echo $unaSilla['Estilo']?></p>

<h3>Productos similares</h3>
<?php
    while($sillaSimilar=mysqli_fetch_array($resultSimilares)){
        echo "<div>";
        echo "<h3><a href='ampliacion.php?ID=$sillaSimilar[ID]&Ambiente=$ambienteFiltrado'>$sillaSimilar[Nombre]</a></h3>";
        echo "<p>USD $sillaSimilar[Precio]</p>";
        echo "</div>";
    }
?>
</body>
</html>