<?php
include("control.php");
include("../conexion.php");

// Mensajes
$textoMensaje = "";
$clase = "";
if(isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    switch ($mensaje) {
        case "imgBorrada"; {
            $textoMensaje = "Se ha eliminado una imagen";
            $clase = "correcto";
            break;
        }
    }
}


// Modificar datos de tabla silla
$idModificar = $_GET['ID'];
$queryModificarSilla = "SELECT * FROM sillas WHERE ID=$idModificar";
$resultModificarSilla = mysqli_query($link, $queryModificarSilla);
$sillaModificar = mysqli_fetch_array($resultModificarSilla);

// Modificar Ambiente
$queryModificarAmbiente = "SELECT ID, IDSilla, IDAmbiente FROM sillasAmbientes WHERE IDSilla=$idModificar";
$resultModificarAmbiente = mysqli_query($link, $queryModificarAmbiente);

// Modificar Material 
$queryModificarMaterial = "SELECT ID, IDSilla, IDMaterial FROM sillasMateriales WHERE IDSilla=$idModificar";
$resultModificarMaterial = mysqli_query($link, $queryModificarMaterial);

// Modificar Estilo
$queryModificarEstilo = "SELECT ID, IDSilla, IDEstilo FROM sillasEstilos WHERE IDSilla=$idModificar";
$resultModificarEstilo = mysqli_query($link, $queryModificarEstilo);

// Consulta Marca
$queryMarca = "SELECT ID, NombreMarca FROM marcas";
$resultMarca = mysqli_query($link, $queryMarca);

// Consulta Ambiente
$queryAmbiente = "SELECT ID, NombreAmbiente FROM ambientes";
$resultAmbiente = mysqli_query($link, $queryAmbiente);

// Consulta Color

$queryColor = "SELECT ID, Nombre, Codigo FROM colores";
$resultColor = mysqli_query($link, $queryColor);

// Consulta Material

$queryMaterial = "SELECT ID, Nombre FROM materiales";
$resultMaterial = mysqli_query($link, $queryMaterial);

// Consulta Estilo
$queryEstilo = "SELECT ID, NombreEstilo FROM estilos";
$resultEstilo = mysqli_query($link, $queryEstilo);

// Consulta Imagenes
$queryImagenes = "SELECT * FROM imagenes WHERE IDSilla = $idModificar";
$resultImagenes = mysqli_query($link, $queryImagenes);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: '#mytextarea',
        language: 'es'
        });
    </script>


    <title>Agregar silla</title>
</head>
<body>
    <?php include("header.php");?>
    <div class="row g-0">
        <?php include("nav-izq.php");?>
        <div class="col-md-10 bg-light px-4">
            <!-- Mensajes -->
            <p class="mensaje<?php echo $clase?>"><?php echo $textoMensaje?></p>
            <h1 class="h1-admin my-4">Modificar Silla</h1>
                <form action="modificar.php" method="GET" class="row g-3 needs-validation" novalidate>
                    <input type="hidden" value="<?php echo $sillaModificar['ID'] ?>" name="ID">
                    <!-- Codigo -->
                    <div class="col-md-6">
                        <label for="codigo" class="form-label">C??digo (m??ximo 5 caracteres)</label>
                        <input value="<?php echo $sillaModificar['Codigo']?>" type="text" id="codigo" name="Codigo" class="form-control" required>
                        <div class="invalid-feedback">
                            Por favor ingresa el codigo
                        </div>
                    </div>

                    <!-- Nombre -->
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input value="<?php echo $sillaModificar['Nombre']?>" type="text" id="nombre" name="Nombre" class="form-control" required>
                        <div class="invalid-feedback">
                            Por favor ingresa el nombre
                        </div>
                    </div>

                    <!-- Ambiente -->
                    <div class="col-12 mb-3">
                        <label for="" class="mb-2">Ambiente</label><br>
                        <?php 
                            while($unAmbiente = mysqli_fetch_array($resultAmbiente)) {
                                $checked = "";

                                // Recorrido
                                foreach($resultModificarAmbiente as $sillaAmbiente){

                                    if($unAmbiente['ID'] === $sillaAmbiente['IDAmbiente']){
                                        $checked = "checked";
                                    }
                                
                                }
                                echo "<div class='form-check form-check-inline'>";
                                    echo "<input class='form-check-input' name='Ambiente[]' type='checkbox' id='$unAmbiente[1]' value='$unAmbiente[0]' $checked>";
                                    echo "<label class='form-check-label' for='$unAmbiente[1]'>$unAmbiente[1]</label>";
                                echo "</div>";
                            }
                        ?>
                        <div class="invalid-feedback">
                            Por favor seleccione al menos un ambiente
                        </div>
                    </div>

                    <!-- Marca -->
                    <div class="col-md-6">
                        <label for="" class="mb-2">Marca</label>
                        <select class="form-select" name="Marca" required>
                            <option selected>Selecciona una marca</option>
                            <?php 
                                while($unaMarca = mysqli_fetch_array($resultMarca)) {
                                    if($unaMarca[0] === $sillaModificar['Marca']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option value='$unaMarca[0]' $selected>$unaMarca[1]</option>";
                                }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            Por favor ingresa el codigo
                        </div>
                    </div>

                    <!-- Precio -->
                    <div class="col-md-6 mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input value="<?php echo $sillaModificar['Precio']?>" type="number" name="Precio" id="precio" class="form-control" required>
                        <div class="invalid-feedback">
                            Por favor ingresa el precio
                        </div>
                    </div>

                    <!-- Color -->
                    <div class="col-12 mb-3">
                        <label for="" class="mb-2">Color</label><br>
                        <?php 
                            while($unColor = mysqli_fetch_array($resultColor)) {
                                    if ($unColor[0] === $sillaModificar['Color']) {
                                        $checked = "checked";
                                } else {
                                    $checked = "";
                                }
                                echo "<div class='form-check form-check-inline mb-3'>";
                                    echo "<input class='form-check-input' name='Color' type='radio' id='$unColor[1]' value='$unColor[0]' $checked>";
                                    echo "<label class='form-check-label d-flex align-items-center' for='$unColor[1]'>$unColor[1]
                                    <div style='width:58px; height:24px; background-color:$unColor[2]; border-radius:.25em; margin-left:5px;'></div>
                                    </label>";
                                echo "</div>";
                            }
                        ?> 

                        <div class="invalid-feedback">
                                Por favor selecciona un color
                        </div>
                    </div>

                    <!-- Material -->
                    <div class="col-12 mb-3">
                        <label for="" class="mb-2">Material</label><br>
                        <?php 
                            while($unMaterial = mysqli_fetch_array($resultMaterial)) {
                                $checked = "";

                                // Recorrido
                                foreach($resultModificarMaterial as $sillaMaterial){

                                    if($unMaterial['ID'] === $sillaMaterial['IDMaterial']){
                                        $checked = "checked";
                                    }
                                }
                                echo "<div class='form-check form-check-inline mb-3'>";
                                    echo "<input class='form-check-input' name='Material[]' type='checkbox' id='$unMaterial[1]' value='$unMaterial[0]' $checked>";
                                    echo "<label class='form-check-label' for='$unMaterial[1]'>$unMaterial[1]</label>";
                                echo "</div>";
                            }
                        ?> 
                        <div class="invalid-feedback">
                            Por favor seleccione al menos un material
                        </div>
                    </div>

                    <!-- Medidas -->
                    <div class="col-md-6">
                        <label for="medidas" class="form-label">Medidas</label>
                        <input value="<?php echo $sillaModificar['Medidas']?>" type="text" id="medidas" name="Medidas" class="form-control" required>
                        <div class="invalid-feedback">
                            Por favor ingresa las medidas
                        </div>
                    </div>

                    <!-- Estilo -->
                    <div class="col-md-6 mb-3">
                        <label for="" class="mb-2">Estilo</label><br>
                        <?php 
                            while($unEstilo = mysqli_fetch_array($resultEstilo)) {
                                $checked = "";

                                // Recorrido
                                foreach($resultModificarEstilo as $sillaEstilo){

                                    if($unEstilo['ID'] === $sillaEstilo['IDEstilo']){
                                        $checked = "checked";
                                    }
                                }
                                echo "<div class='form-check form-check-inline'>";
                                    echo "<input class='form-check-input' name='Estilo[]' type='checkbox' id='$unEstilo[1]' value='$unEstilo[0]' $checked>";
                                    echo "<label class='form-check-label' for='$unEstilo[1]'>$unEstilo[1]</label>";
                                echo "</div>";
                            }
                        ?>
                        <div class="invalid-feedback">
                            Por favor selecciona al menos un estilo
                        </div>
                    </div>

                    <!-- Descripci??n -->
                    <div class="col-12 mb-3">
                        <label for="" class="mb-2">Descripci??n</label><br>
                        <textarea id="mytextarea" name="Descripcion" required><?php echo $sillaModificar['Descripcion']?></textarea>
                        <div class="invalid-feedback">
                            Por favor escribe una descripci??n
                    </div>
                    </div>
                    <!-- Destacado -->
                    <div class="col-12 mb-3">
                        <label for="" class="mb-2">Destacado</label><br>
                        
                        <div class="form-check form-check-inline">
                        <?php 
                            $checked = "";
                            if ($sillaModificar['Destacado'] === "1") {
                                $checked = "checked";
                            }
                        ?>
                            <input class="form-check-input" type="radio" name="Destacado" id="destacadoSi" value="1" <?php echo $checked ?>>
                            <label class="form-check-label" for="destacadoSi">Si</label>
                        </div>
                
                        <div class="form-check form-check-inline">
                        <?php 
                            $checked = "";
                            if ($sillaModificar['Destacado'] === "0") {
                                $checked = "checked";
                            }
                        ?>
                            <input class="form-check-input" type="radio" name="Destacado" id="destacadoNo" value="0" <?php echo $checked ?>>
                            <label class="form-check-label" for="destacadoNo">No</label>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                            Por favor selecciona si es destacado o no
                    </div>

                    <!-- Nuevo -->
                    <div class="col-12 mb-3">
                        <label for="" class="mb-2">Nuevo</label><br>
                        <div class="form-check form-check-inline">
                        <?php 
                            $checked = "";
                            if ($sillaModificar['Nuevo'] === "1") {
                                $checked = "checked";
                            }
                        ?>
                            <input class="form-check-input" type="radio" name="Nuevo" id="nuevoSi" value="1" <?php echo $checked ?>>
                            <label class="form-check-label" for="nuevoSi">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <?php 
                            $checked = "";
                            if ($sillaModificar['Nuevo'] === "0") {
                                $checked = "checked";
                            }
                        ?>
                            <input class="form-check-input" type="radio" name="Nuevo" id="nuevoNo" value="0" <?php echo $checked ?>>
                            <label class="form-check-label" for="nuevoNo">No</label>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                            Por favor selecciona si es nuevo o no
                    </div>

                    <div class="col mt-3 d-flex justify-content-end">
                        <input type="submit" value="Modificar silla" role="button" class="btn btn-primary px-6">
                    </div>
                </form>

                <!-- Imagenes -->
                <figure id=imagenes>
                <?php 
                $cantidadImagenes = mysqli_num_rows($resultImagenes);

                if($cantidadImagenes > 0) {
                    echo "<h1 class='h2-admin my-4'>Im??genes Subidas</h2>";
                    echo "<div class='row'>";
                    while($unaImagen = mysqli_fetch_array($resultImagenes)) {
                        
                            echo "<div class='col-md-4'>";
                                echo "<img class='img-fluid' src='../assets/img/sillas/$unaImagen[NombreImagen]' alt='$unaImagen[AltImagen]'>";
                                    echo "<div class='d-flex align-items-center my-3'>";
                                        echo "<p>$unaImagen[NombreImagen]</p>";
                                        echo "<a href='borrarImg.php?IDImagen=$unaImagen[ID]&IDModificar=$idModificar'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-trash-2'><polyline points='3 6 5 6 21 6'></polyline><path d='M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'></path><line x1='10' y1='11' x2='10' y2='17'></line><line x1='14' y1='11' x2='14' y2='17'></line></svg></a>";
                                    echo "</div>";
                            echo "</div>";
                        
                    } 
                    echo "</div>";     
                }
                
                ?>
                </figure>
        </div>
    </div>

    <!-- Script validar -->
    <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
            })()
        </script>
</body>
</html>