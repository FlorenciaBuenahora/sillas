<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
</head>
<body>
    <form action="procesarContacto.php" method="GET">
    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" type="text">
    <label for="email">Email</label>
    <input id="email" name="email" type="email">
    <label for="mensaje">Mensaje</label>
    <textarea name="mensaje" id="mensaje"></textarea>
    <input type="submit" value="Enviar">
    </form>
</body>
</html>