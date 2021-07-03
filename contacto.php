<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
</head>
<body>

        <form action="procesarContacto.php" method="GET" class="row g-2">
            <div class="col-lg-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control">
            </div>
            <div class="col-lg-6 mb-3">
                <label for="nombre" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="col-12">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje" style="height: 100px"></textarea>
            </div>
            <div class="col mt-3 d-flex justify-content-end">
                <input type="submit" value="Enviar" role="button" class="btn btn-primary px-6">
            </div>
        </form>
    
</body>
</html>