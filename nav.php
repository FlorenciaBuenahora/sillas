<?php

// Ambientes
$queryAmbiente="SELECT DISTINCT Ambiente FROM sillas WHERE Ambiente NOT LIKE '%Comedor,Escritorio%' AND Ambiente NOT LIKE '%Comedor,Exterior%'";
$resultAmbiente=mysqli_query($link, $queryAmbiente);

// Buscador
$queryBuscador = "SELECT DISTINCT Nombre, Precio FROM sillas";
$resultBuscador = mysqli_query($link, $queryBuscador);

?>

<nav>
    <ul>
        <?php
        while($Ambiente=mysqli_fetch_array($resultAmbiente)){
            echo "<li><a href='catalogo.php?Ambiente=$Ambiente[0]'>$Ambiente[0]</a></li>";
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

    <form action="resultadoBuscar.php" method="GET">
        <input type="text" id="buscar" name="buscar" placeholder="Buscar sillas" value="<?php echo $textoBuscado?>">
        <input type="hidden" value="Buscar">
    </form>
</nav>