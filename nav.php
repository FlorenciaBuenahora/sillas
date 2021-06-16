<?php

// Ambientes
$queryAmbiente="SELECT DISTINCT Ambiente FROM sillas WHERE Ambiente NOT LIKE '%Comedor,Escritorio%' AND Ambiente NOT LIKE '%Comedor,Exterior%'";
$resultAmbiente=mysqli_query($link, $queryAmbiente);

// Buscador
$queryBuscador = "SELECT DISTINCT ID, Nombre, Precio, Ambiente FROM sillas";
$resultBuscador = mysqli_query($link, $queryBuscador);

?>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">
        <img src="assets/logo/sillasuy.svg" alt="Logo sillasuy">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php
                while($Ambiente=mysqli_fetch_array($resultAmbiente)){
                    echo "<li class='nav-item me-5'><a href='catalogo.php?Ambiente=$Ambiente[0]'>$Ambiente[0]</a></li>";
                }
            ?>
            </ul>
            <?php
        
            // Si el usuario buscó se guarda el texto sino queda una string vacia
            $textoBuscado = "";
            if (isset($_GET['buscar'])) {
            $textoBuscado = $_GET['buscar'];
            }

            ?>
            <form class="d-flex" action="resultadoBuscar.php" method="GET">
            <input class="form-control me-2" type="search" id="buscar" name="buscar" placeholder="Buscar sillas" aria-label="Search" value="<?php echo $textoBuscado?>">
            <!-- <button class="btn btn-outline-success" type="hidden" value="Buscar">Search</button> -->
            </form>
        </div>
    </div>
</nav>

    <!-- <ul>
        
        // while($Ambiente=mysqli_fetch_array($resultAmbiente)){
        //     echo "<li><a href='catalogo.php?Ambiente=$Ambiente[0]'>$Ambiente[0]</a></li>";
        // }
        //
    </ul> -->

        

    <!-- <form action="resultadoBuscar.php" method="GET">
        <input type="text" id="buscar" name="buscar" placeholder="Buscar sillas" value="">
        <input type="hidden" value="Buscar">
    </form> -->
