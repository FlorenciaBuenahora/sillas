<?php
include("conexion.php");

// Los más nuevos //
$queryNuevos="SELECT ID, Nombre, Precio FROM sillas WHERE Nuevo=1 ORDER BY ID DESC LIMIT 9";
$resultNuevos=mysqli_query($link, $queryNuevos);

// // Destacados
$queryDestacados="SELECT ID, Nombre, Precio, Destacado FROM sillas WHERE Destacado=1 ORDER BY RAND() LIMIT 8";
$resultDestacados=mysqli_query($link, $queryDestacados);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/estilos.min.css">
    <title>Sillasuy</title>
</head>
<body>
<?php include "nav.php";?>

<!-- Portada -->
<header class="container text-center">
    <img class="mt-3 img-fluid portada" src="assets/img/portada.jpg" alt="Tres imágenes de sillas">
</header>

<main id="inicio" class="mt-5">
    <section class="container">
        <h1 class="text-center">Los más nuevos</h1>
        <div class="carousel-fluid mt-4">
            <div class="row mx-auto my-auto">
                <div id="carouselNuevos" class="carousel w-100" data-bs-ride="carousel">
                    <div class="carousel-inner w-100">
                    <?php
                    $contador = 0;
                    $active = "";
                        while($unNuevo=mysqli_fetch_array($resultNuevos)) {
                            // Cuando el contador es igual a 0 la clase pasa a ser active
                            if($contador === 0){
                            $active = "active";
                            }
                            // Cuando no lo es, no tiene la clase active
                            else{
                                $active = "";
                            }
                            echo "<div class='carousel-item $active'>";
                                echo "<div class='col-md-6 col-lg-3'>";
                                    echo "<a href='ampliacion.php?ID=$unNuevo[ID]'>";
                                        echo "<img class='img-fluid' src='assets/img/sillas/dummy.jpeg' alt='Silla ejemplo'>";
                                        echo "<h2>$unNuevo[Nombre]</h2>";
                                        echo "<p>USD $unNuevo[Precio]</p>";
                                    echo "</a>";
                                echo "</div>";
                            echo "</div>";
                            // Despues del primer recorrido se le suma 1 a contador
                            $contador = $contador + 1;
                        }
                    ?>
                    </div>
                    <a class="carousel-control-prev" data-bs-target="#carouselNuevos" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-bs-target="#carouselNuevos" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Nosotros -->
    <section class="container mt-5">
        <h1 class="text-center mb-4">Nosotros</h1>
        <img class="img-fluid" src="assets/img/nosotros.jpg" alt="Foto del equipo">
        <div class="nosotros-blurb text-center mt-4">
            <div class="mb-3">
                <p>Tanto nuestro equipo interno de diseñadores como los diseñadores externos con los que 
                colaboramos, cuidan hasta el último detalle de nuestras sillas: desde el primer boceto 
                pasando por los procesos de desarrollo y fabricación y llegando al producto final.</p>
            </div>
            <a href="#" class="text-uppercase">conocer más</a>
        </div>
    </section>

    <!-- Destacados -->
    <section class="container mt-5">
        <h1 class="text-center">Destacados</h1>
        <div class="carousel-fluid mt-4">
            <div class="row mx-auto my-auto">
                <div id="carouselDestacados" class="carousel w-100" data-bs-ride="carousel">
                    <div class="carousel-inner w-100">
                    <?php
                    $contador = 0;
                    $active = "";
                        while($unDestacado=mysqli_fetch_array($resultDestacados)) {
                            // Cuando el contador es igual a 0 la clase pasa a ser active
                            if($contador === 0){
                            $active = "active";
                            }
                            // Cuando no lo es, no tiene la clase active
                            else{
                                $active = "";
                            }
                            echo "<div class='carousel-item $active'>";
                                echo "<div class='col-md-6 col-lg-3'>";
                                    echo "<a href='ampliacion.php?ID=$unDestacado[ID]'>";
                                        echo "<img class='img-fluid' src='assets/img/sillas/dummy.jpeg' alt='Silla ejemplo'>";
                                        echo "<h2>$unDestacado[Nombre]</h2>";
                                        echo "<p>USD $unDestacado[Precio]</p>";
                                    echo "</a>";
                                echo "</div>";
                            echo "</div>";
                            // Despues del primer recorrido se le suma 1 a contador
                            $contador = $contador + 1;
                        }
                    ?>
                    </div>
                    <a class="carousel-control-prev" data-bs-target="#carouselDestacados" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-bs-target="#carouselDestacados" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./js/carousel.js"></script>
</body>
</html>