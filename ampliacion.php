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
$IDAmbienteFiltrado = "";
$slash = "";

if(isset($_GET['Ambiente'])){
    $IDAmbienteFiltrado = $_GET['Ambiente'];

    $queryNombreAmbientePorId = "SELECT DISTINCT A.NombreAmbiente FROM ambientes AS A WHERE A.ID = $IDAmbienteFiltrado";
    $resultNombreAmbientePorId = mysqli_query($link,$queryNombreAmbientePorId);
    
    while($sillaFiltrada=mysqli_fetch_array($resultNombreAmbientePorId)){
        $ambienteFiltrado = $sillaFiltrada['NombreAmbiente'];
    }

    $slash = " /";
    $ambienteBreadcrumbs =  $ambienteFiltrado;
}
else {
    $IdSillaFiltrada = $_GET['ID'];

    $queryNombreAmbientePorIdSilla = "SELECT DISTINCT A.ID, A.NombreAmbiente FROM ambientes AS A 
                                INNER JOIN sillasAmbientes AS SA ON SA.IDAmbiente = A.ID 
                                WHERE SA.IDSilla = $IdSillaFiltrada
                                ORDER BY RAND() LIMIT 1";

    $resultNombreAmbientePorIdSilla = mysqli_query($link,$queryNombreAmbientePorIdSilla);
    
    while($sillaFiltrada=mysqli_fetch_array($resultNombreAmbientePorIdSilla)){
        $ambienteFiltrado = $sillaFiltrada['NombreAmbiente'];
        $IDAmbienteFiltrado = $sillaFiltrada['ID'];
    }

}

// Imagenes
$queryImagenes = "SELECT * FROM imagenes WHERE IDSilla = $id";
$resultImagenes = mysqli_query($link, $queryImagenes);

// Materiales complementaria y relacional
$queryMaterialesAmpliacion="SELECT DISTINCT Nombre FROM materiales AS M INNER JOIN sillasMateriales AS SM ON SM.IDMaterial = M.ID WHERE SM.IDSilla = $id";
$resultMaterialesAmpliacion=mysqli_query($link, $queryMaterialesAmpliacion);

$stringMateriales = "";
$arrayMateriales = array();

$materialesFiltrados=mysqli_fetch_array($resultMaterialesAmpliacion);
    
    foreach($resultMaterialesAmpliacion as $materiales){
        foreach($materiales as $material){
            // Si es el primer elemento  no agrega coma
            if($material === $materialesFiltrados[0]){
                $stringMateriales = $stringMateriales. $material;
            }
            // De lo contrario agrega coma
            else{
                $stringMateriales = $stringMateriales.", ".$material;
            }
        }
    }

// Estilos complementaria y relacional
$queryEstilosAmpliacion="SELECT DISTINCT NombreEstilo FROM estilos AS E INNER JOIN sillasEstilos AS SE ON SE.IDEstilo = E.ID WHERE SE.IDSilla = $id";
$resultEstilosAmpliacion=mysqli_query($link, $queryEstilosAmpliacion);

$stringEstilos = "";
$arrayEstilos = array();

$estilosFiltrados=mysqli_fetch_array($resultEstilosAmpliacion);
    
    foreach($resultEstilosAmpliacion as $estilos){
        foreach($estilos as $estilo){
            // Si es el primer elemento  no agrega coma
            if($estilo === $estilosFiltrados[0]){
                $stringEstilos = $stringEstilos. $estilo;
            }
            // De lo contrario agrega coma
            else{
                $stringEstilos =$stringEstilos.", ".$estilo;
            }
        }
    }

// Marcas complementaria
$queryMarcasAmpliacion="SELECT DISTINCT NombreMarca FROM marcas AS M INNER JOIN sillas AS S ON S.Marca = M.ID WHERE S.ID = $id";
$resultMarcasAmpliacion=mysqli_query($link, $queryMarcasAmpliacion);

$stringMarcas = "";
$arrayMarcas = array();

while($Marcas=mysqli_fetch_array($resultMarcasAmpliacion)) {
    $arrayMarcas = explode(", ", "$Marcas[0]");
    foreach($arrayMarcas as $marca){
        if($marca === $arrayMarcas[0]){
            $stringMarcas = $stringMarcas. $marca;
        }
        else{
            $stringMarcas = ", ".$stringMarcas.$marca;
        }

    }
}

// Ambiente complementaria y relacional
$queryAmbienteAmpliacion="SELECT DISTINCT NombreAmbiente FROM ambientes AS A INNER JOIN sillasAmbientes AS SA ON SA.IDAmbiente = A.ID WHERE SA.IDSilla = $id";
$resultAmbienteAmpliacion=mysqli_query($link, $queryAmbienteAmpliacion);

$stringAmbientes = "";
$arrayAmbiente = array();

$ambientesFiltrados=mysqli_fetch_array($resultAmbienteAmpliacion);
    
    foreach($resultAmbienteAmpliacion as $ambientes){
        foreach($ambientes as $ambiente){
            // Si es el primer elemento  no agrega coma
            if($ambiente === $ambientesFiltrados[0]){
                $stringAmbientes = $stringAmbientes. $ambiente;
            }
            // De lo contrario agrega coma
            else{
                $stringAmbientes = $stringAmbientes.", ".$ambiente;
            }
        }
    }

// Productos similares
$querySimilares = "SELECT S.ID, S.Nombre, S.Precio FROM sillas AS S 
INNER JOIN sillasAmbientes AS SA ON SA.IDSilla = S.ID 
WHERE SA.IDAmbiente= $IDAmbienteFiltrado AND SA.IDSilla <> $unaSilla[ID] ORDER BY RAND() LIMIT 4";
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
            <p><a href="catalogo.php?Ambiente=<?php echo $IDAmbienteFiltrado?>"><?php echo $ambienteBreadcrumbs.$slash?></a> <?php echo $unaSilla['Nombre']?></p>
        </nav>
        <div class="row">
            <div class="col-lg-8 row">
                <!-- <div class="col-md-6">
                    <img class="img-fluid" src="assets/img/sillas/dummy.jpeg" alt="Dummy">
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <img class="img-fluid" src="assets/img/sillas/dummy2.jpeg" alt="Dummy">
                </div>
                <div class="col-md-6 mt-4">
                    <img class="img-fluid" src="assets/img/sillas/dummy3.jpeg" alt="Dummy">
                </div>
                <div class="col-md-6 mt-4">
                    <img class="img-fluid" src="assets/img/sillas/dummy4.jpeg" alt="Dummy">
                </div> -->
                <?php 
                // Recorrido imagenes
                    while($unaImagen = mysqli_fetch_array($resultImagenes)) {
                        if($unaImagen['DestinoImagen'] === 'ampliacion') {
                            echo "<div class='col-md-6 mb-4'>";
                                echo "<img class='img-fluid' src='assets/img/sillas/$unaImagen[NombreImagen]' alt='$unaImagen[AltImagen]'>";
                            echo "</div>";
                        } 
                    }
                ?>
            </div>
            <div class="col-lg-4 prod-info mt-3 mt-lg-0">
                <span>Código: <?php echo $unaSilla[Codigo]?></span>
                <h1 class="mt-2"><?php echo $unaSilla['Nombre']?></h1>
                <h2 class="mt-4">USD <?php echo $unaSilla[Precio]?></h2>
                <p class="mt-3"><?php echo $unaSilla['Descripcion']?></p>
                <!-- <h3 class="mt-4">Variantes</h3>
                <div class="variantes d-flex">
                    <div style="width:55px; height:65px; background-color:grey;"></div>
                    <div style="width:55px; height:65px; background-color:grey;"></div>
                    <div style="width:55px; height:65px; background-color:grey;"></div>
                </div> -->
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
                <h3 class="mt-4">Características</h3>
                <p>Marca: <?php echo $stringMarcas?></p>
                <p>Medidas: <?php echo $unaSilla['Medidas']?></p>
                <p>Material: <?php echo $stringMateriales?></p>
                <p>Ambiente: <?php echo $stringAmbientes?></p>
                <p>Estilo: <?php echo $stringEstilos?></p>
                <h3 class="mt-4">Envío y Costo</h3>
                <p>Montevideo:<br>
                Envíos gratis en compras de más de USD 200. Costo regular: USD 10.
                </p>
                <p>Interior:<br>
                Envíos desde USD17 dependiendo del tamaño y peso del pedido.
                </p>

            </div>
        </div>

        <section class="similares mt-5">
            <h3 class="text-center mb-4">Productos similares</h3>
            <div class="row">
                <?php
                while($sillaSimilar=mysqli_fetch_array($resultSimilares)){
                    // Imagenes
                    $queryImagenes = "SELECT * FROM imagenes WHERE IDSilla = $sillaSimilar[ID]";
                    $resultImagenes = mysqli_query($link, $queryImagenes);

                    $productoNuevo = "";
                        if($sillaSimilar['Nuevo'] == 1) {
                            $productoNuevo = 'prod-nuevo';
                        }
                        echo "<div class='col-md-6 col-lg-3 producto'>";
                            echo "<a class='$productoNuevo' href='ampliacion.php?ID=$sillaSimilar[ID]&Ambiente=$IDAmbienteFiltrado'>";
                            if($sillaSimilar['Nuevo'] == 1) {
                                echo "<div class='etiqueta-nuevo'>Nuevo</div>";
                            }
                            while($unaImagen = mysqli_fetch_array($resultImagenes)) {
                                if($unaImagen['DestinoImagen'] === 'catalogo') {
    
                                        echo "<img class='img-fluid' src='assets/img/sillas/$unaImagen[NombreImagen]' alt='$unaImagen[AltImagen]'>";
                                } 
                            }
                                // echo "<img class='img-fluid' src='assets/img/sillas/dummy.jpeg' alt='Silla ejemplo'>";
                                echo "<h2>$sillaSimilar[Nombre]</h2>";
                                echo "<p>USD $sillaSimilar[Precio]</p>";
                            echo "</a>";
                        echo "</div>";
                }
            ?>
        </div>
        </section>
    </div>
    <?php include "footer.php";?>
</body>
</html>