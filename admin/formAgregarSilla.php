<?php
include("control.php");
include("../conexion.php");

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
    <div class="container">
        <h1>Nueva silla</h1>
        <form action="insertar.php" method="GET" class="row g-3 needs-validation" novalidate>

            <!-- Codigo -->
            <div class="col-md-6">
                <label for="codigo" class="form-label">Código (máximo 5 caracteres)</label>
                <input type="text" id="codigo" name="Codigo" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingresa el codigo
                </div>
            </div>

            <!-- Nombre -->
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="Nombre" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingresa el nombre
                </div>
            </div>

            <!-- Ambiente -->
            <div class="col-12 mb-3">
                <label for="" class="mb-2">Ambiente</label><br>
                <?php 
                    while($unAmbiente = mysqli_fetch_array($resultAmbiente)) {
                        echo "<div class='form-check form-check-inline'>";
                            echo "<input class='form-check-input' name='Ambiente[]' type='checkbox' id='$unAmbiente[1]' value='$unAmbiente[0]'>";
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
                            echo "<option value='$unaMarca[0]'>$unaMarca[1]</option>";
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
                <input type="number" name="Precio" id="precio" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingresa el precio
                </div>
            </div>

            <!-- Color -->
            <div class="col-12 mb-3">
                <label for="" class="mb-2">Color</label><br>
                <?php 
                    while($unColor = mysqli_fetch_array($resultColor)) {
                        echo "<div class='form-check form-check-inline'>";
                            echo "<input class='form-check-input' name='Color' type='radio' id='$unColor[1]' value='$unColor[0]'>";
                            echo "<label class='form-check-label' for='$unColor[1]'>$unColor[1]
                            <div style='width:58px; height:24px; background-color:$unColor[2];'></div>
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
                        echo "<div class='form-check form-check-inline'>";
                            echo "<input class='form-check-input' name='Material[]' type='checkbox' id='$unMaterial[1]' value='$unMaterial[0]'>";
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
                <input type="text" id="medidas" name="Medidas" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingresa las medidas
                </div>
            </div>

            <!-- Estilo -->
            <div class="col-md-6 mb-3">
                <label for="" class="mb-2">Estilo</label><br>
                <?php 
                    while($unEstilo = mysqli_fetch_array($resultEstilo)) {
                        echo "<div class='form-check form-check-inline'>";
                            echo "<input class='form-check-input' name='Estilo[]' type='checkbox' id='$unEstilo[1]' value='$unEstilo[0]'>";
                            echo "<label class='form-check-label' for='$unEstilo[1]'>$unEstilo[1]</label>";
                        echo "</div>";
                    }
                ?>
                <div class="invalid-feedback">
                    Por favor selecciona al menos un estilo
                </div>
            </div>

            <!-- Descripción -->
            <div class="col-12 mb-3">
                <label for="" class="mb-2">Descripción</label><br>
                <textarea id="mytextarea" name="Descripcion" required></textarea>
                <div class="invalid-feedback">
                    Por favor escribe una descripción
            </div>
            </div>
            <!-- Destacado -->
            <div class="col-12 mb-3">
                <label for="" class="mb-2">Destacado</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Destacado" id="destacadoSi" value="1">
                    <label class="form-check-label" for="destacadoSi">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Destacado" id="destacadoNo" value="0">
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
                    <input class="form-check-input" type="radio" name="Nuevo" id="nuevoSi" value="1">
                    <label class="form-check-label" for="nuevoSi">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Nuevo" id="nuevoNo" value="0">
                    <label class="form-check-label" for="nuevoNo">No</label>
                </div>
            </div>
            <div class="invalid-feedback">
                    Por favor selecciona si es nuevo o no
            </div>

            <div class="col mt-3 d-flex justify-content-end">
                <input type="submit" value="Agregar silla" role="button" class="btn btn-primary px-6">
            </div>
        </form>
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