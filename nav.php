<?php
$queryAmbiente="SELECT DISTINCT Ambiente FROM sillas WHERE Ambiente NOT LIKE '%Comedor,Escritorio%' AND Ambiente NOT LIKE '%Comedor,Exterior%'";
$resultAmbiente=mysqli_query($link, $queryAmbiente);

?>

<nav>
    <ul>
        <?php
        while($Ambiente=mysqli_fetch_array($resultAmbiente)){
            echo "<li><a href='catalogo.php?Ambiente=$Ambiente[0]'>$Ambiente[0]</a></li>";
        }
        ?>
    </ul>
</nav>