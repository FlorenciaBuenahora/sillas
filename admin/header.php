<nav class="navbar navbar-expand-lg navbar-light" id="nav-admin">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">
            <img src="../assets/logo/sillasuy.svg" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item d-flex">
                    <img src="assets/icons/external-link.svg" alt="Salir" class="icono">
                    <a class="nav-link" aria-current="page" href="../index.php" target="_blank">Ver sitio</a>
                </li>
                <li class="nav-item d-flex">
                    <img src="assets/icons/user.svg" alt="Salir" class="icono">
                    <a class="nav-link" href="#"><?php echo "Bievenid@ " .$_SESSION['NombreAdmin'] ?></a>
                </li>
                <li class="nav-item d-flex">
                    <img src="assets/icons/log-out.svg" alt="Salir" class="icono">
                    <a class="nav-link" aria-current="page" href="cerrarSesion.php">Salir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- <a href="cerrarSesion.php">Salir</a> -->