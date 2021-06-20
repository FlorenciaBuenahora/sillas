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

$estilosCheck = array();

while($unEstilo=mysqli_fetch_array($resultEstilos)) {
    // var_dump($unEstilo[0]);
    $arrayEstilos = explode(",", "$unEstilo[0]");
    foreach($arrayEstilos as $unValorEstilo) {
        if(!in_array($unValorEstilo, $estilosCheck)) {
            array_push($estilosCheck, $unValorEstilo);
        }
    }

}

// Checkear el último ambiente seleccionado
$ambienteFiltrado = "";
if(isset($_GET['Ambiente'])){
    $ambienteFiltrado = $_GET['Ambiente'];
}

?>
<!-- Form para Marcas -->
    <form action="catalogo.php" method="GET" class="filtro">

        <!-- Input oculto para pasarle el Ambiente -->
        <input style="display:none;" type="text" name="Ambiente" value="<?php echo $ambienteFiltrado ?>">

        <div class="accordion accordion-flush" id="accordionFlushExample">
        <!-- Marca -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Marcas
                    </button>
                </h3>
                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne">
                    <div class="accordion-body">
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
                        <div class="form-check d-flex mb-2 marca">
                            <label class="form-check-label w-100" for="<?php echo $unCheckMarca[0]?>"><?php echo $unCheckMarca[0]?></label>
                            <input class="form-check-input" type="checkbox" value="<?php echo $unCheckMarca[0]?>" name="Marca[]" id="<?php echo $unCheckMarca[0]?>" <?php echo $checked ?>>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Colores
                    </button>
                </h3>
                <div id="flush-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="flush-headingTwo">
                    <div class="accordion-body color-body">
                        <!-- Color -->
                        <?php

                        // Para que los checkboxes queden seleccionados
                        $checkColoresSeleccionados = array();
                        if (isset($_GET['Color'])) {
                            $checkColoresSeleccionados = $_GET['Color'];
                        }

                        while ($unCheckColor=mysqli_fetch_array($resultColor)) {
                            $checked = "";
                            if(in_array($unCheckColor[0], $checkColoresSeleccionados)) {
                                $checked = "checked";
                            }
                        ?>   
                        <div class="form-check d-flex mb-2 color">
                            <label class="form-check-label w-100" for="<?php echo $unCheckColor[0]?>"><?php echo $unCheckColor[1]?>
                                <!-- <div style=" width:73px; height:25px"></div> -->
                            </label>
                            <input class="form-check-input" type="checkbox" value="<?php echo $unCheckColor[0]?>" name="Color[]" id="<?php echo $unCheckColor[0]?>" <?php echo $checked ?> style="background-color:<?php echo $unCheckColor[2]?>;">
                        </div>
                        <?php 
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
            <!-- Materiales -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Materiales
                    </button>
                </h3>
                <div id="flush-collapseThree" class="accordion-collapse collapse show" aria-labelledby="flush-headingThree">
                    <div class="accordion-body">
                    <?php
                        // Para que los checkboxes queden seleccionados
                        $checkMaterialesSeleccionados = array();
                        if (isset($_GET['Material'])) {
                            $checkMaterialesSeleccionados = $_GET['Material'];
                        }

                        while ($unCheckMaterial=mysqli_fetch_array($resultMateriales)) {
                            $checked = "";
                            if(in_array($unCheckMaterial[0], $checkMaterialesSeleccionados)) {
                                $checked = "checked";
                            }
                            ?>   
                            <div class="form-check d-flex mb-2 material">
                                <label class="form-check-label w-100" for="<?php echo $unCheckMaterial[1]?>"><?php echo $unCheckMaterial[1]?></label>
                                <input class="form-check-input" type="checkbox" value="<?php echo $unCheckMaterial[0]?>" name="Material[]" id="<?php echo $unCheckMaterial[1]?>" <?php echo $checked ?>>  
                            </div>
                            <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Estilo -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Estilos
                    </button>
                </h3>
                <div id="flush-collapseFour" class="accordion-collapse collapse show" aria-labelledby="flush-headingFour">
                    <div class="accordion-body">
                    <?php
                    // Para que los checkboxes queden seleccionados
                    $checkEstilosSeleccionados = array();
                    if (isset($_GET['Estilo'])) {
                        $checkEstilosSeleccionados = $_GET['Estilo'];
                    }

                    foreach($estilosCheck as $unEstilos) {
                        $checked = "";
                        if(in_array($unEstilos, $checkEstilosSeleccionados)) {
                            $checked = "checked";
                        }
                    ?>
                    <div class="form-check d-flex mb-2 estilo">
                        <label class="form-check-label w-100" for="<?php echo $unEstilos?>"><?php echo $unEstilos?></label>
                        <input class="form-check-input" type="checkbox" value="<?php echo $unEstilos?>" name="Estilo[]" id="<?php echo $unEstilos?>" <?php echo $checked ?>>
                    </div>
                    <?php 
                    }
                    ?>
                    </div>
                </div>
            </div>
            <!-- Precio -->
            <div class="accordion-item">
                <h3 class="accordion-header" id="panelsStayOpen-headingFive">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                        Precio
                    </button>
                </h3>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFive">
                    <div class="accordion-body precio">
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
                        <input class="mb-3" type="number" name="precioMinimo" id="precioMinimo" placeholder="Mínimo" value="<?php echo $precioMinimo?>">
                        <input type="number" name="precioMaximo" id="precioMaximo" placeholder="Máximo" value="<?php echo $precioMaximo?>">
                    </div>
                </div>
            </div>
        </div>
        <input class="btn btn-terciary mt-4" type="submit" value="Filtrar" name="filtrarTodo">
    </form>   