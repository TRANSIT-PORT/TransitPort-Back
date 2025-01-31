<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuarios</title>
    <style>
        h2.titulo {
            color: var(--Cinder-950, #040813);
            font-family: Inter;
            font-size: 40px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }
    </style>
</head>
<body>
<p>Crear usuarios funciona</p>

    <h2 class="titulo">Crear Usuario</h2>

    <form action="" method="post">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" name="usuario" id="usuario">
        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad:</label>
            <input type="text" class="form-control" name="ciudad" id="ciudad">
        </div>
        <div class="form-group">
            <label for="mail">Email:</label>
            <input type="email" class="form-control" name="mail" id="mail">
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos" id="apellidos">
        </div>
        <div class="form-group">
            <label for="telf">Teléfono:</label>
            <input type="tel" class="form-control" name="telf" id="telf">
        </div>
        <div class="form-group">
            <label for="codigoPostal">Código postal:</label>
            <input type="text" class="form-control" name="codigoPostal" id="codigoPostal">
        </div>

        <br>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password2">Confirma la contraseña:</label>
            <input type="password" class="form-control" name="password2" id="password2">
        </div>

    </form>

</body>
</html>
