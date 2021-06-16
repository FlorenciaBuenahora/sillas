<?php
include("conexion.php");

// Los más nuevos //
$queryNuevos="SELECT ID, Nombre, Precio FROM sillas WHERE Nuevo=1 ORDER BY ID DESC LIMIT 9";
$resultNuevos=mysqli_query($link, $queryNuevos);

// // Destacados
$queryDestacados="SELECT ID, Nombre, Precio, Destacado FROM sillas WHERE Destacado=1 ORDER BY ID LIMIT 4";
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
<div class="container text-center">
    <img class="mt-3 img-fluid portada" src="assets/img/portada.jpg" alt="Tres imágenes de sillas">
</div>

<main id="inicio" class="mt-5">
<section class="container">
    <h1 class="text-center">Los más nuevos</h1>
    <div class="carousel-fluid">
                <div class="row mx-auto my-auto">
                    <div id="myCarousel" class="carousel w-100" data-bs-ride="carousel">
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
                                        echo "<img class='img-fluid' src='assets/img/sillas/dummy.jpeg' alt='Silla ejemplo'>";
                                        echo "<h2><a href='ampliacion.php?ID=$unNuevo[ID]'>$unNuevo[Nombre]</a></h2>";
                                        echo "<p>USD $unNuevo[Precio]</p>";
                                    echo "</div>";
                                echo "</div>";
                                // Despues del primer recorrido se le suma 1 a contador
                                $contador = $contador + 1;
                            }
                        ?>
                            <!-- <div class="carousel-item">
                                <div class="col-md-6 col-lg-3">
                                    <img class="img-fluid" src="assets/img/sillas/dummy.jpeg" alt="Silla ejemplo">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6 col-lg-3">
                                    <img class="img-fluid" src="assets/img/sillas/dummy.jpeg" alt="Silla ejemplo">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6 col-lg-3">
                                    <img class="img-fluid" src="assets/img/sillas/dummy.jpeg" alt="Silla ejemplo">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6 col-lg-3">
                                    <img class="img-fluid" src="assets/img/sillas/dummy.jpeg" alt="Silla ejemplo">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="col-md-6 col-lg-3">
                                    <img class="img-fluid" src="assets/img/sillas/dummy2.jpeg" alt="Silla ejemplo">
                                </div>
                            </div> -->
                        </div>
                        <a class="carousel-control-prev m-auto" data-bs-target="#myCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next m-auto" data-bs-target="#myCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
    

<h1>Destacados</h1>
    <?php
        while($unDestacado=mysqli_fetch_array($resultDestacados)) {
            echo "<article>";
            echo "<h3><a href='ampliacion.php?ID=$unDestacado[ID]'>$unDestacado[Nombre]</a></h3>";
            echo "<p>USD $unDestacado[Precio]</p>";
            echo "</article>";
        }
    ?>
</section>
</main>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./js/carousel.js"></script>
</body>
</html>