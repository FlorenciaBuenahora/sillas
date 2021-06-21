
<div class="container mt-4">
    <div class="row">
        <aside class="col-md-4 col-lg-2">
            <?php echo "<h1 class='titulo-catalogo'>Sillas de $ambienteSeleccionado</h1>"; 
            include ("formulario_filtro.php");
            ?>
        </aside>
        <div class="col-md-8 col-lg-10 row mt-4 mt-md-0 ms-md-auto prod">
        <?php
            while($sillaFiltrada=mysqli_fetch_array($resultSillasPorAmbiente)){
                echo "<div class='col-md-6 col-lg-4 mb-3'>";
                    echo "<a href='ampliacion.php?ID=$sillaFiltrada[ID]&Ambiente=$ambienteSeleccionado'>";
                        echo "<img class='img-fluid' src='assets/img/sillas/dummy.jpeg' alt='Silla ejemplo'>";
                        echo "<h2>$sillaFiltrada[Nombre]</h2>";
                        echo "<p>USD $sillaFiltrada[Precio]</p>";
                    echo "</a>";
                echo "</div>";
            }
        ?>
        </div>
    </div>
</div>