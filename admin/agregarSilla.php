<?php
include("../conexion.php");

// Consulta Marca
$queryMarca = "SELECT DISTINCT Marca FROM sillas";
$resultMarca = mysqli_query($link, $queryMarca);

// Consulta Ambiente
$queryAmbiente = "SELECT * FROM ambientes";
$resultAmbiente = mysqli_query($link, $queryAmbiente);

// Consulta Color

// Consulta Material

// Consulta Estilo
$queryEstilo = "SELECT * FROM estilos";
$resultEstilo = mysqli_query($link, $queryEstilo);

// Consulta Destacado

// Consulta Nuevo

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
        selector: '#mytextarea'
        });
    </script>


    <title>Agregar silla</title>
</head>
<body>
    <div class="container">
        <h1>Nueva silla</h1>
        <form action="insertar.php" class="row g-3 needs-validation" novalidate>

            <!-- Codigo -->
            <div class="col-md-6">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" id="codigo" name="codigo" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingresa el codigo
                </div>
            </div>

            <!-- Nombre -->
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
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
                            echo "<input class='form-check-input' name='Ambiente[]' type='checkbox' id='$unAmbiente[1]' value='$unAmbiente[1]'>";
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
                <select class="form-select" required>
                    <option selected>Selecciona una marca</option>
                    <?php 
                        while($unaMarca = mysqli_fetch_array($resultMarca)) {
                            echo "<option value='$unaMarca[Marca]'>$unaMarca[Marca]</option>";
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
                <input type="number" name="precio" id="precio" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingresa el precio
                </div>
            </div>

            <!-- Color -->
            <div class="col-12 mb-3">
                <label for="" class="mb-2">Color</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Azul</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Beige</label>
                </div>
            </div>
            <div class="invalid-feedback">
                    Por favor selecciona un color
            </div>

            <!-- Material -->
            <div class="col-12 mb-3">
                <label for="" class="mb-2">Material</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="material1" value="option1">
                    <label class="form-check-label" for="material1">Acero</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="material2" value="option2">
                    <label class="form-check-label" for="material2">Acero Inoxidable</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="material3" value="option3">
                    <label class="form-check-label" for="material3">Aluminio</label>
                </div>
                <div class="invalid-feedback">
                    Por favor seleccione al menos un material
                </div>
            </div>

            <!-- Medidas -->
            <div class="col-md-6">
                <label for="medidas" class="form-label">Medidas</label>
                <input type="text" id="medidas" name="medidas" class="form-control" required>
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
                            echo "<input class='form-check-input' name='Estilo[]' type='checkbox' id='$unEstilo[1]' value='$unEstilo[1]'>";
                            echo "<label class='form-check-label' for='$unEstilo[1]'>$unEstilo[1]</label>";
                        echo "</div>";
                    }
                ?>       

                <!-- <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="estilo1" value="option1">
                    <label class="form-check-label" for="estilo1">Colonial</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="Moderno" value="option2">
                    <label class="form-check-label" for="estilo2">Acero Inoxidable</label>
                </div> -->
                <div class="invalid-feedback">
                    Por favor selecciona al menos un estilo
                </div>
            </div>

            <!-- Descripción -->
            <div class="col-12 mb-3">
                <label for="" class="mb-2">Descripción</label><br>
                <textarea id="mytextarea" required></textarea>
                <div class="invalid-feedback">
                    Por favor escribe una descripción
            </div>
            </div>
            <!-- Destacado -->
            <div class="col-12 mb-3">
                <label for="" class="mb-2">Destacado</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="destacadoSi" value="option1">
                    <label class="form-check-label" for="destacadoSi">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="destacadoNo" value="option2">
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
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="nuevoSi" value="option1">
                    <label class="form-check-label" for="nuevoSi">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="nuevoNo" value="option2">
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