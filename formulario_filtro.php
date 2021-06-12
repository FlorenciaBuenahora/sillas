<?php
//$idMarcas()
//$querySillasPorMarca="SELECT DISTINCT Nombre, Precio FROM sillas WHERE Marca = $idMarcas ";
// $querySillasPorMarca="SELECT DISTINCT sillas.Nombre, sillas.Precio from sillas INNER JOIN marcas ON sillas.MarcaID=marca.ID";
// $resultSillasPorMarca=mysqli_query($link, $querySillasPorMarca);
// $queryMarcas = "SELECT Nombre, ID FROM marcas";



// Query Marcas
$queryMarcas = "SELECT DISTINCT Marca FROM sillas ORDER BY Marca ASC";
$resultMarcas = mysqli_query($link, $queryMarcas);

// Query Color
// $queryColor = "SELECT DISTINCT Color FROM sillas ORDER BY CAST(Color AS CHAR)";
$queryColor = "SELECT ID, Nombre, Codigo FROM colores";
$resultColor = mysqli_query($link, $queryColor);

// Query Materiales
$queryMateriales = "SELECT ID, Nombre FROM materiales";
$resultMateriales = mysqli_query($link, $queryMateriales);

// $materialesSelect = array();

// while($unMaterial=mysqli_fetch_array($resultMateriales)) {
//     // var_dump($unMaterial[0]);

//     // Explode recibe dos parametros un string delimitador (coma) y un dato de string que va a convertir a array
//     $arrayMateriales = explode(",", "$unMaterial[0]");
//     // unValor variable temporal que guarda el valor en cada recorrida
//     foreach($arrayMateriales as $unValor) {
//         // Si un valor no esta incluido en el array materiales:
//         if(!in_array($unValor, $materialesSelect)) {
//             array_push($materialesSelect, $unValor);
//         }
//     }
// }

// Query Estilos
$queryEstilos = "SELECT DISTINCT Estilo FROM sillas ORDER BY CAST(Estilo AS CHAR)";
$resultEstilos = mysqli_query($link, $queryEstilos);

$estilosSelect = array();

while($unEstilo=mysqli_fetch_array($resultEstilos)) {
    // var_dump($unEstilo[0]);
    $arrayEstilos = explode(",", "$unEstilo[0]");
    foreach($arrayEstilos as $unValorEstilo) {
        if(!in_array($unValorEstilo, $estilosSelect)) {
            array_push($estilosSelect, $unValorEstilo);
        }
    }

}

// Checkear el último ambiente seleccionado
$ambienteFiltrado = "";
if(isset($_GET['Ambiente'])){
    $ambienteFiltrado = $_GET['Ambiente'];
}

?>

<aside>
<!-- Form para Marcas -->
    <form action="catalogo.php" method="GET">

        <!-- Input oculto para pasarle el Ambiente -->
        <input style="display:none;" type="text" name="Ambiente" value="<?php echo $ambienteFiltrado ?>">

        <h4>Marca</h4>
        <?php

        // Para que los checkboxes queden seleccionados
        $checkMarcasSeleccionadas = array();
        if (isset($_GET['Marca'])) {
            $checkMarcasSeleccionadas = $_GET['Marca'];
        }

        while ($unCheckMarca=mysqli_fetch_array($resultMarcas)) {
            $checked = "";
            if(in_array($unCheckMarca[0], $checkMarcasSeleccionadas)) {
                $checked = "checked";
            }
        ?>   
        <!-- Cuando seleccione mas de uno lo manda como un array -->
            <input type="checkbox" value="<?php echo $unCheckMarca[0]?>" name="Marca[]" id="<?php echo $unCheckMarca[0]?>" <?php echo $checked ?>>
            <label for="<?php echo $unCheckMarca[0]?>"><?php echo $unCheckMarca[0]?></label>
        <?php 
        }
        ?>
        
        <hr>

        <!-- Form para Color -->
        <h4>Color</h4>
        <?php
        while ($unCheckColor=mysqli_fetch_array($resultColor)) {
        ?>   
            <input type="checkbox" value="<?php echo $unCheckColor[0]?>" name="Color[]" id="<?php echo $unCheckColor[0]?>">
            <label for="<?php echo $unCheckColor[0]?>"><?php echo $unCheckColor[1]?>
                <div style="background-color:<?php echo $unCheckColor[2]?>; width:73px; height:25px"></div>
            </label>
        <?php 
        }
        ?>

        <hr>

        <!-- Form para Materiales -->
    
        <h4>Material</h4>
        <?php
        while ($unCheckMaterial=mysqli_fetch_array($resultMateriales)) {
            ?>   
                <input type="checkbox" value="<?php echo $unCheckMaterial[0]?>" name="Material[]" id="<?php echo $unCheckMaterial[1]?>">
                <label for="<?php echo $unCheckMaterial[1]?>"><?php echo $unCheckMaterial[1]?></label>
            <?php 
        }
        ?>

        <hr>

        <!-- Form para Estilos -->
    
        <h4>Estilo</h4>
        <?php
        foreach($estilosSelect as $unEstilos) {
        ?>
            <input type="checkbox" value="<?php echo $unEstilos?>" name="Estilo[]" id="<?php echo $unEstilos?>">
            <label for="<?php echo $unEstilos?>"><?php echo $unEstilos?></label>
        <?php 
        }
        ?>

        <hr>

        <!-- Form para Precio -->

        <?php 
        // Para que el precio quede visible
        $precioMinimo="";
        $precioMaximo="";
        if(isset($_GET['precioMinimo']))
        {
            $precioMinimo=$_GET['precioMinimo'];
            $precioMaximo=$_GET['precioMaximo'];
        }
        ?>

        <h4>Precio</h4>
        <input type="number" name="precioMinimo" id="precioMinimo" placeholder="Mínimo" value="<?php echo $precioMinimo?>">
        <input type="number" name="precioMaximo" id="precioMaximo" placeholder="Máximo" value="<?php echo $precioMaximo?>">

        <input type="submit" value="Filtrar" name="filtrarTodo">
    </form>   
</aside>